<?php
    $is_has_active = ck_action('account/staff/active')
?>
<table class="table table-hover NoticeUsers">
    <thead>
    <tr>
        <th width="120px">用户名</th>
        <th width="180px">邮箱</th>
        <th width="120px">电话</th>
        <th width="220px">公司</th>
        <th width="140px">注册日期</th>
        <th width="100px">操作</th>
    </tr>
    </thead>
</table>

<script type="text/javascript">
    var dtUsers ;
    $(function(){
        dtUsers = comm.dt({
            ele : $('.NoticeUsers'),
            url : '/message/notify/load_data/user?' + $('.frm_search').serialize(),
            columns:['username', 'email', 'tel', 'companyname', 'createtime'],
            columnDefs:[
                {
                    aTargets:[0],
                    mRender:function(data,full){
                        return `<a href="/account/cust/view?id=${full.id}">${data}</a>`;
                    }
                },
                {
                    aTargets:[1],
                    mRender:function(data,full){
                        if(data != '' && data != null) {
                            return '<a href="mailto:' + full.email + '">' + data + '</a>';
                        }else{
                            return '';
                        }
                    }
                },

                {
                    aTargets:[5],
                    mRender:function(data,full){
                        var buttons = ' <div class="text-right">';

                        if ( full.actived == 0 ) {
                            buttons += `<a <?php if($is_has_active):?>
                                href="/account/staff/active?id=${full.id}"
                                onclick="return comm.confirmCTL(this.href,'是否需要激活帐户?')"
                                <?php endif;?>
                                class="label bg-danger-300">激活帐户</a>`
                        }

                        <?php if(ck_action('account/staff/disabled_enabled')):?>
                        buttons += '    <a href="/account/staff/disabled_enabled?id='+ full.id +'" class="label '+ ((full.status == 0) ? 'bg-danger' : 'bg-success') +'" onclick="return comm.confirmCTL(this.href,\'确认设置禁用/启用操作?\',function (){load_data();})">'+ ((full.status == 0) ? '禁用' : '启用') +'</a> ';
                        <?php endif;?>

                        <?php if( ck_action('account/cust/edit') ):?>
                            buttons += '    <a href="/account/cust/edit?id='+ full.id +'" class="label bg-primary hModal">编辑</a>';
                        <?php endif;?>


                        <?php if( ckAuth('admin') ) :?>
                            if(full.type){
                                buttons += `<a href="/setup/crm/to?id=${full.id}" onclick="return comm.confirmCTL(this.href,'是否添加到CRM?',()=>{})">toCRM</a>`;
                            }
                        <?php endif; ?>
                        return buttons;
                    }
                }
            ],drawCallback : function ( setting ){
                $.each(setting.json.badge,function (k,v){$(`.badge_${k}`).text(v);});
            }

        });

        $('.search').click(function(){
            load_user();
        });
    });

    function load_user(){
        dtUsers.fnReloadAjax('/message/notify/load_data/user?' + $('.frm_search').serialize());
    }

</script>
