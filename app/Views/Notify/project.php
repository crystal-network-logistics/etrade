
<table class="table table-hover NoticeProject">
    <thead>
    <tr>
        <th width="130px">业务编号</th>
        <th width="90px">启运港</th>
        <th width="90px">目的国</th>
        <th width="120px">出口日期</th>
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
            url : '/message/notify/load_data/project?' + $('.frm_search').serialize(),
            columns:['BusinessID', 'entryport', 'destionationcountry', 'exportdate', 'bgamount', 'createtime', 'message'],
            columnDefs:[
                {
                    aTargets: [0],
                    mRender: function (data, full) {
                        return `<a href="/declares/${(full.isentrance == 1)?'import':'project'}/view?id=${full.relationid}">${data}</a>`;
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
                        return full.isentrance == 0 ? comm.dictionary(__COUNTRY,data) : comm.dictionary(__COUNTRYEN,data) ;
                    }
                } ,

                {
                    aTargets: [6],
                    mRender: function (data, full) {
                        return `<span class="text-muted">${data}</span>`;
                    }
                }  ,
                {
                    aTargets:[7],
                    mRender:function(data,full){
                        var html = '<div class="text-right">';

                        html += ` <a href="/declares/${(full.isentrance == 1)?'import':'project'}/view?id=${full.relationid}" class="label bg-success-300">详情</a>`;

                        if(full.nt == 0){
                            html += `<a href="/message/notify/delete?id=${full.id}" onclick="return comm.confirmCTL(this.href,'确认查看 操作?',(resp)=>{load_notice_project_data()})" class="label bg-primary-300">确认查看</a> `;
                        }
                        html += ' </div>';
                        return html;
                    }
                }
            ],drawCallback : function ( setting ){
                $.each(setting.json.badge,function (k,v){$(`.badge_${k}`).text(v);});
            }
        });
    });

    function load_notice_project_data(){
        NoticeProject.fnReloadAjax('/notices/get_notices_project_items_page/project?_=' + Math.random());
    }

</script>
