<?php
namespace App\Libraries;

use App\Models\Admin\Users;

class LibComm {

    /**
     * 图形验证码
     *
     * */
    static function Captcha(){
        session_start();
        $image = imagecreatetruecolor(100, 35);    //1>设置验证码图片大小的函数
        //5>设置验证码颜色 imagecolorallocate(int im, int red, int green, int blue);
        $bgcolor = imagecolorallocate($image,255,255,255); //#ffffff
        //6>区域填充 int imagefill(int im, int x, int y, int col) (x,y) 所在的区域着色,col 表示欲涂上的颜色
        imagefill($image, 0, 0, $bgcolor);
        //10>设置变量
        $captcha_code = "";
        //7>生成随机的字母和数字
        for($i=0;$i<4;$i++){
            //设置字体大小
            $fontsize = 18;
            //设置字体颜色，随机颜色
            $fontcolor = imagecolorallocate($image, rand(0,120),rand(0,120), rand(0,120));      //0-120深颜色
            //设置需要随机取的值,去掉容易出错的值如0和o
            $data ='abcdefghigkmnpqrstuvwxy123456789ABCDEFGHIJKLMNPQRSTUVWSYZ';
            //取出值，字符串截取方法  strlen获取字符串长度
            $fontcontent = substr($data, rand(0,strlen($data)),1);
            //10>.=连续定义变量
            $captcha_code .= $fontcontent;
            //设置坐标
            $x = ($i*100/4)+rand(5,10);
            $y = rand(5,10);
            imagestring($image,$fontsize,$x,$y,$fontcontent,$fontcolor);
        }
        //10>存到session
        $_SESSION['authcode'] = $captcha_code;
        //8>增加干扰元素，设置雪花点
        for($i=0;$i<200;$i++){
            //设置点的颜色，50-200颜色比数字浅，不干扰阅读
            $pointcolor = imagecolorallocate($image,rand(50,200), rand(50,200), rand(50,200));
            //imagesetpixel — 画一个单一像素
            imagesetpixel($image, rand(1,99), rand(1,29), $pointcolor);
        }
        //9>增加干扰元素，设置横线
        for($i=0;$i<3;$i++){
            //设置线的颜色
            $linecolor = imagecolorallocate($image,rand(80,220), rand(80,220),rand(80,220));
            //设置线，两点一线
            imageline($image,rand(1,99), rand(1,29),rand(1,99), rand(1,29),$linecolor);
        }

        //2>设置头部，image/png
        header('Content-Type: image/png');
        //3>imagepng() 建立png图形函数
        imagepng($image);
        //4>imagedestroy() 结束图形函数 销毁$image
        imagedestroy($image);
    }

    /**
     *  数据导入
     * @param string $file excel文件
     * @param string $sheet
     * @return string   返回解析数据
     * @throws PHPExcel_Exception
     * @throws PHPExcel_Reader_Exception
     */
    static function ReadExcel($file='', $sheet = 0) {
        //引用PHPexcel 类
        require(APPPATH.'Libraries/PHPExcel.php');
        require(APPPATH.'Libraries/PHPExcel/IOFactory.php');//静态类

        $file = iconv("utf-8", "gb2312", $file);   //转码

        if(empty($file) OR !file_exists($file)) {
            die('file not exists!');
        }
        $objRead = new \PHPExcel_Reader_Excel2007();   //建立reader对象
        if(!$objRead->canRead($file)){
            $objRead = new \PHPExcel_Reader_Excel5();
            if(!$objRead->canRead($file)){
                die('No Excel!');
            }
        }
        $cellName = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP', 'AQ', 'AR', 'AS', 'AT', 'AU', 'AV', 'AW', 'AX', 'AY', 'AZ');
        $obj = $objRead->load($file);  //建立excel对象
        $currSheet = $obj->getSheet($sheet);   //获取指定的sheet表
        $columnH = $currSheet->getHighestColumn();   //取得最大的列号
        $columnCnt = array_search($columnH, $cellName);
        $rowCnt = $currSheet->getHighestRow();   //获取总行数
        $data = [];
        for($_row=1; $_row<=$rowCnt; $_row++){  //读取内容
            if($_row > 1) {
                for ($_column = 0; $_column <= $columnCnt; $_column++) {
                    $cellId = $cellName[$_column] . $_row;
                    $cellValue = $currSheet->getCell($cellId)->getValue();
                    if ($cellValue instanceof \PHPExcel_RichText) {   //富文本转换字符串
                        $cellValue = $cellValue->__toString();
                    }

                    $data[$_row - 2][$cellName[$_column]] = $cellValue;
                }
            }
        }
        return $data;
    }

    /**
     * 数据导出
     * @param array $title   标题行名称
     * @param array $data   导出数据
     * @param string $fileName 文件名
     * @param string $savePath 保存路径
     * @param $type   是否下载  false--保存   true--下载
     * @return string   返回文件全路径
     * @throws \PHPExcel_Exception
     * @throws PHPExcel_Reader_Exception
     */
    static function ExportExcel($title=array(), $data=array(), $fileName='', $savePath='./', $isDown=true){

        require_once (APPPATH.'Libraries/PHPExcel.php');
        require_once (APPPATH.'Libraries/PHPExcel/IOFactory.php');//静态类
        $obj = new \PHPExcel();
        //横向单元格标识
        $cellName = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP', 'AQ', 'AR', 'AS', 'AT', 'AU', 'AV', 'AW', 'AX', 'AY', 'AZ','BA','BB','BC','BD','BE','BF','BG','BH','BI','BJ','BK','BL','BM','BN','BO','BP','BQ','BR','BS');
$obj->getActiveSheet(0)->setTitle(date('YmdHis'));   //设置sheet名称
        $_row = 1;   //设置纵向单元格标识

        if($title){
            $i = 0;
            foreach($title AS $v){   //设置列标题
                $obj->setActiveSheetIndex(0)->setCellValue($cellName[$i].$_row, $v);
                $i++;
            }
            $_row++;
        }

        //填写数据
        if($data){
            $i = 0;
            foreach($data AS $_v){
                $j = 0;
                foreach($_v AS $_cell){
                    $obj->getActiveSheet(0)->setCellValue($cellName[$j] . ($i+$_row), $_cell);
                    $j++;
                }
                $i++;
            }
        }

        //文件名处理
        if(!$fileName){
            $fileName = uniqid(time(),true);
        }

        //$objWrite = \IOFactory::createWriter($obj, 'Excel2007');
        $objWrite = \IOFactory::createWriter($obj, 'Excel5');

        if($isDown){   //网页下载
            header('pragma:public');
            header("Content-Disposition:attachment;filename=$fileName.xls");
            $objWrite->save('php://output');exit;
        }

        $_fileName = iconv("utf-8", "gb2312", $fileName);   //转码
        $_savePath = $savePath.$_fileName.'.xlsx';
        $objWrite->save($_savePath);

        return $savePath.$fileName.'.xlsx';
    }

    /**
     * object to array
     * @param array $object   标题行名称
     * @return array   返回文件全路径
     */
    static function obj2array(&$object) {
        $object =  json_decode( json_encode( $object),true);
        return  $object;
    }

    /**
     * 将pdf转化为单一png图片
     *
     * @param string $pdf  pdf所在路径 （/www/pdf/abc.pdf pdf所在的绝对路径）
     * @param string $path 新生成图片所在路径 (/www/pngs/)
     * */
    static function pdf_to_png( $pdf , $path,$name = null ){
        try {
            if(!extension_loaded('imagick')){
                log_message('error','not unload imagick');
            }
            log_message('error',$pdf);
            if(!file_exists($pdf)){
                log_message('error','the path of pdf is not exists!');
            }

            $im = new \Imagick();
            $im->setCompressionQuality(100);
            $im->setResolution(120, 120);//设置分辨率 值越大分辨率越高
            log_message('error','Readding');
            $im->readImage($pdf);

            $canvas = new \Imagick();
            $imgNum = $im->getNumberImages();
            $paddingwidth = 25;
            $paddingheight = 30;
            foreach ($im as $k => $sub) {
                $sub->setImageFormat('png');
                //$sub->setResolution(120, 120);
                $sub->stripImage();
                $sub->trimImage(0);
                $width = $sub->getImageWidth() + 2 * $paddingwidth;
                $height = $sub->getImageHeight() + 2 * $paddingheight;
                if ($k + 1 == $imgNum) {
                    $height += $paddingheight;
                } //最后添加10的height
                $canvas->newImage($width, $height, new \ImagickPixel('white'));

                $canvas->compositeImage($sub, \Imagick::COMPOSITE_DEFAULT, $paddingwidth, $paddingheight);
            }

            $canvas->resetIterator();
            if( $name ){
                $newfile_name = $path . $name . '.png';
            }else{
                $newfile_name = $path . microtime(true) . '.png';
            }
            $canvas->appendImages(true)->writeImage($newfile_name);

            return $newfile_name;
        } catch (\Exception $e) {
            log_message('error',$e->getMessage());
            throw $e;
        }
    }

    /**
     * 时间转换
     *
     * @param int $time 时间
     * @return string 返回文本
     * */
    static function TranTime($time) {
        $C = date("m-d H:i",$time);
        $T = date("Y-m-d H:i",$time);
        $H = date("H:i",$time);
        $D = date("d",$time);
        $CD = date("d");
        $time = time() - $time;
        if ($time < 60) {
            $str = $time .' 秒前';
        } elseif ($time < 60 * 60) {
            $min = floor($time/60);
            $str = $min.' 分钟前';
        } elseif ($time < 60 * 60 * 24) {
            $h = floor($time/(60*60));
            if($h > 12 && $CD > $D) $str = '昨天 '.$H;
            else $str = $h.'小时前 '.$H;
        } elseif ($time < 60 * 60 * 24 * 3) {
            $d = floor($time/(60*60*24));
            if($d==1) $str = '昨天 '.$H;
            else$str = '前天 '.$H;
        } elseif ($time < 60 * 60 * 24 * 7) {
            $d = floor($time/(60*60*24));
            $str = $d.' 天前 '.$H;
        } elseif ($time < 60 * 60 * 24 * 30) {
            $str = $C;
        } else {
            $str = $T;
        }
        return $str;
    }

    static function Unit($idx){
        $UNIT = ['台','个','件','支','座','千克','套','箱','辆','只','袋','艘','架','头','张','枝','根','条','把','块','卷','副','片','组','份','幅','双','对','棵','株','井','米','盘','平方米','立方米','筒','克','盆','万个','具','刀','扇','英尺','吨','斤','磅','担','两','盎司','克拉','码','英寸','寸','升','毫升','加仑','批','罐','桶','扎','包','箩','筐','打','匹','册','本','发','枚','捆','粒','盒','瓶','部','樘','面','颗','道'];
        return $UNIT[$idx];
    }

    static $ZMXZ = array(
        '101'=>'一般征税',
        '201'=>'无偿援助',
        '299'=>'其他法定',
        '301'=>'特定区域',
        '399'=>'其他地区',
        '413'=>'残疾人',
        '502'=>'来料加工',
        '503'=>'进料加工',
        '601'=>'中外合资',
        '602'=>'中外合作',
        '603'=>'外资企业',
        '898'=>'国批减免',
        '998'=>'内部暂定',
        '999'=>'例外减免'
    );

    public static $tipic = array(
        'TOPIC_NEW_USR'=>'新用户注册',
        'TOPIC_APPROVE_PRODUCT'=>'待审核产品',
        'TOPIC_CONFIRM_PRODUCT'=>'产品待确认',
        'TOPIC_SUPPLEMENT_MATERIAL'=>'产品待补充资料',
        'TOPIC_APPROVED_PRODUCT'=>'产品审核通过',

        'TOPIC_APPROVE_INVOICER'=>'待审核开票人',
        'TOPIC_REJECTED_INVOICER'=>'开票人审核拒绝',
        'TOPIC_APPROVED_INVOICER'=>'开票人审核通过',

        'TOPIC_APPROVE_ENTRYFORM'=>'待审核报关资料',
        'TOPIC_APPROVED_ENTRYFORM'=>'报关资料审核通过',
        'TOPIC_RETURNED_ENTRYFOM'=>'报关资料退单修改',
        'TOPIC_CONFIRM_CLEARANCE'=>'确认通关',
        'TOPIC_DOWNLOADED_ENTRYFORM'=>'下载报关资料',

        'TOPIC_ENTRYFORM_ARCHIVES'=>'提交备案单据',
        'TOPIC_ENTRYFORM_ARCHIVES_APPROVE'=>'备案单据审核通过',

        'TOPIC_APPROVE_VII'=>'待审核增票',
        'TOPIC_CONFIRMED_VII'=>'确认增票',
        'TOPIC_CONFIRM_VII'=>'待确认增票',
        'TOPIC_APPLY_VII'=>'申请查看增票',
        'TOPIC_UPLOADED_VII'=>'新上传增票',
        'TOPIC_TRANSFERED_VII'=>'增票转出',
        // 'TOPIC_EDIT_CONFIRM_VII'=>'编辑或确认增票',
        'TOPIC_APPLY_TAXREFUND'=>'申请退税',
        'TOPIC_APPROVED_TAXREFUND'=>'批准退税',
        'TOPIC_REJECTED_TAXREFUND'=>'新拒绝退税',

        'TOPIC_RECEIPTCLAIM'=>'收入申领',
        'TOPIC_APPROVE_RECEIPT'=>'待审核收入',
        //'TOPIC_RECEIPTCLAIM_APPROVE'=>'收入申领审核',
        'TOPIC_NEW_RECEIPT'=>'新增收入',
        'TOPIC_ALLOCATE_RECEIPT'=>'新分配收入',
        'TOPIC_UPLOADED_BANK_RECEIPT'=>'上传收入水单',
        'TOPIC_TRANSFERED_RECEIPT'=>'收入转出',
        'TOPIC_APPLY_BANK_RECEIPT'=>'申请查看收入水单',

        'TOPIC_APPROVE_PAYMENT'=>'待审核支付',
        'TOPIC_CONFIRM_PAYMENT'=>'确认支付',
        'TOPIC_UPLOADED_BANK_PAYMENT'=>'上传支付水单',
        'TOPIC_TRANSFER_PAYMENT'=>'支付转出',
        'TOPIC_APPLY_BANK_PAYMENT'=>'申请查看支付水单',

        'TOPIC_APPROVE_PAYMENTCL'=>'待审核成本支付',
        'TOPIC_CONFIRM_PAYMENTCL'=>'确认成本支付',
        'TOPIC_TRANSFER_PAYMENTCL'=>'成本支付转出',

        'TOPIC_STAMP_ING'=>'待审核盖章',
        'TOPIC_STAMP_ED'=>'盖章完成',
    );

    public static function topic_text($key){
        return self::$tipic[$key];
    }

    static function cny($num,$mode = true,$sim = true){
        if(!is_numeric($num)) return '含有非数字非小数点字符！';
        $char    = $sim ? array('零','一','二','三','四','五','六','七','八','九')
            : array('零','壹','贰','叁','肆','伍','陆','柒','捌','玖');
        $unit    = $sim ? array('','十','百','千','','万','亿','兆')
            : array('','拾','佰','仟','','萬','億','兆');
        $retval  = $mode ? '元':'点';
        //小数部分
        if(strpos($num, '.')){
            list($num,$dec) = explode('.', $num);
            $dec = strval(round($dec,2));
            if($mode){
                $retval .= "{$char[$dec['0']]}角{$char[$dec['1']]}分";
            }else{
                for($i = 0,$c = strlen($dec);$i < $c;$i++) {
                    $retval .= $char[$dec[$i]];
                }
            }
        }
        //整数部分
        $str = $mode ? strrev(intval($num)) : strrev($num);
        for($i = 0,$c = strlen($str);$i < $c;$i++) {
            $out[$i] = $char[$str[$i]];
            if($mode){
                $out[$i] .= $str[$i] != '0'? $unit[$i%4] : '';
                if($i>1 and $str[$i]+$str[$i-1] == 0){
                    $out[$i] = '';
                }
                if($i%4 == 0){
                    $out[$i] .= $unit[4+floor($i/4)];
                }
            }
        }
        $retval = join('',array_reverse($out)) . $retval;
        return $retval;
    }
}
