<style>
    .cell_spacing{
        padding:10px;
        text-align: center;
    }
</style>
<?php
$data = (object) $data;
$company = (object) \App\Libraries\LibForm::company( $data->companyid );
?>
<p class="row" style="font-size:20px;text-align:center">
    交易水单
</p>

<table style="width:100%;font-size:12px;vertical-align:top;border-collapse:collapse;">
    <tr>
        <td style="border: 1px solid black;width: 7%;vertical-align: middle;" class="cell_spacing" rowspan="3">付<br/>款<br/>人</td>
        <td style="border: 1px solid black;width: 15%" class="cell_spacing">户名</td>
        <td style="border: 1px solid black;width: 28%" class="cell_spacing"><?=($company ? $company->name : '--')?></td>

        <td style="border: 1px solid black;width: 7%;vertical-align: middle;" class="cell_spacing" rowspan="3">收<br/>款<br/>人</td>
        <td style="border: 1px solid black;width: 15%" class="cell_spacing">户名</td>
        <td style="border: 1px solid black;width: 28%" class="cell_spacing"><?=$data->receivername?></td>
    </tr>

    <tr>
        <td style="border: 1px solid black;" class="cell_spacing">帐号</td>
        <td style="border: 1px solid black;" class="cell_spacing"><?=($company ? $company->account : '--')?></td>

        <td style="border: 1px solid black;" class="cell_spacing">帐号</td>
        <td style="border: 1px solid black;" class="cell_spacing"><?=$data->bankaccount?$data->bankaccount:'无'?></td>
    </tr>

    <tr>
        <td style="border: 1px solid black;" class="cell_spacing">开户银行</td>
        <td style="border: 1px solid black;" class="cell_spacing"><?=($company ? $company->bkname : '--')?></td>

        <td style="border: 1px solid black;" class="cell_spacing">开户银行</td>
        <td style="border: 1px solid black;" class="cell_spacing"><?=$data->bank?$data->bank:'无'?></td>
    </tr>

    <tr>
        <td style="border: 1px solid black;" class="cell_spacing" colspan="2">交易金额</td>
        <td style="border: 1px solid black;" class="cell_spacing"><?=number_format($data->amount,2)?></td>

        <td style="border: 1px solid black;" class="cell_spacing" colspan="2">交易币种</td>
        <td style="border: 1px solid black;" class="cell_spacing"><?=$data->currency?></td>
    </tr>
    <tr>
        <td style="border: 1px solid black;" class="cell_spacing" colspan="2">金额大写</td>
        <td style="border: 1px solid black;text-align: left;" class="cell_spacing" colspan="4"><?=\App\Libraries\LibComm::cny($data->amount,true,false)?></td>
    </tr>
    <tr>
        <td style="border: 1px solid black;" class="cell_spacing" colspan="2">汇率</td>
        <td style="border: 1px solid black;" class="cell_spacing"><?=$data->exchangerate?></td>

        <td style="border: 1px solid black;" class="cell_spacing" colspan="2">摘要</td>
        <td style="border: 1px solid black;" class="cell_spacing">国际结算记帐</td>
    </tr>

    <tr>
        <td style="border: 1px solid black;vertical-align: middle;" class="cell_spacing" colspan="2" height="160px" rowspan="2">
            <img src="<?=($company ? $company->stamp_zh_en : '')?>" style="100%">
        </td>
        <td style="border: 1px solid black; text-align: left;vertical-align: middle" class="cell_spacing" colspan="4" height="150px">备注:<?=$data->note?></td>
    </tr>
    <tr>
        <td style="border: 1px solid black;text-align: left;font-weight: bold;" class="cell_spacing" colspan="4">重要提示:此回单为网上银行打印,请勿重复记账。</td>
    </tr>
    <tr>
        <td style="text-align: right;padding-right: 45px;padding-top: 10px;" colspan="6">记帐日期: <?=$data->paymentdate?></td>
    </tr>
</table>
