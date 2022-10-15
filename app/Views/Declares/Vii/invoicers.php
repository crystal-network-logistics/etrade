<?php
    $projectId = $data['projectid'];
    $data = isset( $data['detail'] ) ? $data['detail']: [];
?>
<table class="table table-hover" style="width:100%;  border: 1px solid #eee" align="center">
    <?php foreach ( $data as $item ) :?>
        <tr>
            <td class="text-left" style="width:50%;"> <?=$item['name']?> </td>
            <td class="text-center" style="width:25%;"> 下载 <a href="/declares/project/viidownload/1?id=<?=$projectId?>&invoicerId=<?=$item['id']?>" target="_blank">开票信息</a> </td>
            <td class="text-center" style="width:25%;"> 下载 <a href="/declares/project/viidownload/2?id=<?=$projectId?>&invoicerId=<?=$item['id']?>" target="_blank">采购合同</a></td>
        </tr>
    <?php endforeach;?>
</table>
