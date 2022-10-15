
<table class="table table-hover tb_vii">
    <thead>
    <tr>
        <th width="220px">客户</th>
        <th width="120px">业务单号</th>
        <th width="90px">开票金额</th>
        <th width="100px" class="text-right">开票日期</th>
    </tr>
    </thead>
</table>

<script>
    var bgdatadt;
    $(function(){
        bgdatadt = comm.dt({
            ele: $('.tb_vii'),
            url: '/data/census/load_vii_data?' + $('.frm_data_census').serialize(),
            columns: ['customername', 'BusinessID', 'amount', 'datetime'],
            columnDefs: [
                {
                    aTargets: [1],
                    mRender: function (data, full) {
                        if(data) return `<a target="_blank" href="/declares/${full.isentrance==0?'project':'import'}/view?id=${full.id}">${data}</a>`;
                        return '';
                    }
                },
                {
                    aTargets: [2],
                    mRender: function (data, full) {
                        return `${data?comm.fMoney( data ):'--'}`;
                    }
                },
                {
                    aTargets: [3],
                    mRender: function (data, full) {
                        return `<div class="text-right">${data}</div>`;
                    }
                }
            ],
            drawCallback : function ( setting ) {
                $('.span_total').text( comm.fMoney( setting.json.sum ) );
            }
        });
    });
</script>
