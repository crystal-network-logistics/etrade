<meta name="Generator" content="EditPlus">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<link rel="stylesheet" type="text/css" href="/resource/app/jquery-ui.css">
<script src="/resource/app/jquery-ui-1.11.0.js"></script>
<script src="/resource/app/drag.js?_=4.0" type="text/javascript"></script>
<link href="/resource/assets/css/filesPlugin.css?_=<?php echo time()?>" type="text/css" rel="stylesheet"/>
<script src="/resource/app/filesPlugin.js?_=<?php echo time()?>"></script>


<style>
    .z_photo{padding:5px;border: 0px;}
    /*.upimg-div .up-section{width: 40px;height: 40px;}*/
    /*.up-section .close-upimg{top: 0px;right: 0px;width: 20px;}*/
    .box{}i.hander{display:block;position:absolute;width:100%;height:100%;}
    .ui-widget-content {background:none;border: 0px solid;}
</style>
<?php
    $is_has_save = ck_action('declares/stamp/save');
    $is_has_beiz = ck_action('declares/stamp/beiz');

    $stamper = $data['stamper'];
    $data = $data['detail'];
?>
<div class="content form-horizontal">
    <form class="form-horizontal frm_stamper">
        <input name="id" type="hidden" value="<?=$data['id']?>">
        <div class="row">
            <div class="col-md-5">
                <div class="panel panel-defalut">
                    <div class="panel-body mt-20">
                        <div class="form-group">
                            <label class="col-lg-3 ">客户信息:</label>
                            <div class="col-lg-9">
                                <span class="text-primary"><?=$data['customername']??'--'?> </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 ">业务号:</label>
                            <div class="col-lg-9">
                                <span class="text-primary"><?=$data['BusinessID']??'暂无业务单号'?> </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 ">备注:</label>
                            <div class="col-lg-9">
                                <span class="text-primary"><?=$data['stampmark']??'--'?> </span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label>盖章文件:</label>
                            </div>
                            <div class="col-md-8">
                                <div class="img-box full" style="padding: 0px;">
                                    <section class=" img-section">
                                        <div class="z_photo upimg-div clear">
                                            <?php $isHas = isset($data)?($data?($data['original']):false):false;?>
                                            <?php if($isHas) : ?>
                                                <?php $val = $data['original'];$ext = strtolower(explode('.',$val)[1]); ?>
                                                <section class="up-section fl">
                                                    <span class="up-span"><a href="<?=$val?>" target="_blank" >查看文件</a></span>
                                                    <img class="up-img" src="<?php echo $val;?>">
                                                </section>
                                            <?php endif; ?>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>

                        <?php if( ckAuth(false) && $data["status"] == 1 ) {?>
                            <?php $isHas = ( $data['stamper'] && $data['status'] == 2 )?>
                            <div class="row">

                                <div class="col-md-12">
                                    <?php if ( !$isHas ): ?>
                                        <label>印章戳:(<code>PNG格式,W:200*H:200电子章,最多5张.</code>)</label>
                                    <?php endif; ?>
                                    <section class="select_stamper">
                                        <?=\App\Libraries\LibComp::upload_compents(['name'=>'stamper','nums'=>5,'fit' =>'"jpg","jpeg","gif","png"','action' => '/do/signet','callback'=>'upload_stamper','delete' => 'delete_stamper','view_text'=>'请选择印章','view_click'=>'select_click_stamper(this)'],$stamper)?>
                                    </section>
                                </div>
                            </div>
                        <?php }?>

                        <a class="btn btn-pink" href="javascript:history.back()">返回 <i class="icon-circle-left2"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="panel panel-flat">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 div_stamper" style="overflow: auto;">
                                <div class="form-group" >
                                    <div style="position: relative;width: 100%; " class="box box-5" id="pdfconten">
                                        <img src="<?=$data['original'].'?_='.time()?>" style="width:100%">
                                        <div class="ui-widget-content" id="dragStamp">
                                            <i class="hander"></i>
                                            <img id="img_stamper" width="120">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if( ckAuth(false) && $data['status'] == 1 && $is_has_save ) :?>
                            <a class="btn btn-primary" href="/declares/stamp/merge" onclick="var pos = $('#dragStamp'),width = $('.div_stamper').width(); return comm.confirmCTL(this.href,'确定盖章操作?',()=>{setTimeout(()=>{window.location.reload()},3000) },{id:'<?=$data['id']?>',width:width,top:pos.css('top'),left:pos.css('left')})">
                                <i class="icon icon-stamp"></i> 盖章
                            </a>
                            <a class="btn btn-success" href="/declares/stamp/merge/accomplish?id=<?=$data['id']?>" onclick="return comm.confirmCTL(this.href,'确定盖章操作?',(resp)=>{setTimeout(()=>{window.location.reload()},3000) })"><i class="icon icon-floppy-disk"></i> 完成</a>
                        <?php endif; ?>

                        <?php if( $data['status'] == 2 && $data['isbz'] == 0 && $is_has_beiz) {?>
                            <a class="btn btn-info hModal" href="/declares/stamp/selected?id=<?=$data['id']?>"><i class="icon icon- icon-exit"></i> 添加到备证单</a>
                        <?php }?>

                        <a class="btn btn-info" href="/declares/stamp/export_pdf?id=<?=$data['id']?>&type=1" target="_blank"><i class="icon icon-file-pdf"></i> 导出PDF</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    $(function () {
        $('.box-5 div').each(function() {
            $(this).dragging({
                move: 'both',
                randomPosition: true,
                hander: '.hander'
            });
        });
        $("#dragStamp").resizable({
            aspectRatio: false//开启按比例缩放，也可以指定比例： 16 / 9
        });
        $('.div_stamper').css('max-height',document.documentElement.clientHeight - 160)
    });
    // 上传印章
    function upload_stamper (){
        var data = $('.frm_stamper').serialize();
        comm.doRequest('/declares/stamp/upload_stamper',data,(resp)=>{console.log(resp)},'json');
    }

    // 删除印章
    function delete_stamper () {
        upload_stamper();
    }

    // 更新本单印章
    function select_click_stamper( _this ) {
        var img = $(_this).attr('href');//$( _this ).find('input').val();
        console.log(img,$('#stamper'))
        $( '.select_stamper .up-section').removeAttr('style');
            $(_this).parent().parent().attr('style','border: 1px solid #2196f3;');
        $('#img_stamper').attr('src',img).show();
        comm.doRequest('/declares/stamp/setup_stamper',{id:'<?=$data['id']?>',stamper : img},(resp)=>{
            console.log(resp);
        },'json');
        return false;
    }

</script>
