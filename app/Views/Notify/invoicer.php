
<table class="table table-hover NoticeInvoicer">
    <thead>
    <tr>
        <th width="180px">开票人公司名称</th>
        <th width="120px">纳税人识别号</th>
        <th width="120px">所属客户</th>
        <th width="140px">开户银行</th>
        <th width="120px">银行账号</th>
        <th width="140px">创建日期</th>
        <th width="80px">状态</th>
        <th width="120px">消息</th>
        <th width="60px" class="text-right">操作</th>
    </tr>
    </thead>
</table>


<script type="text/javascript">
    var NoticeInvoicedt ;
    $(function(){
        NoticeInvoicedt = comm.dt({
            ele : $('.NoticeInvoicer'),
            url : '/message/notify/load_data/invoicer?' + $('.frm_search').serialize(),
            columns:['name', 'taxpayerid', 'customername', 'bank', 'account', 'createtime', 'status', 'message'],
            columnDefs:[
                {
                    aTargets:[0],
                    mRender:function(data,full){
                        return `<a href="/setup/invoicer/detail?id=${full.id}" class="hModal" data-size="lg">${data}</a>`;
                    }
                },
                {
                    aTargets:[6],
                    mRender:function(data,full){
                        return comm.dictionary(__INOVICE_STATUS,data);
                    }
                },
                {
                    aTargets:[8],
                    mRender:function(data,full){
                        var buttons = '<div class="text-right">';
                        if(full.nt == 0){
                            buttons += `<a href="/message/notify/delete?id=${full.noticeid}" onclick="return comm.confirmCTL(this.href,'确认查看 操作?',(resp)=>{load_invoice_data()})" class="label bg-primary-300">确认查看</a> `;
                        }
                        buttons += '</div>'
                        return buttons;
                    }
                }
            ],drawCallback : function ( setting ){
                $.each(setting.json.badge,function (k,v){$(`.badge_${k}`).text(v);});
            }
        });
        $('.search').on('click',function () {
            load_invoice_data();
        });

    });
    function load_invoice_data(){
        NoticeInvoicedt.fnReloadAjax('/message/notify/load_data/invoicer?' + $('.frm_search').serialize());
    }
</script>
