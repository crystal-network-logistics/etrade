<?php
    $isentrance = $data['isentrance'];
?>
<table class="table table-hover" style="width:100%;  border: 1px solid #eee" align="center">
    <tr>
        <td class="text-center" style="width:50%;padding: 3px;"> <?=$isentrance==0?'':'进口'?>报关单草单: </td>
        <td class="text-center"> 点击 <a href="/declares/project/fdownload/1?id=<?=$data["Id"]?>" target="_blank">下载</a></td>
    </tr>
    <tr>
        <td class="text-center" > 报关资料合同: </td>
        <td class="text-center"> 点击 <a href="/declares/project/fdownload/3?id=<?=$data["Id"]?>" target="_blank">下载</a></td>
    </tr>
    <tr>
        <td class="text-center" > 报关资料发票: </td>
        <td class="text-center"> 点击 <a href="/declares/project/fdownload/2?id=<?=$data["Id"]?>" target="_blank">下载</a></td>
    </tr>
    <tr>
        <td class="text-center" > 报关资料箱单: </td>
        <td class="text-center"> 点击 <a href="/declares/project/fdownload/4?id=<?=$data["Id"]?>" target="_blank">下载</a></td>
    </tr>
    <?php if ( $isentrance==0 ): ?>
    <tr>
        <td class="text-center" > 报关委托书: </td>
        <td class="text-center"> 点击 <a href="/declares/project/fdownload/5?id=<?=$data["Id"]?>" target="_blank">下载</a></td>
    </tr>
    <?php else: ?>
        <tr>
            <td class="text-center" > 代理进口协议: </td>
            <td class="text-center"> 点击 <a href="/declares/project/fdownload/5?id=<?=$data["Id"]?>" target="_blank">下载</a></td>
        </tr>

        <tr>
            <td class="text-center" > 外单报关单: </td>
            <td class="text-center"> 点击 <a href="/declares/project/fdownload/6?id=<?=$data["Id"]?>" target="_blank">下载</a></td>
        </tr>
    <?php endif;?>
</table>
<script>
    $(function () {
        setTimeout(()=>{
            $(`#${localStorage.getItem('mGuid')} .btn-submit`).unbind().on('click',function () {
                window.location.href = '/declares/project/fdownload?id=<?=$data["Id"]?>'
            });
        },1000)
    });
</script>

