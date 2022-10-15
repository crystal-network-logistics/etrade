<?=view('/Admin/Users/_form')?>
<script>
    comm.formload($('#frm_user'),{ roles : "<?=$data->user_roles?>"})
</script>
