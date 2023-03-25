    <div class="panel panel-flat" >
        <div class="panel-body" style="padding: 5px 10px;">
            <form action="#" class="form-horizontal frm_dialog_search">
                <div class="row">
                    <div class="col-md-12">
                        <input name="customerid" value="<?=$data['customerid']?>" type="hidden">
                        <input name="isentrance" value="<?=$data['isentrance']??0?>" type="hidden">
                        <?php if ( $data['isentrance'] != 1):?>
                        <input name="status" value="3" type="hidden">
                        <?php endif;?>
                        <input type="text" class="form-control inline input-420" name="keys" placeholder="产品编号,产品名称,HSCode等" value="">&nbsp;
                        <button type="button" class="btn btn-primary search" id="btn_search" onclick="load_products_data();"><i class="icon icon-search4"></i> 查询</button>
                        <?php if($data['isentrance']):?>
                            <a href="/setup/products/isentrance?customerid=<?=$data['customerid']?>&isentrance=1" class="btn btn-success hModal" data-group="import_product" data-call="load_products_data"> 添加商品 </a>
                        <?php endif;?>
                    </div>

                </div>
            </form>
        </div>

        <table class="table table-hover data_choice_list">
            <thead>
            <tr>
                <th width="40px"><input name="ckall" type="checkbox"></th>
                <th width="140px">品名</th>
                <th width="120px">产品编码</th>
                <th width="120px">品牌</th>
                <th width="60px">退税率</th>
                <th width="60px">HSCode</th>
                <th width="60px">监管条件</th>
                <th width="140px">开票人</th>
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
            s:true,
            url:'/setup/products/page?'+$('.frm_dialog_search').serialize(),
            columns:[null,'name','productid','brand','taxreturnrate','hscode','customsupervision','invoicer'],
            columnDefs:[
                {
                    aTargets:[0],
                    mRender:function(data,full){
                        return `<input name="sck" type="checkbox" value="${full.id}">`;
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
                    aTargets:[7],
                    mRender:function(data,full){
                        return comm.ellipsis(data,data,160,'left')
                    }
                }
            ],

            drawCallback : function ( setting ){
                setTimeout( ()=> {
                    $('.dataTables_scrollBody').css('height','');

                    var api = dtproducts.api();
                    var rows = api.rows({ page: 'current' }).nodes();
                    var idx = 0;
                    var tr = null;
                    api.column(idx, { page: 'current' }).data().each(function (group, i) {
                        tr = $(rows[i]);
                        var row_data = dtproducts.api().row(tr).data(),ck = $("td:eq(" + idx + ")>input:checkbox", tr);
                        $.each(temp_data,function (k,v) {
                            if ( v.id === row_data.id) {
                                tr.addClass('success');
                                ck[0].checked = true;
                            }
                        });
                    });

                    display_choise_data()
                    var mGuid = localStorage.getItem('mGuid');
                    // 提交
                    $(`#${mGuid} .btn-submit`).unbind().on('click',function (){
                        //var ckb = $('[name=sck]:checked'),arr = [];
                        var arr = [];
                        if( !temp_data.length ) {comm.Alert('请选择商品!',false);return false;}
                        $.each(temp_data,function ( k , item ) {
                            arr.push( item.id );
                        });
                        get_choice_products(arr);
                    });
                    $('.dataTables_scrollHeadInner, .data_choice_list').css('width','');
                    console.log($('.dataTables_scrollHeadInner .data_choice_list'))
                },50);

            },
            fnck:function (nRow, aData, iDisplayIndex ) {
                $(nRow).find('td:eq(0)>input:checkbox').on('click',function ( ) {
                    const _this = this,ck = _this.checked;
                    setTimeout(()=>{_this.checked = ck;},100);
                })
            },

        });

        // 全选
        $('input[name=ckall],input[name=ck_all]').on('click',function () {
            $('[name=sck]:checkbox').prop('checked',this.checked);

            if ( this.checked ) {
                dtproducts.$('tr').addClass('success');
                dtproducts.$('tr.success').each(function (k,v){
                    var data = dtproducts.api().row(this).data();
                    temp_data.push(data)
                })
            } else {
                dtproducts.$('tr').removeClass('success');
                dtproducts.$('tr').each(function (k,v){
                    var data = dtproducts.api().row(this).data();
                    for (var i = 0; i < temp_data.length ; i++) {
                        if( temp_data[i].id == data.id)  temp_data.splice(i,1)
                    }
                });
            }
            temp_data = [...new Set(temp_data)];
        });
    });
    //
    <?php if ( $data['isentrance'] == 1):?>
        comm.visibleColumn(dtproducts,[2,7],false);
    <?php endif;?>
    // 单独选中.
    $('.data_choice_list>tbody').on('click', 'tr', function () {
        setTimeout(()=>{
            var data = dtproducts.api().row(this).data(),ck = $(this).find('td:eq(0)>input:checkbox')[0].checked;
            if(ck) temp_data.push(data);
            else
                for (var i = 0; i < temp_data.length ; i++) {
                    if( temp_data[i].id == data.id)  temp_data.splice(i,1)
                }
            temp_data = [...new Set(temp_data)];
            display_choise_data();
        },100)
    });

    // 显示选择提示
    function display_choise_data(){
        var mGuid = localStorage.getItem('mGuid');
        $(`#${mGuid} .btn-submit`).text(`确定选择 (已选 ${temp_data.length})`)
    }

    function load_products_data(){
        console.log(dtproducts)
        dtproducts.fnReloadAjax('/setup/products/page?'+$('.frm_dialog_search').serialize());
    }
</script>
