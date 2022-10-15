<?php
$isim = (isset($data["isentrance"]) && $data["isentrance"]) ? 'none' : '';
$currency = (isset($data["currency"]) && $data["currency"]) ? $data["currency"] : false;
$item = $data['item']; $tag = time() + (float)microtime()*1000000;
?>
<div class="row" name="div" id="<?=$tag?>" style="border-radius: 2px">
    <div name="cld" style="background-color:rgb(243,245,249);margin-left:15px;margin-right:15px;margin-bottom:15px;">
        <div class="customrow">
            <div class="idblock <?=$tag?>"> 1 </div>
            <div class="productname">
                <input type="hidden" name="Goods[tags][]" value="<?=$tag?>">
                <input type="hidden" name="Goods[ProductChineseName][]" value="<?=$item["name"]?>">
                <input type="hidden" name="Goods[supelement][]" value='<?=$item["supelement"]?>' id="goods_elements_<?=$tag?>">

                <span class="text-primary" style="margin-right: 30px;font-size: 16px;"> <?=$item["name"]?> </span>
                <span class="customtextbox"><label>品牌 : </label><input name="Goods[brand][]" value="<?=$item["brand"]?>" class="form-control inline input-xs input-120" style="padding: 3px;height: 28px"></span>
                <span class="customtextbox"><label>型号 : </label><input name="Goods[model][]" value="<?=$item["model"]?>" class="form-control inline input-xs input-120" style="padding: 3px;height: 28px"></span>
                <span class="customtextbox"><label>英文名 : </label><input name="Goods[ProductEnglishName][]" value="<?=$item["englishname"]?>" class="form-control inline input-xs input-160" style="padding: 3px;height: 28px"></span>
            </div>
            <div class="linkarea"><a class="link hModal" data-yes="N" href="/declares/goods/supelement?id=<?=$item['id']?>&pid=<?=$item['pid']?>&tag=<?=$tag?>" style="cursor:pointer" lang="报关要素">展开报关要素</a> | <a class="link" style="cursor:pointer" onclick="clone_elem('<?=$tag?>')">复制</a>|<a class="link" style="cursor:pointer" onclick="delGoods(<?=$tag?>,<?=($item['gid']?$item['gid']:0)?>)">删除</a></div>
        </div>
        <div class="customrow" style="padding-left:20px;padding-right:20px">
            <div class="div_select">
                <span class="customtextbox"><label>原产国(地区):</label><?=\App\Libraries\LibComp::select(($isim=='none' ? 'COUNTRYEN' :'COUNTRY'),['name'=>'Goods[region][]','style'=>'width:160px' ,'class'=>'select select-xs'],$item['region']?:142,false)?></span>
                <span class="customtextbox"><label>品牌类型:</label><?=\App\Libraries\LibComp::select('BRANDS',['name'=>'Goods[brandtype][]','style'=>'width:200px','class'=>'select select-xs'],$item['brandtype'],false)?></span>
                <span class="customtextbox"><label>出品享惠情况:</label><?=\App\Libraries\LibComp::select('YHQK',['name'=>'Goods[yhqk][]','style'=>'width:200px','class'=>'select select-xs'],$item['yhqk'],false)?></span>
                <input name="Goods[productid][]" type="hidden" value="<?=$item["pid"]?>">
            </div>
        </div>
        <div class="customrow" style="margin-bottom: 0px;">
            <table style="width: 100%;/*border:1px solid rgb(210,220,233);*/">
                <thead style="background-color:rgb(210,220,233)"><tr>
                    <th style="padding:5px">最大包装件数(<span class="text-danger">*</span>)</th>
                    <th style="padding:5px">总净重(KG)(<span class="text-danger">*</span>)</th>
                    <th style="padding:5px">总毛重(KG)(<span class="text-danger">*</span>)</th>
                    <th style="padding:5px">产品数量(<span class="text-danger">*</span>)</th>
                    <th style="padding:5px">产品单位(<span class="text-danger">*</span>)</th>
                    <th style="padding:5px">单价(<span name="currencyname" color="red"><?php echo $currency?$currency:'USD'; ?></span>)(<span class="text-danger">*</span>)</th>
                    <th style="padding:5px">货值(<span name="currencyname" color="red"><?php echo  $currency?$currency:'USD'; ?></span>)</th>
                    <th colspan="2" style="padding:5px">法定数量和单位</th>
                    <th style="padding:5px;display: <?php echo $isim?>">开票人</th>
                    <th style="padding:5px;display: <?php echo $isim?>">开票金额(RMB)(<span class="text-danger">*</span>)</th></tr>
                </thead>
                <tbody>
                <tr>
                    <td style="padding:5px"><input type="hidden" name="Goods[id][]" value="<?=($item['gid']?$item['gid']:'0')?>"><input name="Goods[ProductPackageAmount][]" value="<?=($item['ProductPackageAmount']??'')?>" onchange="table_input_calc()"  id="pack<?=$tag?>" size="10" onkeypress="return comm.iNum()" required="required"></td>
                    <td style="padding:5px"><input name="Goods[ProductNetWeight][]" value="<?=($item['ProductNetWeight']??'')?>" onchange="table_input_calc()" id="nw<?=$tag?>" size="10" onkeypress="return comm.iNum()" required="required"></td>
                    <td style="padding:5px"><input name="Goods[ProductGrossWeight][]" value="<?=($item['ProductGrossWeight']??'')?>" onchange="table_input_calc()" id="gw<?=$tag?>" size="10" onkeypress="return comm.iNum()" required="required"></td>
                    <td style="padding:5px"><input name="Goods[ProductAmount][]" value="<?=($item['ProductAmount']??'')?>" onchange="$(this).data('change','true');table_input_calc();" data-change='false' id="pa<?=$tag?>" size="10" onkeypress="return comm.iNum()" required="required"></td>
                    <td style="padding:5px"><?=\App\Libraries\LibComp::select(($isim=='none' ? 'UNITEN' :'UNIT'),['name'=>'Goods[productunit][]',"style"=>'width:100px','class'=>'select select-xs'],is_numeric($item["productunit"])?(\App\Libraries\LibComm::Unit($item["productunit"])):$item["productunit"],false)?></td>
                    <td style="padding:5px"><input name="Goods[ProductUnitPrice][]"  value="<?=($item['ProductUnitPrice']??'')?>" onchange="$(this).data('change','true');table_input_calc();" data-change='false' id="puc<?=$tag?>" size="10" onkeypress="return comm.iNum()"></td>
                    <td style="padding:5px;color:red" ><input name='Goods[ProductUnitTotalPrice][]' value="<?=($item['ProductUnitTotalPrice']??($item["ProductAmount"] * $item["ProductUnitPrice"]))?>" onchange="$(this).data('change','true');table_input_calc();" id="sum<?=$tag?>" size="10" data-change='false' value="<?php echo number_format(($item["ProductUnitTotalPrice"]? $item["ProductUnitTotalPrice"] : ( $item["ProductAmount"] * $item["ProductUnitPrice"] )),2)?>" onkeypress="return comm.iNum()"></td>
                    <td style="padding:5px;"><input name="Goods[officialamount][]" value="<?=($item['officialamount']??'')?>" size="10" id="officialamount<?=$tag?>" onkeypress="return comm.iNum()"></td>
                    <td style="padding:5px" ><?=$item["officialunit"]?><input type="hidden" id="officialunit<?=$tag?>" name="Goods[officialunit][]" value="<?php echo is_numeric($item["officialunit"])?(\App\Libraries\LibComm::Unit($item["officialunit"])):$item["officialunit"]?>"></td>
                    <td style="padding:5px;width:120px;display: <?php echo $isim?>"><div style="width:120px;overflow:hidden;text-overflow: ellipsis;" title="<?=$item["invoicer"]?>"><?=$item["invoicer"]?></div></td>
                    <td style="padding:5px;display: <?php echo $isim?>"><input name="Goods[invoiceamount][]"  value="<?=($item['invoiceamount']??'')?>" size="10" onkeypress="return comm.iNum()"></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $('#<?=$tag?> .div_select select').select2({minimumResultsForSearch:-1})
    $('#<?=$tag?> .div_select select:eq(0),#<?=$tag?> table>tbody select').select2()
</script>
