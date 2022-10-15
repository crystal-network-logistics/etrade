<?php
    $data = $data['detail'] ?? false;
?>
<table class="table  table-bordered">
    <tr>
        <td style="width: 20%" class="detail-td">HSCode编码</td>
        <td style="width: 30%" class="detail-td"><code><?=$data['code']?></code></td>
        <td style="width: 20%" class="detail-td">商品名称</td>
        <td style="width: 30%" class="detail-td"><?=$data['productname']?></td>
    </tr>

    <tr>
        <td class="detail-td">单位1</td>
        <td class="detail-td"><?=$data['officialunit1']?></td>
        <td class="detail-td">单位2</td>
        <td class="detail-td"><?=$data['officialunit2']?></td>
    </tr>

    <tr>
        <td class="detail-td">退税率</td>
        <td class="detail-td"><?=$data['taxreturnrate']?></td>
        <td class="detail-td">海关监管条件</td>
        <td class="detail-td"><?=$data['customsupervision']?></td>
    </tr>

    <tr>
        <td style="width:20%" class="detail-td">申报要素</td>
        <td colspan="3" class="detail-td"><?=$data['declarationelements']?></td>
    </tr>
</table>
