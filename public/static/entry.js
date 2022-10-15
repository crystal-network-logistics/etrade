    var first = true;
    $('.entity').toSubmit({
        success : function (resp){ comm.Alert('提交成功... ');
        setTimeout(()=>{ window.location.href = `/declares/project/view?id=${resp.projectid}`;},3000);
        },
        error : function ( resp ) {  comm.Alert( resp.msg, false ) }
    });
    // 保存草稿
    $('.draft').on('click',function ( ) {
    var frm = $('.entity'), URL = frm.attr('action');
    comm.doRequest(URL+'/draft',frm.serialize(),( resp ) => {
    comm.Alert(resp.msg,resp.code);
    // 返回列表页
    setTimeout(()=>{window.location.href = `/declares/project/view?id=${resp.projectid}`;},3000)
},'json');
});
    // 报关形式
$('.BGXS').change(function(){
    var v = $(this).val(),has = $('.hasPaper'),noh = $('.noPaper');
    v==0?(has.hide()&&noh.show() && has.find('input').removeAttr('required') && noh.find('input').removeAttr('required')):(has.show()&&noh.hide() && has.find('input').attr('required','true') && noh.find('input').removeAttr('required'));
});
    // 收汇方式
    $('#shfs').change(function(){
    var v = $(this).val(),item = $('.shfs');
    v==3?(item.show()&&item.find('input').attr('required','true')):(item.hide()&&item.find('input').removeAttr('required'));
});
    // 价格条款
    $('#priceterm').change(function(){
    var v = $(this).val(),item = $('#priceterm'),yfei = $('#yfei'),bfei = $('#bfei');
    if(v == 1 || v == ''){
    yfei.hide()&&bfei.hide()&& yfei.find('input').removeAttr('required')&&bfei.find('input').removeAttr('required') && yfei.find('input').val('') && bfei.find('input').val('');
}else if(v == 2){
    yfei.show()&&bfei.show()&& yfei.find('input').attr('required','true')&&bfei.find('input').attr('required','true');
}else if(v == 3){
    yfei.show()&&bfei.hide()&& yfei.find('input').attr('required','true')&&bfei.find('input').removeAttr('required') && bfei.find('input').val('');
}
});
    // 监管方式
    $('#jgfs').change(function(){ jgfs(); });

        function jgfs( dValue ){
        var v = $('#jgfs').val(), opt = `<option value="">--请选择--</option>`,def = "",den = '';
        $.each(zmxz,function(i,key){
        if(v == i){
        $.each(key,function(k,val){
        if(k == 0) def = val.id; den = val.name;
        opt += `<option value="${val.id}" ${def==val.id?"selected":""}>${val.name}</option>`;
    });
    }
    });
        $('#taxation').html(opt).val(dValue ? dValue : def).trigger("change");
    }

    $('#packMode').change(function(){
        var val = $(this).val(),sel = $('#selPacknote'),txt = $('#txtPacknote'),spPacknote = $('#spPacknote');
        if(val.indexOf('纸箱')==0||val.indexOf('散装')==0||val.indexOf('包')==0 || val == ''){
        sel.find('select').attr('disabled','true').val("").trigger("change")&&sel.show()&&txt.find('input').removeAttr('name')&&txt.hide();
    }else if(val.indexOf('其他')==0){
        sel.hide()&&spPacknote.show();
        sel.find('select').removeAttr('disabled').removeAttr('name').val("").trigger("change")&&
        txt.find('input').attr('name','totalpackagenote').attr('required','true')&&txt.show();
    }else{
        spPacknote.hide();
        txt.hide()&&txt.find('input').removeAttr('name').removeAttr('required')&&sel.find('select').attr('name','totalpackagenote').removeAttr('disabled')&&sel.show();
    }
    });

    $('.currency').change(function(){
        set_currencyname();
    });

    function set_currencyname(){
        $("span[name='currencyname']").text($('#currency').val())
    }

    // 获取选择商品
    function get_choice_products( item ){
    if ( item ) comm.doRequest('/setup/products/get_choice_data',{ ids : item , currency : $('#currency').val() ,isentrance:$('input[name=isentrance]').val()},( resp )=>{
    $('#products').append(resp);
    update_index();
});
    comm.closeModal();
}
    // 更新商品序号
    function update_index(){
    $("div[name=div]").each(function(k,item){
        $('.'+this.id).text((k+1));
    });
}
    // 删除商品
    function delGoods(id,gid){
    if ( gid ) comm.confirmCTL( `/declares/goods/delete?id=${gid}` ,'该操作不可恢复,是否删除该商品信息?' , ( resp )=>{$('#' + id).remove();} );
    else $('#' + id).remove();
    update_index();
    table_input_calc();
}

    // 计算产品中产品数量
    function table_input_calc(){
        var id, pkga, nw=0, gw=0, pa=0, puc=0.00, sum=0, item_sum=0;
        var totalnw=0, totalpkga=0, totalgw=0, totalpa=0, totalsum=0;
        $("div[name='div']").each(function(){
                var id=$(this).attr("id");
                if(!isNaN(parseFloat($('#nw'+id).val()))) {
                nw = parseFloat($('#nw' + id).val());
                }else {
                    nw = 0;
                }
                totalnw+=nw;
                if(!isNaN(parseFloat($('#gw'+id).val())))
                gw=parseFloat($('#gw'+id).val());
                else
                gw=0;

                if(!isNaN(parseFloat($('#nw'+id).val()))&&!isNaN(parseFloat($('#gw'+id).val()))&&nw>gw) {
                    comm.dAlert('总净重不可以大于总毛重！');
                }
                totalgw+=gw;
                if(!isNaN(parseFloat($('#pa'+id).val())))
                pa=parseFloat($('#pa'+id).val());
                else
                pa=0;
                totalpa+=pa;
                if((!isNaN(parseFloat($('#puc'+id).val())) && $('#puc'+id).data('change') == 'true') || $('#pa'+id).data('change') == 'true'){
                $('#puc'+id).data('change','false');
                $('#pa'+id).data('change','flase');
                puc = parseFloat($('#puc'+id).val());
                item_sum=pa*puc;
                }else{
                    if(!isNaN(parseFloat($('#sum'+id).val())) && $('#sum'+id).data('change') == 'true'){
                    $('#sum'+id).data('change','false');
                    item_sum = parseFloat(clear($('#sum'+id).val()));
                    if( pa ){
                    puc = comm.fMoney((item_sum / pa),4);$('#puc'+id).val(puc);
                }
                }else{
                    puc=parseFloat(clear($('#puc'+id).val()));
                    if(first){  item_sum = clear($('#sum'+id).val()); }else{    item_sum = pa*puc; }
                }
            }
            $('#sum'+id).val(comm.fMoney(item_sum,2));

            totalsum +=  parseFloat($('#sum'+id).val().replace(',',''));
            if(!isNaN(parseFloat($('#pack'+id).val())))
                pkga=parseFloat($('#pack'+id).val());
            else
                pkga=0;
            totalpkga+=pkga;

            if($('#officialunit'+id).val()=='千克')
                $('#officialamount'+id).val($('#nw'+id).val());
            else
                $('#officialamount'+id).val($('#pa'+id).val());
        });
        $('#totalpackageamount').val(totalpkga);
        $('#totalnw').text(totalnw+'kg');
        $('#totalgw').text(parseFloat(comm.fMoney(totalgw,3))+' kg');
        $('#totalpa').text(parseFloat(comm.fMoney(totalpa)));
        $('#totalsum').html(comm.fMoney(totalsum));
        first = false;
    }

    // 取消字符串中出现的所有逗号
    function clear(str) {
        str = str.replace(/,/g, "");//
        return str;
    }
    // 复制产品
    function clone_elem(id){
    var el = $(`#${id}`).clone(),nid = $.now();
    var row = $(`<div class="row" name="div" id="${nid}"></div>`);
    $('#products').append(row.html(el.html().replace(new RegExp(id,'gm'),nid)));
    var gid = $(`#${nid}`).find('[name="Goods[id][]"]').val()
    $(`#${nid}`).find('[name="Goods[id][]"]').val(0);
    table_input_calc();update_index();
    $(`#${nid} .linkarea .link:eq(2)`).attr("onclick",`delGoods(${nid},${0})`)
}

function update_elements( tabId ){
    var $tr = $(`.element_${tabId}`) , elements = [];
    $.each($tr,function (k,item) {
        var label = $(item).find('input[name=element_label]').val() , value = $(item).find('input[name=element_value]').val();
        var json = `{"${label}" : "${value}"}`;
        console.log(json);
        elements.push( JSON.parse(json) );
    });
    $(`#goods_elements_${tabId}`).val( JSON.stringify( elements ) );
    console.log( JSON.stringify( elements ) );
}