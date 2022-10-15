<?php
$cId = session('custId');
$per_balance = balance( $cId,1 );
$ulc_balance = balance( $cId,0 );
?>
<div class="panel">
    <div class="panel-heading">
        <h6 class="panel-title" style="position: relative">资金总览</h6>
    </div>
    <div class="container-fluid">
        <div class="row text-center" style="padding-left: 5px;">
            <div class="col-md-4">
                <div class="content-group text-left">
                    <h6 class="text-semibold no-margin"> <?=number_format($per_balance+$ulc_balance , 2 );?></h6>
                    <span class="text-muted text-size-small">可用余额</span>
                </div>
            </div>

            <div class="col-md-4">
                <div class="content-group text-left">
                    <h6 class="text-semibold no-margin"><?=number_format($per_balance, 2 );?></h6>
                    <span class="text-muted text-size-small">每单余额</span>
                </div>
            </div>

            <div class="col-md-4">
                <div class="content-group text-left">
                    <h6 class="text-semibold no-margin"> <?=number_format($ulc_balance, 2 );?></h6>
                    <span class="text-muted text-size-small">未分配资金</span>
                </div>
            </div>
        </div>
    </div>
</div>
