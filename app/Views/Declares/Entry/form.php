<?php
$project = isset($data['project']) ? $data['project'] : false;
$entry = isset($data['entry']) ? $data['entry'] : false;
$goods = isset($data['goods']) ? $data['goods'] : false;
$CustomerID = ckAuth() ? session('custId') : (isset($_REQUEST['cid'])?$_REQUEST['cid']:($project?$project["customerid"]:""));
?>

<script src="/resource/app/zmxz.js?_=1.0" type="text/javascript"></script>
<div class="panel-body">
    <form class="entity" action="/declares/project/save">
        <input type="hidden" name="customerid" value="<?php echo $CustomerID?>">
        <input type="hidden" id="ID" value="<?php echo isset($_REQUEST['id'])?$_REQUEST['id']:0?>" name="ID">
        <input type="hidden" id="status" name="status">
        <input type="hidden" name="isentrance" value="0">
        <input type="hidden" name="guid" value="<?=create_form()?>">

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>报关口岸<span class="red">*</span>:</label>
                    <?=\App\Libraries\LibComp::select('CITY',['name'=>'entryport','class'=>'select', 'required'=>'true'],$entry?$entry['entryport']:'',false)?>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>运抵国(地区)<span class="red">*</span>:</label>
                    <?=\App\Libraries\LibComp::select('COUNTRY',['name'=>'destionationcountry','class'=>'select', 'required'=>'true'],$entry?$entry['destionationcountry']:'')?>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>预计出货日期<span class="red">*</span>:</label>
                    <input type="text" class="form-control" placeholder="请选择 出货日期" name="exportdate" value="<?=$entry?$entry['exportdate']:''?>"  required="required" autocomplete="off" onclick="WdatePicker({})">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label>贸易国(地区)<span class="red">*</span>:</label>
                    <?=\App\Libraries\LibComp::select('COUNTRY',['name'=>'businesscountry','class'=>'select', 'required'=>'true'],$entry?$entry['businesscountry']:'')?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>运输方式:</label>
                    <?=\App\Libraries\LibComp::select('YSFS',['name'=>'transport','class'=>'select','role'=>'min'],$entry?$entry['transport']:'',false)?>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>境外贸易商<span class="red">*</span> <a href="/setup/overseas/add?cid=<?=$CustomerID?>" class="hModal label bg-success" lang="新增 境外贸易商"> 新增 </a></label>
                    <?=\App\Libraries\LibComp::get_overseas(['customerid'=>$CustomerID,'type'=>0],['name'=>'businessid','class'=>'select',"required"=>"required"],$entry?$entry['businessid']:'')?>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>生产单位:</label>
                    <?=\App\Libraries\LibComp::select('PRODUCTION',['name'=>'production','class'=>'select','role'=>'min'],$entry?$entry['production']:'2',false)?>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label>币种<span class="red">*</span>:</label>
                    <?=\App\Libraries\LibComp::select('CURRENCY',['name'=>'currency','class'=>'select currency','id'=>'currency','required'=>'true','role'=>'min'],$entry?$entry['currency']:'',false)?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>报关形式<span class="red">*</span>:</label>
                    <?=\App\Libraries\LibComp::select('BGXS',['name'=>'entryform','class'=>'select BGXS', "required"=>"required",'role'=>'min'],$entry?$entry['entryform']:'',false)?>
                </div>
            </div>
            <div class="noPaper">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>10位报关行代码:</label>
                        <input type="text" class="form-control" name="brokerno" value="<?=$entry?$entry['brokerno']:''?>" maxlength="10" placeholder="请填写 10位报关行代码">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>报关行名称:</label>
                        <input type="text" class="form-control" name="brokername" value="<?=$entry?$entry['brokername']:''?>" placeholder="请填写 报关行名称">
                    </div>
                </div>
            </div>

            <div class="hasPaper" style="display: none">
                <div class="col-md-2">
                    <div class="form-group">
                        <label>收件人<span class="red">*</span>:</label>
                        <input type="text" class="form-control" name="receiver" value="<?=$entry?$entry['receiver']:''?>" placeholder="请填写 收货人名称">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>联系电话<span class="red">*</span>:</label>
                        <input type="text" class="form-control" name="tel" value="<?=$entry?$entry['tel']:''?>" placeholder="请填写 收货人联系电话">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>地址<span class="red">*</span>:</label>
                        <input type="text" class="form-control" name="address" value="<?=$entry?$entry['address']:''?>" placeholder="请填写 收货人地址">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>监管方式:</label>
                    <?=\App\Libraries\LibComp::select('JGFS',['name'=>'supervisionmode','class'=>'select','id'=>'jgfs'],$entry?$entry['supervisionmode']:'',false)?>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>征免性质:</label>
                    <select class="select" name="taxation" id="taxation" role="min"></select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>备案号:</label>
                    <input type="text" class="form-control" name="fileno" value="<?=$entry?$entry['fileno']:''?>" placeholder="请填写 备案号">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>许可证号:</label>
                    <input type="text" class="form-control" name="licno" value="<?=$entry?$entry['licno']:''?>" placeholder="请填写 许可证号">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label>价格条款<span class="red">*</span>:</label>
                    <?=\App\Libraries\LibComp::select('FOB_CF',['name'=>'priceterm','class'=>'select','id'=>'priceterm','required'=>'true','role'=>'min'],$entry?$entry['priceterm']:'1',false)?>
                </div>
            </div>
            <div class="col-md-2" id="yfei" style="display: none">
                <div class="form-group">
                    <label>运费(USD)<span class="red">*</span>:</label>
                    <input type="text" class="form-control" name="tranportexpense" placeholder="请填写 运费" value="<?=$entry?$entry['tranportexpense']:''?>" onkeypress="return comm.iNum()">
                </div>
            </div>
            <div class="col-md-2" id="bfei" style="display: none">
                <div class="form-group">
                    <label>保费(USD)<span class="red">*</span>:</label>
                    <input type="text" class="form-control" name="insurancefee" value="<?=$entry?$entry['insurancefee']:''?>" onkeypress="return comm.iNum()" placeholder="请填写 保费">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>收汇方式<span class="red">*</span>:</label>
                    <?=\App\Libraries\LibComp::select('SHFS',['name'=>'foreigncurrency','class'=>'select','id'=>'shfs','required'=>'true','role'=>'min'],$entry?$entry['foreigncurrency']:'1',false)?>
                </div>
            </div>
            <div class="col-md-3 shfs" style="display: none">
                <div class="form-group">
                    <label>信用证号<span class="red">*</span>:</label>
                    <input type="text" class="form-control" name="lcnumber" value="<?=$entry?$entry['lcnumber']:''?>" placeholder="请填写 信用证号" >
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>特殊关系确认<span class="red">*</span>:</label>
                    <div><label><input name="specialrelation" value="0" checked type="radio"> 否</label>&nbsp;&nbsp;<label><input name="specialrelation"  <?=$entry?($entry['specialrelation']?'checked':''):''?>  value="1" type="radio"> 是</label></div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>价格影响确认<span class="red">*</span>:</label>
                    <div><label><input name="priceimpact" value="0" checked type="radio"> 否</label>&nbsp;&nbsp;<label><input name="priceimpact" <?=$entry?($entry['priceimpact']?'checked':''):''?> value="1" type="radio"> 是</label></div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>支付特许权使用费确认<span class="red">*</span>:</label>
                    <div><label><input name="privilegefeeconfirm" value="0" checked type="radio"> 否</label>&nbsp;&nbsp;<label><input name="privilegefeeconfirm" <?=$entry?($entry['privilegefeeconfirm']?'checked':''):''?> value="1" type="radio"> 是</label></div>
                </div>
            </div>
        </div>

        <a id="dProduct" href="/setup/products/selected?customerid=<?=$CustomerID?>" class="row hModal" data-size="lg" data-text="确定选择" lang="选择报关产品" style="display: none; text-align:center;border:1px dashed gray;margin-left:20%;margin-right:20%;padding:10px;margin-bottom:10px;background-color:rgb(251,251,251);cursor:pointer" di="0">
            添加已审核通过产品到报关单据
        </a>

        <?php if ( $goods && count( $goods ) > 2) :?>
            <div class="row text-right" style="padding: 10px;">
                <a class="label bg-green-300 expanded"> 展开所有商品 </a>
            </div>
            <?php $expanded = true;?>
            <script>
                var expanded = false;
                $('.expanded').on('click',function () {
                    var ele = $('#products');
                    $(this).text(!expanded?'折叠所有商品':'展开所有商品');
                    expanded ? (ele.css({"max-height":"300px","overflow-y":"auto","overflow-x":"hidden"})):ele.css({"max-height":"","overflow-y":""});
                    expanded = !expanded;
                });
            </script>
        <?php endif;?>

        <div id="products" class="row" style="<?=$expanded?'overflow-x: hidden;overflow-y:auto;max-height: 300px;':''?>">
            <?php if( $goods ) : ?>
                <?php foreach ( $goods as $key=>$item ) :?>
                    <?php $data['currency'] = $entry ? $entry['currency'] : 'USD'; $data['item'] = $item;?>
                    <?php echo view('/Declares/Goods/items',['data'=>$data])?>
                <?php endforeach;?>
            <?php endif;?>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>整体包装件数<span class="red">*</span>:</label>
                    <input type="text" class="form-control" name="totalpackageamount" value="<?=$entry?$entry['totalpackageamount']:''?>" id="totalpackageamount" onkeypress="return comm.iNum()" required="true" readonly>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label>整体包装种类<span class="red">*</span>:</label>
                    <?=\App\Libraries\LibComp::select('BZZL',['name'=>'totalpackagemode','class'=>'select','id'=>'packMode','required'=>'true','role' => 'min'],$entry?$entry['totalpackagemode']:'',false)?>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label>包装说明<span id="spPacknote"  class="red" style="display: none;">*</span>:</label>
                    <div id="selPacknote">
                        <?=\App\Libraries\LibComp::select('BZSM',['name'=>'totalpackagenote','class'=>'select' ,'role'=>'min'],$entry?$entry['totalpackagenote']:'')?>
                    </div>
                    <div id="txtPacknote" style="display: none;">
                        <input type="text" class="form-control" name="totalpackagenote" value="<?=$entry?$entry['totalpackagenote']:''?>">
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label>总体积<span class="red">*</span>:</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="totalcube" value="<?=$entry?$entry['totalcube']:''?>" placeholder="请输入 货物总体积" onkeypress="return comm.iNum()"  required="true">
                        <span class="input-group-addon">M³</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="img-box full">
                    <div class="row">
                        <div class="col-md-6">
                            <label>报关附件</label>
                            <?=\App\Libraries\LibComp::upload_compents(['name'=>'entryfiles','nums'=>3,'fit'=>'"png","gif","jpg","jpeg","pdf","docx","xlsx"','mini'=>'mini'],$entry&&$entry['entryfiles']? explode(',',$entry['entryfiles']):[])?>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>报关备注:</label>
                                <input class="form-control" type="text" name="entrymark" value="<?=$entry?$entry['entrymark']:''?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="img-box full">
                    <div class="form-group">
                        <label>标注唛码及备注:</label>
                        <input class="form-control" name="kama" style="width: 100%;"  value="<?=$entry?$entry['kama']:''?>">
                    </div>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-green-300 draft"><i class="icon icon-floppy-disk"></i> 保存草稿 </button>

        <button type="submit" class="btn btn-primary"><i class="icon icon-add"></i> 提交 </button>
    </form>
</div>
<script src="/static/entry.js" type="text/javascript"></script>
<script>
    <?php if ($entry) :?>
        set_currencyname();
        jgfs('<?=$entry['taxation']?:''?>');
        const cb = new Promise((resolve,reject) => {setTimeout(()=>{resolve()},200)});
        cb.then(()=>{comm.formload($('.entity'),{entryform:"<?=$entry["entryform"]?>",foreigncurrency:"<?=$entry["foreigncurrency"]?>",priceterm:"<?=$entry["priceterm"]?>"});});
    <?php endif;?>

    <?php if ( $goods ) :?>
    update_index();
    <?php endif;?>
    $('#dProduct').css('display','block');
</script>
<?php
?>