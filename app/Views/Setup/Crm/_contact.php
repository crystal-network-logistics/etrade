<?php
    $tag = time() + (float)microtime()*1000000;
    //$item = $data['item'];
?>
<div class="row" name="div" id="<?=$tag?>" style="border-radius: 2px">
    <div name="cld" style="background-color:rgb(243,245,249);margin-bottom:15px;overflow:auto;">
        <div class="customrow">
            <input type="hidden" name="contact[tags][]" value="<?=$tag?>">
            <div class="idblock <?=$tag?>">1</div>
            <div class="linkarea">
                <?php if ( $item ) :?>
                    <a class="link" style="cursor:pointer" href="/setup/crm/delete?id=<?=$item['id']?>" onclick="return "> 删除 </a>
                <?php else :?>
                    <a class="link" style="cursor:pointer" onclick="_removed(<?=$tag?>)"> 移除 </a>
                <?php endif;?>
            </div>
        </div>

        <div class="customrow" style="margin-bottom: 0px;">
            <table style="width: 100%">
                <thead style="background-color:rgb(210,220,233)">
                <tr>
                    <th style="padding:5px">姓名(<span class="text-danger">*</span>)</th>
                    <th style="padding:5px">邮箱</th>
                    <th style="padding:5px">电话</th>
                    <th style="padding:5px">手机</th>
                    <th style="padding:5px">性别</th>
                    <th style="padding:5px">生日</th>
                    <th style="padding:5px">职务</th>
                    <th style="padding:5px">QQ</th>
                    <th style="padding:5px">微信</th>
                    <th style="padding:5px">联系地址</th>
                    <th style="padding:5px">状态</th>
                    <th style="padding:5px">备注</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td style="padding:5px"><input  type="hidden" name="contact[id][]" value="<?=$item['id']??''?>"><input name="contact[name][]" size="20"value="<?=$item['name']?>" required="true"></td>
                    <td style="padding:5px"><input  name="contact[email][]"  size="10" value="<?=$item['email']??''?>"></td>
                    <td style="padding:5px"><input  name="contact[tel][]"  size="10" value="<?=$item['tel']?>"></td>
                    <td style="padding:5px"><input  name="contact[phone][]" style="height: 26px;"  size="10" value="<?=$item['phone']??''?>"></td>
                    <td style="padding:5px"><select name="contact[sex][]"><option value="男" <?php echo $item['sex']=='男'?'selected':''?>>男</option><option value="女" <?php echo $item['sex']=='女'?'selected':''?>>女</option></select></td>
                    <td style="padding:5px"><input  name="contact[birthday][]" autocomplete="off" size="10" value="<?=$item['birthday']??''?>" onclick="WdatePicker({maxDate:'<?php echo date('Y-m-d')?>//'})"></td>
                    <td style="padding:5px"><input  name="contact[position][]"  size="10" value="<?=$item['position']??''?>"></td>
                    <td style="padding:5px"><input  name="contact[qq][]"  size="10" value="<?=$item['qq']??''?>"></td>
                    <td style="padding:5px"><input  name="contact[weixin][]"  size="10" value="<?=$item['weixin']??''?>"></td>
                    <td style="padding:5px"><input  name="contact[address][]"  size="10" value="<?=$item['address']??''?>"></td>
                    <td style="padding:5px"><select name="contact[status][]"><option value="0" <?php echo $item['sex']=='0'?'selected':''?>>启用</option><option value="1" <?php echo $item['sex']=='1'?'selected':''?>>禁用</option></select></td>
                    <td style="padding:5px"><input  name="contact[remark][]"  size="10" value="<?=$item['remark']??''?>"></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
