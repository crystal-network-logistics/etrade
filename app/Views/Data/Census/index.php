<?php
    $is_has_agent = hasRole('agent');
?>
<div class="content">
    <div class="panel panel-flat">
        <div class="panel-body">
            <form class="frm_data_census form-horizontal">
                    <div class="col-md-12">
                        <?php if ( !$is_has_agent || hasRole('admin') ):?>
                        <?=\App\Libraries\LibComp::select('STATISTICS',['class'=>'select inline selects-120','name'=>'project','role'=>'min'],'maoli')?>
                        <?php else :?>
                        <input name="project" value="maoli" type="hidden">
                        <?php endif;?>
                        <?=\App\Libraries\LibComp::select('CURRENCY',['class'=>'select inline selects-120','name'=>'currency','role'=>'min'])?>

                        <?php if ( ckAuth(false) ):?>
                        <?=\App\Libraries\LibComp::get_customer(['class'=>'select inline selects-220','name'=>'customerid'])?>
                        <?php endif;?>

                        <input type="text" class="form-control inline input-120" name="sdate" onclick="WdatePicker({})" placeholder="起始日期" autocomplete="off">
                        <input type="text" class="form-control inline input-120" name="edate" onclick="WdatePicker({})" placeholder="结束日期" autocomplete="off">
                        <a type="button" class="btn btn-primary" id="todo"
                           href="/data/census/todo" onclick="return comm.doRequest(this.href,$('.frm_data_census').serialize(),(resp)=>{$('.data').html(resp)})">
                            <i class="icon icon-list"></i> 统计
                        </a>
                        <a href="/data/census/export" class="btn btn-info ExExcel" frm=".frm_data_census"><i class="icon icon-file-excel"></i> 导出Excel </a>

                        <a class="btn btn-success">合计: <span class="span_total">0.00</span></a>
                    </div>
            </form>
        </div>

        <div class="data" style="border-top: 1px solid #eee">
            <div style="text-align: center;padding: 20px;font-size: 14px;">查询暂无数据!</div>
        </div>
    </div>
</div>
<?php if ( $is_has_agent ):?>
<script>
    setTimeout(()=>{
        $('#todo').click();
    },200);
</script>
<?php endif;?>
