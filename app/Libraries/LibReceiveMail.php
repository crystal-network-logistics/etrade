<?php
namespace App\Libraries;

class LibReceiveMail
{
    var $server='';
    var $username='';
    var $password='';

    var $marubox='';

    var $email='';
    var $webPath='';

    function __construct($username,$password,$EmailAddress,$mailserver='localhost',$servertype='pop',$port='995',$ssl = 'ssl',$webPath='/uploads/mails/') //Constructure
    {
        if ($ssl == 'ssl'){
            $ssl = true;
        }
        if($servertype=='imap')
        {
            if($port=='') $port='143';
            $strConnect='{'.$mailserver.':'.$port. '/imap'. ($ssl ? "/ssl" : "").'}INBOX';
        }
        else
        {
            $strConnect='{'.$mailserver.':'.$port. '/pop3'.($ssl ? "/ssl" : "").'}INBOX';
        }
        $this->server			=	$strConnect;
        $this->username			=	$username;
        $this->password			=	$password;
        $this->email			=	$EmailAddress;
        $this->webPath          =   $webPath;
    }
    function connect() //Connect To the Mail Box
    {
        $this->marubox=@imap_open($this->server,$this->username,$this->password);

        if(!$this->marubox)
        {
            return false;
// 			echo "Error: Connecting to mail server";
// 			exit;
        }
        return true;
    }


    function getHeaders($mid) // Get Header info
    {
        if(!$this->marubox)
            return false;

        $mail_header=imap_header($this->marubox,$mid);
        $sender=$mail_header->from[0];
        $sender_replyto=$mail_header->reply_to[0];
        if(strtolower($sender->mailbox)!='mailer-daemon' && strtolower($sender->mailbox)!='postmaster')
        {
            $subject=$this->decode_mime($mail_header->subject);

            /*$ccList=array();
            foreach ($mail_header->cc as $k => $v)
            {
                $ccList[]=$v->mailbox.'@'.$v->host;
            }
            $toList=array();
            foreach ($mail_header->to as $k => $v)
            {
                $toList[]=$v->mailbox.'@'.$v->host;
            }
            $ccList=implode(";", $ccList);
            $toList=implode(";", $toList);*/
            $mail_details=array(
                'fromBy'=>strtolower($sender->mailbox).'@'.$sender->host,
                'fromName'=>$this->_iconv_utf8($this->decode_mime($sender->personal)),
                //'ccList'=>$ccList,//strtolower($sender_replyto->mailbox).'@'.$sender_replyto->host,
                'ccaddress'=>$this->addressConversion($mail_header->ccaddress),
                'toNameOth'=>$this->_iconv_utf8($this->decode_mime($sender_replyto->personal)),
//                'subject'=>$subject,
                'subject'=>$this->_iconv_utf8($subject),
                'mailDate'=>date("Y-m-d H:i:s",$mail_header->udate),
                'udate'=>$mail_header->udate,
                //'toList'=>$toList,//strtolower($mail_header->to[0]->mailbox).'@'.$mail_header->to[0]->host
                'toaddress'=>$this->addressConversion($mail_header->toaddress)
            );
        }
        return $mail_details;
    }

    function addressConversion($str){
        $str = $this->decode_mime($str);
        $str = $this->_iconv_utf8($str);
        $str = str_replace('"','',$str);
        $str = str_replace(',',';',$str);
        return htmlentities($str, ENT_QUOTES);
    }

    function get_mime_type(&$structure) //Get Mime type Internal Private Use
    {
        $primary_mime_type = array("TEXT", "MULTIPART", "MESSAGE", "APPLICATION", "AUDIO", "IMAGE", "VIDEO", "OTHER");

        if($structure->subtype && $structure->subtype!="PNG") {
            return $primary_mime_type[(int) $structure->type] . '/' . $structure->subtype;
        }
        return "TEXT/PLAIN";
    }
    function get_part($stream, $msg_number, $mime_type, $structure = false, $part_number = false) //Get Part Of Message Internal Private Use
    {

        if(!$structure) {
            $structure = imap_fetchstructure($stream, $msg_number);
        }
        if($structure) {
            if($mime_type == $this->get_mime_type($structure))
            {
                if(!$part_number)
                {
                    $part_number = "1";
                }
                $text = imap_fetchbody($stream, $msg_number, $part_number);

                if($structure->encoding == 3)
                {

                    return imap_base64($text);
// 					if ($structure->parameters[0]->value!="utf-8")
// 					{
// 						return imap_base64($text);
// 					}
// 					else
// 					{
// 						return imap_base64($text);
// 					}
                }
                else if($structure->encoding == 4)
                {
                    return $this->_iconv_utf8(imap_qprint($text));
                    return iconv('gb2312','utf8',imap_qprint($text));
                }
                else
                {
                    return $this->_iconv_utf8($text);
                    return iconv('gb2312','utf8',$text);
                }
            }
            if($structure->type == 1) /* multipart */
            {
                while(list($index, $sub_structure) = each($structure->parts))
                {
                    if($part_number)
                    {
                        $prefix = $part_number . '.';
                    }
                    $data = $this->get_part($stream, $msg_number, $mime_type, $sub_structure, $prefix . ($index + 1));
                    if($data)
                    {
                        return $data;
                    }
                }
            }
        }
        return false;
    }
    function getTotalMails() //Get Total Number off Unread Email In Mailbox
    {
        if(!$this->marubox)
            return false;

// 		return imap_headers($this->marubox);
        return imap_num_recent($this->marubox);
    }

    function GetAttach($mid,$path) // Get Atteced File from Mail
    {
        if(!$this->marubox)
            return false;

        $struckture = imap_fetchstructure($this->marubox,$mid);

        $files=array();
        if($struckture->parts)
        {
            foreach($struckture->parts as $key => $value)
            {
                $enc=$struckture->parts[$key]->encoding;

                //取邮件附件
                if($struckture->parts[$key]->ifdparameters)
                {
                    //命名附件,转码
                    $name=$this->decode_mime($struckture->parts[$key]->dparameters[0]->value);
                    $extend =explode("." , $name);
                    $file['extension'] = $extend[count($extend)-1];
                    $file['pathname']  = $this->setPathName($key, $file['extension']);
                    $file['title']     = !empty($name) ? htmlspecialchars($name) : str_replace('.' . $file['extension'], '', $name);
                    $file['size']      = $struckture->parts[$key]->dparameters[1]->value;
// 					$file['tmpname']   = $struckture->parts[$key]->dparameters[0]->value;
                    if(@$struckture->parts[$key]->disposition=="ATTACHMENT")
                    {
                        $file['type']      = 1;
                    }
                    else
                    {
                        $file['type']      = 0;
                    }

                    $files[] = $file;

                    $message = imap_fetchbody($this->marubox,$mid,$key+1);
                    if ($enc == 0)
                        $message = imap_8bit($message);
                    if ($enc == 1)
                        $message = imap_8bit ($message);
                    if ($enc == 2)
                        $message = imap_binary ($message);
                    if ($enc == 3)//图片
                        $message = imap_base64 ($message);
                    if ($enc == 4)
                        $message = quoted_printable_decode($message);
                    if ($enc == 5)
                        $message = $message;
                    $fp = fopen($path.$file['pathname'],"w");
                    fwrite($fp,$message);
                    fclose($fp);

                }
                // 处理内容中包含图片的部分
                if($struckture->parts[$key]->parts)
                {
                    foreach($struckture->parts[$key]->parts as $keyb => $valueb)
                    {
                        $enc=$struckture->parts[$key]->parts[$keyb]->encoding;
                        if($struckture->parts[$key]->parts[$keyb]->ifdparameters)
                        {
                            //命名图片
                            $name=$this->decode_mime($struckture->parts[$key]->parts[$keyb]->dparameters[0]->value);
                            $extend =explode("." , $name);
                            $file['extension'] = $extend[count($extend)-1];
                            $file['pathname']  = $this->setPathName($key, $file['extension']);
                            $file['title']     = !empty($name) ? htmlspecialchars($name) : str_replace('.' . $file['extension'], '', $name);
                            $file['size']      = $struckture->parts[$key]->parts[$keyb]->dparameters[1]->value;
// 							$file['tmpname']   = $struckture->parts[$key]->dparameters[0]->value;
                            $file['type']      = 0;
                            $files[] = $file;

                            $partnro = ($key+1).".".($keyb+1);

                            $message = imap_fetchbody($this->marubox,$mid,$partnro);
                            if ($enc == 0)
                                $message = imap_8bit($message);
                            if ($enc == 1)
                                $message = imap_8bit ($message);
                            if ($enc == 2)
                                $message = imap_binary ($message);
                            if ($enc == 3)
                                $message = imap_base64 ($message);
                            if ($enc == 4)
                                $message = quoted_printable_decode($message);
                            if ($enc == 5)
                                $message = $message;
                            $fp=fopen($path.$file['pathname'],"w");
                            fwrite($fp,$message);
                            fclose($fp);
                        }
                    }
                }
            }
        }
        //move mail to taskMailBox
        //$this->move_mails($mid, $this->marubox);

        return $files;
    }

    /*    function getBody($mid,&$path,$imageList) // Get Message Body
        {
            if(!$this->marubox)
                return false;

            $body = $this->get_part($this->marubox, $mid, "TEXT/HTML");
            if ($body == "")
                $body = $this->get_part($this->marubox, $mid, "TEXT/PLAIN");
            if ($body == "") {
                return "";
            }
            $body = $this->_iconv_utf8($body);
            //处理图片
    //        return $body;
            $body=$this->embed_images($body,$path,$imageList);
            return $body;

        }*/
    function getBody($mid)
    { // Get Message Body
        if (!$this->marubox) {
            return false;
        }
        $body = $this->get_part($this->marubox, $mid, "TEXT/HTML");
        if ($body == "") {
            $body = $this->get_part($this->marubox, $mid, "TEXT/PLAIN");
        }
        if ($body == "") {
            return "";
        }

//        return $body;
        return $this->_iconv_utf8($body);
    }

    function  embed_images(&$body,&$path,$imageList)
    {
        // get all img tags
        preg_match_all('/<img.*?>/', $body, $matches);
        if (!isset($matches[0])) return;

        foreach ($matches[0] as $img)
        {
            // replace image web path with local path
            preg_match('/src="(.*?)"/', $img, $m);
            if (!isset($m[1])) continue;
            $arr = parse_url($m[1]);
            if (!isset($arr['scheme']) || !isset($arr['path']))continue;

// 			if (!isset($arr['host']) || !isset($arr['path']))continue;
            if ($arr['scheme']!="http")
            {
                $filename=explode("@", $arr['path']);
                $body = str_replace($img, '<img alt="" src="'.$path.$imageList[$filename[0]].'" style="border: none;" />', $body);
            }
        }
        return $body;
    }

    function deleteMails($mid) // Delete That Mail
    {
        if(!$this->marubox)
            return false;

        imap_delete($this->marubox,$mid);
    }

    function close_mailbox() //Close Mail Box
    {
        if(!$this->marubox)
            return false;

        imap_close($this->marubox,CL_EXPUNGE);
    }

    //移动邮件到指定分组
    function move_mails($msglist,$mailbox)
    {
        if(!$this->marubox)
            return false;

        imap_mail_move($this->marubox, $msglist, $mailbox);
    }

    function creat_mailbox($mailbox)
    {
        if(!$this->marubox)
            return false;

        //imap_renamemailbox($imap_stream, $old_mbox, $new_mbox);
        imap_create($this->marubox, $mailbox);
    }

    /*
     * decode_mime()转换邮件标题的字符编码,处理乱码
     */
    function decode_mime($str){
        $str=imap_mime_header_decode($str);
        $str=array_column($str,'text');
        return implode('',$str);
        return $str[0]->text;
        echo "str";print_r($str);
        if ($str[0]->charset!="default")
        {echo "==".$str[0]->text;
            return iconv($str[0]->charset,'utf8',$str[0]->text);
        }
        else
        {
            return $str[0]->text;
        }
    }

    function _imap_utf8($text)
    {
        if (preg_match('/=\?([a-zA-z0-9\-]+)\?(.*)\?=/i', $text, $match)) {
            $text = imap_utf8($text);
            if (strtolower(substr($match[1], 0, 2)) == 'gb') {
                $text = iconv('gbk', 'utf-8', $text);
            }
            if (strtolower(substr($match[1], 0, 2)) == 'ut') {
                if(strpos($text,'UTF') !== false){
                    $text = str_replace('=?UTF-8?B?','',$text);
                    $text = str_replace('?=','',$text);
                    $text = base64_decode($text);
                }

            }
            return $text;
        }
        return $this->_iconv_utf8($text);
    }

    function _iconv_utf8($text)
    {
        $out_string = mb_detect_encoding($text, array("ASCII", "UTF-8", "GB2312", "GBK", "BIG5"));
        if ($out_string != 'UTF-8'){
            $s1 = iconv('gbk', 'utf-8', $text);
            $s0 = iconv('utf-8', 'gbk', $s1);
            if ($s0 == $text) {
                return $s1;
            } else {
                return $text;
            }
        } else {
            return $text;
        }

    }

    /**
     * Set path name of the uploaded file to be saved.
     *
     * @param  int    $fileID
     * @param  string $extension
     * @access public
     * @return string
     */
    public function setPathName($fileID, $extension)
    {
        return date('Ym/dHis', time()) . $fileID . mt_rand(0, 10000) . '.' . $extension;
    }

}
