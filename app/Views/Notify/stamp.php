
<table class="table table-hover NoticeStamp">
    <thead>
    <tr>
        <th width="180px">业务号</th>
        <th width="120px">客户</th>
        <th width="80px">状态</th>
        <th width="120px">消息</th>
        <th width="120px">申请日期</th>
        <th width="60px" class="text-right">操作</th>
    </tr>
    </thead>
</table>

<script type="text/javascript">
    var stampdt ;
    $(function(){
        stampdt = comm.dt(
            {
                ele:$('.NoticeStamp'),
                url:'/message/notify/load_data/stamp?' + $('.frm_search').serialize(),
                columns:['BusinessID','customername','status','message','createtime'],
                columnDefs:[
                    {
                        aTargets:[0],
                        mRender:function(data,full){
                            if ( data )
                                return `<a href="/declares/${(full.isentrance == 1)?'import':'project'}/view?id=${full.projectid}">${data}</a>`;
                            return '--';
                        }
                    },
                    {
                        aTargets:[2],
                        mRender:function(data,full){
                            return ( data == 1 ) ?'<span class="label bg-info-300">待盖章</span>':'<span class="label bg-success-300">已盖章</span>';
                        }
                    },
                    {
                        aTargets:[5],
                        mRender:function(data,full){
                            return `<div class="text-right">   <a href="/declares/stamp/view?id=${full.id}" class="label bg-success-300">详情</a>  </div>`;
                        }
                    }
                ],drawCallback : function ( setting ){
                    $.each(setting.json.badge,function (k,v){$(`.badge_${k}`).text(v);});
                }
            });

        $('.search').click(function(){
            load_stamp_data();
        });
    });

    function load_stamp_data(){
        stampdt.fnReloadAjax('/message/notify/load_data/stamp?_=' + $('.frm_search').serialize());
    }

</script>
