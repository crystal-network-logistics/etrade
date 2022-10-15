<?php
    $comm = new \App\Services\comm();
    $roles_data = $comm->get_roles_data();
    $topic = \App\Libraries\LibComm::$tipic;
    $total = count( $roles_data );
?>

<div class="panel panel-white">
    <div class="table-responsive noticerole" style="width: 100%;border-bottom: 1px solid #f5f5f5;">
        <table class="table table-bordered datatable-selection-single table-hover" style="width: 100%;">
            <thead>
                <tr>
                    <th width="<?=((100/($total + 1)))?>%"></th>
                    <?php foreach( $roles_data as $item ) :?>
                        <th width="<?=((100/($total + 1)))?>%">
                            <?=$item['name']?>
                            <?php if($item['creatorId'] != session('id')) :?>
                                <code class="text-muted text-size-small">(系统角色)</code>
                            <?php endif;?>
                        </th>
                    <?php endforeach; ?>
                </tr>
            </thead>
        </table>
    </div>

    <div class="table-responsive" style="max-height: 450px;">
        <table class="table table-bordered datatable-selection-single table-hover">
            <tbody>
            <?php
            $i = 0;
            foreach($topic as $key=>$val) { ?>
                <tr>
                    <td width="<?=((100/($total + 1)))?>%"><?= ($i+1) ?>. <?=$val?></td>
                    <?php foreach($roles_data as $row) {?>
                        <td width="<?=((100/($total + 1)))?>%">
                            <?php if( session('id') != $row['creatorId'] ) {
                                if( get_notice_roles( $key, $row['id'],$row['creatorId'] ) ) { ?>
                                <i class=" icon-checkmark2 text-success"></i>
                            <?php } else { ?>
                                <i class=" icon-cross3 text-danger"></i>
                            <?php }
                            } else {?>
                                <span>
                                    <input type="checkbox"
                                        <?php echo get_notice_roles( $key, $row['id'], $row['creatorId'] ) ? 'checked' : ''?>
                                        onclick="comm.doRequest('/message/notify/save_notice_roles',{topic:'<?=$key?>','roleid':'<?=$row['id']?>'},(resp)=>{comm.Alert(resp.msg,resp.code)},'json')">
                                </span>
                            <?php }?>

                        </td>
                    <?php }?>

                </tr>
            <?php $i ++;}?>
            </tbody>
        </table>
    </div>
</div>
