var autotime = 0;
var search_tb = {
    products: {name:"产品信息",url:"/setup/products/detail",size:"lg"},
    project : {name:"进出口业务"},
    invoicer: {name:"开票人信息",url:"/setup/invoicer/detail",size:"lg"},
    customer: {name:"客户信息",url:"/setup/customer/view",size:""}};
$('#search_key_word').autocomplete({
    minChars: 2,
    lookup : function (query, done) {
        clearTimeout(autotime);
        var keys = $('#search_key_word').val();
        autotime = setTimeout(function (){
            comm.doRequest('/search',{ keys : keys}, (resp)=> {
                var data = [];
                $.each(resp.data,function (k,v) {
                    data.push({ value : `${v.name} `, data : v })
                });
                done({ suggestions : data});
            },'json');
        },300);
    },
    onSelect : function( suggestion ) {
        const data = suggestion.data;
        if ( data.tb == 'project' ) {
            window.open(`/declares/${data.tp=="0"?'project':'import'}/view?id=${data.id}`,'_bland');
        } else {
            var option = search_tb[data.tb];
            comm.sModal(option.url + '?id=' + data.id,{ title : data.name,size:option.size,Yes:'N',dt:'html'});
        }
    },
    formatResult: function(suggestion , currentValue) {
        return `<div class="text-primary">${search_tb[suggestion.data.tb].name}</div><span class="text-muted" title="${suggestion.value}">${suggestion.value}</span>`;
    }
});
