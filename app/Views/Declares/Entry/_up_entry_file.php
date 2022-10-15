

<form class="frm_up_entry_file" action="/declares/project/upload_entry">
    <input name="id" value="<?=$data['detail']['id']?>" type="hidden">
    <?=\App\Libraries\LibComp::upload_compents(['name'=>'entry_file','nums'=>1,'fit'=>'"jpg","jpeg","pdf","png","jpg","xls","xlsx","doc","docx"'])?>
</form>
