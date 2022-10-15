
<table class="table table-hover tb_payment">
    <thead>
    <tr>
        <th width="220px">客户</th>
        <th width="120px">业务单号</th>
        <th width="100px">完成日期</th>
        <th width="100px">币种</th>
        <th width="120px" class="text-right">毛利</th>
    </tr>
    </thead>
</table>

<script>
    var bgdatadt;
    $(function(){
        bgdatadt = comm.dt({
            ele: $('.tb_payment'),
            url: '/data/census/load_maoli_data?' + $('.frm_data_census').serialize(),
            columns: ['customername', 'BusinessID', 'datetime','currency','amount'],
            columnDefs: [
                {
                    aTargets: [1],
                    mRender: function (data, full) {
                        if(data) return `<a target="_blank" href="/declares/project/view?id=${full.id}">${data}</a>`;
                        return '';
                    }
                },
                {
                    aTargets: [4],
                    mRender: function (data, full) {
                        return `<div class="text-right">${data?comm.fMoney(data):0}</div>`;
                    }
                }
            ],
            drawCallback : function ( setting ) {
                $('.span_total').text( comm.fMoney( setting.json.sum ) );
            }
        });
    });
</script>
