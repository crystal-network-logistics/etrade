<div class="content">
    <div class="panel panel-flat">
        <div class="panel-body" style="padding: 10px 20px">
            <div class="tabbable">
                <ul class="nav nav-pills nav-pills-toolbar text-center nav-xs" style="margin-bottom: 0px">
                    <li class="active"><a href="#1" data-toggle="tab" data-info=""> 增票明细</a></li>
                    <?php if ( ckAuth(false) ): ?>
                        <li class=""><a href="#2" data-toggle="tab" data-status="2" onclick="load_vii_in_data()"> 预付货款 </a></li>
                        <li class=""><a href="#3" data-toggle="tab" data-status="3" onclick="load_vii_out_data()"> 应付货款 </a></li>
                    <?php endif;?>
                </ul>
            </div>
        </div>

        <div class="tab-content" style="border-top: 1px solid #eee">
            <div class="tab-pane active" id="1">
                    <?=view('/Declares/Vii/data')?>
            </div>

            <?php if ( ckAuth(false) ): ?>
            <div class="tab-pane" id="2">
                <?=view('/Declares/Vii/vii_pay_in_out',['pay' => 'in'])?>
            </div>

            <div class="tab-pane" id="3">
                <?=view('/Declares/Vii/vii_pay_in_out',['pay' => 'out'])?>
            </div>
            <?php endif;?>
        </div>
    </div>
</div>
