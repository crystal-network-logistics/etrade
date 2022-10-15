<?php if($goods){
    ?>

    <?php $i = 1;
    foreach($goods as $row) {
        $tag = time() + (float)microtime()*1000000; ?>
        <div class="row" name="div" id="<?=$tag?>">
            <div name="cld" style="background-color:rgb(243,245,249);margin-left:12px;margin-right:12px;margin-bottom:15px;overflow:auto;">
                <div class="customrow">
                    <div class="idblock <?=$tag?>"><?=$i?></div>
                    <div class="productname text-primary" style="font-size: 16px;font-weight: bold;">
                        <?=$row["name"]?>
                    </div>
                    <div class="linkarea"><a class="link hModal" data-yes="N" lang="报关要素" href="/declares/goods/supelement?id=<?=$row['id']?>" style="cursor:pointer">展开报关要素</a></div>
                </div>
                <div class="customrow" style="padding-left:20px;padding-right:20px">
                    <span class="customtextbox"> <span class="text-semibold">品牌:</span> <?=$row["brand"]?> </span>
                    <span class="customtextbox"> <span class="text-semibold">型号:</span> <?=$row["model"]?> </span>
                    <span class="customtextbox"> <span class="text-semibold">英文名:</span> <?=$row["ProductEnglishName"]?></span>
                    <span class="customtextbox"> <span class="text-semibold">原产国:</span> <?=App\Libraries\Libcomp::get_dict('COUNTRY',$row["region"]?:142)?></span>
                    <span class="customtextbox"> <span class="text-semibold">品牌类型:</span> <?=App\Libraries\Libcomp::get_dict('BRANDS',$row["brandtype"])?></span>
                    <span class="customtextbox"> <span class="text-semibold">出品享惠情况:</span> <?=App\Libraries\Libcomp::get_dict('YHQK',$row["yhqk"])?></span>
                    <input name="Goods[productid][]" type="hidden" value="<?=$row["productid"]?>">
                </div>
                <!--padding-left:20px;padding-right:20px-->
                <div class="customrow" style="margin-bottom: 0px;">
                    <table style="width: 100%;min-width: 980px;">
                        <thead style="background-color:rgb(210,220,233)"><tr>
                            <th style="padding:5px">最大包装件数</th>
                            <th style="padding:5px">总净重(KG)</th>
                            <th style="padding:5px">总毛重(KG)</th>
                            <th style="padding:5px">产品数量</th>
                            <th style="padding:5px">产品单位</th>
                            <th style="padding:5px">单价(<span name="currencyname" color="red"><?php echo $entry["currency"]; ?></span>)</th>
                            <th style="padding:5px">货值(<span name="currencyname" color="red"><?php echo $entry["currency"]; ?></span>)</th>
                            <th colspan="2" style="padding:5px">法定数量和单位</th>
                            <?php if ($project['isentrance']==0):?>
                            <th style="padding:5px">开票人</th>
                            <th style="padding:5px">开票金额(RMB)</th></tr>
                            <?php endif;?>
                        </thead>
                        <tbody>
                        <tr>
                            <td style="padding:5px"><?=number_format($row["ProductPackageAmount"],2)?><?php $totalpackageamount += $row["ProductPackageAmount"]?></td>
                            <td style="padding:5px"><?=number_format($row["ProductNetWeight"],2)?> <?php $pnw += $row["ProductNetWeight"]?> </td>
                            <td style="padding:5px"><?=number_format($row["ProductGrossWeight"],2)?> <?php $pgw += $row["ProductGrossWeight"]?></td>
                            <td style="padding:5px"><?=number_format($row["ProductAmount"],2)?><?php $pa += $row["ProductAmount"]?></td>
                            <td style="padding:5px"><?=(is_numeric($row["productunit"])?\App\Libraries\LibComm::Unit($row["productunit"]):$row["productunit"])?></td>
                            <td style="padding:5px"><?=number_format($row["ProductUnitPrice"],2) ?></td>
                            <td style="padding:5px;color:red" id="sum<?=$tag?>">
                                <?=number_format( $row['ProductUnitTotalPrice']??( $row["ProductAmount"] * $row["ProductUnitPrice"] ),2)?>
                                <?php $sum += ( $row['ProductUnitTotalPrice']??($row["ProductAmount"] * $row["ProductUnitPrice"]) ); ?></td>
                            <td style="padding:5px;"><?=$row["officialamount"]?></td>
                            <td style="padding:5px" ><?=$row["officialunit"]?></td>
                            <?php if ($project['isentrance']==0):?>
                            <td style="padding:5px"><?=$row["invoicer"]?></td>
                            <td style="padding:5px"><?=number_format($row["invoiceamount"],2)?></td>
                            <?php endif;?>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php $i++; }?>
<?php }?>

<div class="row" style="background-color:rgb(243,245,249);margin-left:2px;margin-right:2px;overflow:auto;padding:8px;border-radius: 3px;">
    <div style="float:right">
        <span>该批总净重：</span>
        <span class="stats" id="totalnw"><?=($pnw)?>kg</span>
        <span>总毛重：</span>
        <span class="stats" id="totalgw"><?=($pgw)?>kg</span>
        <span>总产品数量：</span>
        <span class="stats" id="totalpa"><?=($pa)?></span>
        <span class="stats" style="color:red" >总货值：
            <span name="currencyname"><?=$entry["currency"]; ?></span> <span id="totalsum"><?=number_format($sum,2)?></span>
        </span>
    </div>
</div>

