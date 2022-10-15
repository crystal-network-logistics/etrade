
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
            <div class="tabbable">
                <ul class="nav nav-pills nav-pills-toolbar text-center nav-xs" style="margin-bottom: 0px">
                    <li><a href="#" data-toggle="tab" data-table="project">业务消息 <span class="badge_project"> </span> </a></li>
                    <li class="active"><a href="#" data-toggle="tab" data-table="entryform">报关资料 <span class="badge_entryform"> </span> </a></li>
                    <li><a href="#" data-toggle="tab" data-table="vii">增票信息 <span class="badge_vii"> </span> </a></li>
                    <li><a href="#" data-toggle="tab" data-table="receipt">收入情况 <span class="badge_receipt"> </span> </a></li>
                    <li><a href="#" data-toggle="tab" data-table="receiptclaim">收入申领 <span class="badge_receiptclaim"> </span> </a></li>
                    <li><a href="#" data-toggle="tab" data-table="payment">支付情况 <span class="badge_payment"> </span> </a></li>
                    <li><a href="#" data-toggle="tab" data-table="products">产品消息 <span class="badge_products"> </span> </a></li>
                    <li><a href="#" data-toggle="tab" data-table="invoicer">开票人 <span class="badge_invoicer"> </span> </a></li>
                    <li><a href="#" data-toggle="tab" data-table="stamp">盖章 <span class="badge_stamp"> </span> </a></li>
                    <?php if(ckAuth(false)) :?>
                    <li><a href="#" data-toggle="tab" data-table="paymentcl">成本支付 <span class="badge_paymentcl"> </span> </a></li>
                    <li><a href="#" data-toggle="tab" data-table="user">新用户 <span class="badge_user"> </span></a></li>
                    <?php endif;?>
                </ul>
            </div>
        </div>
        <div class="div_table" style="border-top: 1px solid #eee"></div>
    </div>
</div>
<script>
    $(function () {load_view('entryform');});
    $('.notify div.tabbable li>a').on('click',function () { var tb = $(this).data('table');load_view(tb);});
    function load_view(tb){comm.doRequest(`/message/notify/load/${tb}`,{},(resp)=>{$('.div_table').html(resp)});}
</script>
