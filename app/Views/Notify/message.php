
<?=script_tag('uploads/js/__PROJECT_STATE.js')?>
<?=script_tag('uploads/js/__CITY.js')?>
<?=script_tag('uploads/js/__COUNTRY.js')?>
<?=script_tag('uploads/js/__CITYEN.js')?>
<?=script_tag('uploads/js/__COUNTRYEN.js')?>
<?=script_tag('uploads/js/__INOVICE_STATUS.js')?>
<?=script_tag('uploads/js/__PRODUCT_STATUS.js')?>
<?=script_tag('uploads/js/__PAYMENTSTATUS.js')?>
<?=script_tag('uploads/js/__RECEIPTSTATUS.js')?>
<?=script_tag('uploads/js/__USAGE.js')?>
<?=script_tag('uploads/js/__VIISTATUS.js')?>

<div class="content notify">
    <div class="panel panel-flat">
        <div class="panel-body" style="padding: 10px 20px">
            <form class="frm_search form-horizontal">
                <div class="row">
                    <div class="col-md-12">
                        <input class="form-control inline input-320" placeholder="查询关键字" name="keys">

                        <button class="btn btn-primary search" type="button">查询</button>
                    </div>
                </div>
            </form>
        </div>
        <?=$view?>
    </div>
</div>
