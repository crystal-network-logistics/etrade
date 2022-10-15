<?php
    $projectId = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
    $customerId = (ckAuth()?session('custId'):(isset($_REQUEST['customerid'])?$_REQUEST['customerid']:0))
?>
<div class="panel">
    <div class="panel-body nav-search" style="padding: 2px">
        <div class="form-horizontal frm_unlocated_search" action="#">
            <div class="row">
                <div class="col-md-12">
                    <input name="customerid" type="hidden" value="<?=$customerId?>">
                    <input name="keys" class="form-control inline input-220" placeholder="输入查询 关键字">
                    <button class="btn btn-sm btn-success" type="button" onclick="load_unlocated_data()"><i class="icon icon-search4"></i> 查询</button>
                </div>
            </div>
        </div>
    </div>

    <table class="table table-hover tb_unlocated">
        <thead>
        <tr>
            <th width="60px">操作</th>
            <th width="100px">收款日期</th>
            <th width="160px">付款人</th>
            <th width="80px">地区</th>
            <th width="60px">币种</th>
            <th width="120px">金额</th>
            <th width="90px">汇率</th>
            <th width="100px">折RMB</th>
            <th width="100px">账户类型</th>
            <th width="120px">备注</th>
        </tr>
        </thead>
    </table>
</div>

<?=script_tag('uploads/js/__COUNTRY.js')?>
<?=script_tag('uploads/js/__ACCOUNT.js')?>

<script>
    var tb_unlocated_receipt;
    $(function(){
        tb_unlocated_receipt = comm.dt({
            ele : $('.tb_unlocated'),
            size : 8,
            url : '/declares/receipt/load_unlocated_page?customerid=<?=$customerId?>',
            columns:[null,'receiptdate','payername','payercountry','currency','amount','exchangerate','id','accounttype','note'],
            columnDefs : [
                {
                    aTargets:[0],
                    mRender:function(data,full){
                        return `<a class="label bg-primary-300 hModal" data-group="pullin" href="/declares/receipt/pullin?id=${full.id}&projectid=<?=$projectId?>"
                        data-text="确认转入"
                        data-call="load_unlocated_data,load_receipts_data"
                        lang="资金转入">
                        转入
                        </a>`
                    }
                },
                {
                    aTargets:[2],
                    mRender:function(data,full){
                        return comm.ellipsis(data,data,140)
                    }
                },
                { aTargets:[3],
                    mRender:function(data,full){
                        return comm.dictionary(__COUNTRY,data)
                    }
                },
                { aTargets:[5],
                    mRender:function(data,full){
                        return comm.dictionary(__COUNTRY,data)
                    }
                },
                { aTargets:[7],
                    mRender:function(data,full){
                        return comm.fMoney(full.amount * full.exchangerate)
                    }
                },
                { aTargets:[8],
                    mRender:function(data,full){
                        return comm.dictionary(__ACCOUNT,data)
                    }
                }
            ],
            drawCallback:function ( setting ) {
                var mGuid = localStorage.getItem('mGuid');
                setTimeout( ()=> {$('.dataTables_scrollBody').css('height','');$(`#${mGuid} .dataTables_scrollHeadInner,#${mGuid} .tb_unlocated`).css('width','')},50);
                $('[data-popup=tooltip-ellipsis]').tooltip();
            }
        });
    });

    function load_unlocated_data(){
        var keys = $('.frm_unlocated_search input[name=keys]').val();
        tb_unlocated_receipt.fnReloadAjax(`/declares/receipt/load_unlocated_page?customerid=<?=$customerId?>&keys=${keys}`);
    }
</script>
