<?=script_tag('uploads/js/__COUNTRY.js')?>

<div class="content">
    <div class="panel panel-flat">
        <div class="panel-body" style="padding: 10px 20px">
            <div class="tabbable">
                <ul class="nav nav-pills nav-pills-toolbar text-center nav-xs" style="margin-bottom: 0px">
                    <li class="active"><a href="#1" data-toggle="tab" data-status="1"> <?=ckAuth()?'每单余额':'可用余额'?> </a></li>
                    <?php if ( ckAuth() ): ?>
                    <li class=""><a href="#2" data-toggle="tab" data-status="2"> 未分配资金 </a></li>
                    <?php endif;?>
                    <li class=""><a href="#3" data-toggle="tab" data-status="3" onclick="return load_receipt_claim_data(1)"> 申领记录 </a></li>
                    <li class=""><a href="#4" data-toggle="tab" data-status="4" onclick="return load_balance_log_data(1)"> 可用余额记录 </a></li>
                </ul>
            </div>
        </div>

        <div class="tab-content" style="border-top: 1px solid #eee">
            <div class="tab-pane active" id="1">
                <?php if ( ckAuth() ): ?>
                <?=view('/Capital/balance')?>
                <?php else :?>
                    <?=view('/Capital/balance_customer')?>
                <?php endif;?>
            </div>

            <?php if ( ckAuth() ): ?>
            <div class="tab-pane" id="2">
                <?=view('/Capital/unallocated')?>
            </div>
            <?php endif;?>
            <div class="tab-pane" id="3">
                <?=view('/Capital/receipt_claim')?>
            </div>

            <div class="tab-pane" id="4">
                <?=view('/Capital/balance_log')?>
            </div>
        </div>
    </div>
</div>
