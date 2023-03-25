<div class="panel panel-flat" >
    <form class="frm_users_customer">
        <input type="hidden" name="user_id" value="<?=$data['user_id']?>">
    </form>
    <table class="table table-hover data_choice_list">
        <thead>
        <tr>
            <th width="40px">#</th>
            <th width="340px">客户名称</th>
            <th width="160px">客户编号</th>
            <th width="60px">客户电话</th>
        </tr>
        </thead>
    </table>
</div>

<script type="text/javascript">
    var dtproducts ,temp_data = [];
    $(function(){
        dtproducts = comm.dt({
            ele:$('.data_choice_list'),
            destroy:true,
            url:'/account/staff/binder_customer_data?'+$('.frm_users_customer').serialize(),
            columns:['rownum','customername','customerno','tel'],
        });
        setTimeout(()=>{
            dtproducts.fnReloadAjax('/account/staff/binder_customer_data'+$('.frm_users_customer').serialize());
        },300);
    });




</script>
