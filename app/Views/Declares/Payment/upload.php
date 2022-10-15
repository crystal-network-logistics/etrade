<form class="frm_up_entry_file" action="/declares/payment/upload">
    <input name="id" value="<?=$data['detail']['id']?>" type="hidden">
    <?=\App\Libraries\LibComp::upload_compents(['name'=>'file','nums'=>1,'fit'=>'"jpg","jpeg","pdf","png","jpg","xls","xlsx","doc","docx"'])?>
</form>
