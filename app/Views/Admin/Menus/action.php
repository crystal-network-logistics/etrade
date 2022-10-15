<?php
    $tag = time() + rand(1000,9999);
    $action = isset($model) ? $model : false;
?>
<tr class="<?=$tag?>">
    <td><div name="div" class="text-center">1</div><input type="hidden" value="<?=$action?$action->id:''?>" name="action[id][]"></td>
    <td><input type="text" name="action[name][]" class="form-control input-xs" value="<?=$action?$action->name:''?>" size="8" required=""></td>
    <td><input type="text"  name="action[code][]" class="form-control input-xs" value="<?=$action?$action->code:''?>" size="8" required=""></td>
    <td><input type="text"  name="action[uri][]" class="form-control input-xs" value="<?=$action?strtolower($action->uri):''?>" size="8" required=""></td>
    <td class="text-right">
        <?php if($action && $action->id) {?>
         <a href="/admin/menus/delaction?id=<?=$action->id?>" onclick="return comm.confirmCTL(this.href,'确定删除?',function (){_rm(<?=$tag?>);})" class="label bg-danger">删除</a>
        <?php } else { ?>
            <a href="javascript:;" onclick="_rm(<?=$tag?>)" class="label bg-danger">移除</a>
        <?php } ?>
    </td>
</tr>
