<div class="panel panel-flat" >
    <div class="panel-body" style="padding: 5px 10px;">
        <form action="#" class="form-horizontal frm_products_dialog_search">
            <div class="row">
                <div class="col-md-12">
                    <input name="customerid" value="<?=$data['customerid']?>" type="hidden">
                    <input name="invoicerid" value="<?=$data['invoicerid']?>" type="hidden">
                    <input name="status" value="3" type="hidden">
                    <input type="text" class="form-control inline input-420" name="keys" placeholder="产品编号,产品名称,HSCode等" value="">&nbsp;
                    <button type="button" class="btn btn-primary" onclick="load_choice_data();"><i class="icon icon-search4"></i> 查询</button>

                </div>

            </div>
        </form>
    </div>

    <table class="table table-hover data_products_choice_list">
        <thead>
        <tr>
            <th width="40px">#</th>
            <th width="140px">品名</th>
            <th width="120px">产品编码</th>
            <th width="120px">品牌</th>
            <th width="60px">退税率</th>
            <th width="60px">HSCode</th>
            <th width="60px">监管条件</th>
        </tr>
        </thead>
    </table>
</div>

<script type="text/javascript">
    var invicer_dtproducts;
    $(function(){
        invicer_dtproducts = comm.dt({
            ele:$('.data_products_choice_list'),
            //destroy:true,
            //s:true,
            url:'/setup/products/get_data_by_invoicer/1?'+$('.frm_products_dialog_search').serialize(),
            columns:[null,'name','productid','brand','taxreturnrate','hscode','customsupervision'],
            columnDefs:[
                {
                    aTargets:[0],
                    mRender:function(data,full){
                        return `<input name="ck" type="radio" value="${full.id}">`;
                    }
                },
                {
                    aTargets:[1],
                    mRender:function(data,full){
                        return '<a class="hModal" data-group="Yes" data-size="lg" data-yes="N" href="/setup/products/detail?id='+ full.id +'" lang="'+ data +'">' + comm.ellipsis(data,data,120) + '</a>'
                    }
                },
                {
                    aTargets:[4],
                    mRender:function(data,full){
                        return ((data || data == 0) ? ( parseFloat(data) * 100 + '%' ) : '--')
                    }
                },
                {
                    aTargets:[6],
                    mRender:function(data,full){
                        return comm.ellipsis(data,data,320,'left')
                    }
                }
            ],

            drawCallback : function ( setting ){
                var mId = localStorage.getItem('groupGuid')
                $(`#${mId} .btn-submit`).unbind().on('click',function ( ) {
                    get_products_choice()
                })
            }
        });

        setTimeout(()=>{load_choice_data()},200)
    });



    function load_choice_data(){
        invicer_dtproducts.fnReloadAjax('/setup/products/get_data_by_invoicer/1?'+$('.frm_products_dialog_search').serialize());
    }

    function  get_products_choice(){
        var data = comm.doChoice( invicer_dtproducts );
        console.log(data)
        return comm.doRequest('/setup/products/bind_invoicer',{id:data.id,invoicerid:'<?=$data['id']?>'},( resp )=>{
            comm.Alert(resp.msg,resp.code);
            $('.spInvoice').html(data.name);
        },'json');
    }
</script>
