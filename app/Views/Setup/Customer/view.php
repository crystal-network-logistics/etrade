<?php
$data = $data['detail'] ?? false;
?>
<table class="table  table-bordered">
    <tr>
        <td style="width: 20%" class="detail-td">客户编号</td>
        <td style="width: 30%" class="detail-td"><code><?=$data['customerno']?></code></td>
        <td style="width: 20%" class="detail-td">客户名称</td>
        <td style="width: 30%" class="detail-td"><?=$data['customername']?></td>
    </tr>

    <tr>
        <td class="detail-td">代理费用</td>
        <td class="detail-td" colspan="3">代理费率: <code><?=(($data['commissionfee']*100).' %')?></code> , 代理费最低收费: <code><?=$data['commissionfeemin']?></code></td>
    </tr>
    <tr>
        <td class="detail-td">退税融资费</td>
        <td class="detail-td" colspan="3">退税融资费率: <code><?=(($data['taxrefundfee']*100).' %')?></code> , 退税融资最低费用: <code><?=$data['taxrefundfeemin']?></code> </td>
    </tr>
    <tr>
        <td class="detail-td">绑定操作员</td>
        <td class="detail-td" colspan="3"><?=$data['operators']?></td>
    </tr>

    <tr>
        <td style="width:20%" class="detail-td">手机号</td>
        <td colspan="3" class="detail-td"><?=$data['phone']?></td>
    </tr>

    <tr>
        <td class="detail-td">主营产品</td>
        <td class="detail-td" colspan="3"><?=$data['mainproducts']?></td>
    </tr>

</table>
