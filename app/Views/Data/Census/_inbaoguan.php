<table class="table table-hover tb_baoguan">
    <thead>
    <tr>
        <th width="220px">客户</th>
        <th width="120px">业务单号</th>
        <th width="100px">出运日期</th>
        <th width="80px">币种</th>
        <th width="90px" class="text-right">报关金额</th>
    </tr>
    </thead>
</table>

<script>
    var bgdatadt;
    $(function(){
        bgdatadt = comm.dt({
            ele: $('.tb_baoguan'),
            url: '/data/census/load_baoguan_data?isentrance=1&' + $('.frm_data_census').serialize(),
            columns: ['customername', 'BusinessID', 'exportdate', 'currency', 'amount'],
            columnDefs: [
                {
                    aTargets: [1],
                    mRender: function (data, full) {
                        if(data) return `<a target="_blank" href="/declares/${full.isentrance==0?'project':'import' }/view?id=${full.id}">${data}</a>`;
                        return '';
                    }
                },
                {
                    aTargets: [4],
                    mRender: function (data, full) {
                        return `<div class="text-right">${data?comm.fMoney( data ):'--'}</div>`;
                    }
                }
            ],
            drawCallback : function ( setting ) {
                $('.span_total').text( comm.fMoney( setting.json.sum ) );
            }
        });
    });
</script>
