<table class="table table-hover NoticeProject">
    <thead>
    <tr>
        <th width="130px">业务编号</th>
        <th width="90px">启运港</th>
        <th width="90px">目的国</th>
        <th width="120px">出口日期</th>
        <th width="120px">币种</th>
        <th width="110px">报关金额</th>
        <th width="120px">申请日期</th>
        <th width="100px">消息</th>
        <th width="60px" class="text-right">操作</th>
    </tr>
    </thead>
</table>

<script type="text/javascript">
    var NoticeProject ;
    $(function(){
        NoticeProject = comm.dt({
            ele : $('.NoticeProject'),
            url : '/message/notify/load_data/entryform?'+$('.frm_search').serialize(),
            columns:['BusinessID', 'entryport', 'destionationcountry', 'exportdate', 'currency', 'bgamount', 'createtime', 'message'],
            columnDefs:[
                {
                    aTargets: [0],
                    mRender: function (data, full) {
                        return `<a href="/declares/${(full.isentrance == 1)?'import':'project'}/view?id=${full.projectid}">${data}</a>`;
                    }
                },
                {
                    aTargets: [1],
                    mRender: function (data, full) {
                        return full.isentrance == 0 ? comm.dictionary(__CITY,data) : comm.dictionary(__CITYEN,data);
                    }
                }  ,
                {
                    aTargets: [2],
                    mRender: function (data, full) {
                        return full.isentrance == 0 ? comm.dictionary(__COUNTRY,data) : comm.dictionary(__COUNTRYEN,data);
                    }
                } ,
                {
                    aTargets: [7],
                    mRender: function (data, full) {
                        return `<div class="text-muted">${data}</div>`;
                    }
                }  ,
                {
                    aTargets:[8],
                    mRender:function(data,full){
                        var buttons = '<div class="text-right">';

                        buttons += `<a href="/declares/${full.isentrance == 1?'import':'project'}/view?id=${full.projectid}" class="label bg-success-300">详情</a> `;

                        if(full.nt == 0){
                            buttons += `<a href="/message/notify/delete?id=${full.noticeid}" onclick="return comm.confirmCTL(this.href,'确认查看 操作?',(resp)=>{load_notice_entry_data()})" class="label bg-primary-300">确认查看</a> `;
                        }
                        buttons += '</div>'
                        return buttons;
                    }
                }
            ],

            drawCallback : function ( setting ){
                $.each(setting.json.badge,function (k,v){$(`.badge_${k}`).text(v);});
            }
        });

        $('.search').on('click',function () {
            load_notice_entry_data();
        });
    });

    function load_notice_entry_data(){
        NoticeProject.fnReloadAjax('/message/notify/load_data/entryform?'+$('.frm_search').serialize());
    }
</script>
