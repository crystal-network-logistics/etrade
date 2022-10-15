

<div class="panel-tabs">
    <ul class="nav nav-xs nav-pills" style="margin-bottom: 10px">
        <li class="active"><a href="#tab_unlocated" data-toggle="tab" data-v="1"> 从未分配资金转入 </a></li>
        <li class=""><a href="#receipt_create" data-toggle="tab" data-v="2"> <?=ckAuth() ? '申领收入' : '新增收入'?> </a></li>
        <li class=""><a href="#receipt_claim_record" data-toggle="tab" data-v="3"> 申领记录 </a></li>
    </ul>
</div>

<div class="tab-content">
    <div class="tab-pane active" id="tab_unlocated">
        <?=view('/Declares/Receipt/unlocated')?>
    </div>

    <div class="tab-pane" id="receipt_create">
        <?php if ( ckAuth() ):?>
            <?=view('/Declares/Claim/form')?>
        <?php else :?>
            <?=view('/Declares/Receipt/form',['data' =>$data])?>
        <?php endif;?>
    </div>

    <div class="tab-pane" id="receipt_claim_record">
        <?=view('/Declares/Claim/records')?>
    </div>
</div>
<script>
    var fname = "#frm_receipt_create";
    $('#receipt_create select').select2();
    $(`${fname} select[name=accounttype],${fname} select[name=usage]`).select2({minimumResultsForSearch:-1});
    $(function (){
        setTimeout(()=>{
            $('.nav-pills>li>a').on('click',function () {
                var btn = $('.btn_receipt_save');
                ( $(this).data('v') == 1 || $(this).data('v') == 3 ) ? btn.addClass('hide'):btn.removeClass('hide');
            });},500);
    });
    // 点击保存
    function receipt_to_submit(){
        $('.btn_receipt_submit').click();
    }
    var timeout = 0;
    $('#pname,#claim_pname').autocomplete({
        minChars: 2,
        lookup: function (query, done) {
            clearTimeout(timeout);
            var keys = $('#pname').val();
            timeout = setTimeout(function (){
                var customerid = $('#frm_receipt_create input[name=customerid]').val()
                comm.doRequest('/setup/payer/auto_data',{ keys : keys ,customerid : customerid }, (resp)=> {
                    console.log(resp.data);
                    var data = [];
                    $.each(resp.data,function (k,v) {
                        //console.log()
                        data.push({ value : `${v.name}${ v.bankname?('('+ v.bankname + v.account +')') : '' } `, data : v })
                    });
                    var result = {
                        suggestions : data
                    };
                    done(result);
                },'json');
            },300);
        },
        onSelect: function(suggestion) {
            //console.log('suggestion:',suggestion);
            $('#frm_receipt_create input[name=payername],#frm_receipt_claim_approve input[name=payername]').val(suggestion.data.name);
            $('#frm_receipt_create input[name=payerid]').val(suggestion.data.id);
            $('#frm_receipt_create input[name=bank]').val(suggestion.data.bankname);
            $('#frm_receipt_create input[name=bankaccount]').val(suggestion.data.account);
        },
    });
</script>
