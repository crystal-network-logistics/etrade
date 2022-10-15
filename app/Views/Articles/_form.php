<link href="/resource/assets/css/filesPlugin.css?_=<?php echo time()?>" type="text/css" rel="stylesheet"/>

<?php
$auth = new Auth();
$code = new Code();
$model = isset($data['detail']) ? $data['detail'] : false;
?>

<style>
    .z_photo{padding:5px;border: 0px;}
    .upimg-div .up-section{width: 40px;height: 40px;}
    .img-box{  border: 1px solid gainsboro;  margin-bottom: 0px;}
    .close-upimg{top:0px;right: 0px; width: 20px;}
    .img-name-p{display: none;}
</style>

<script type="text/javascript" src="/resource/app/summernote.min.js"></script>
<link href="/resource/assets/css/summernote.css" rel="stylesheet" type="text/css">

<form id="frmArticles" class="form-horizontal">
    <div class="panel panel-flat">
        <div class="panel-body">
            <input type="hidden" name="id" value="<?php echo $model?$model->id:0?>">

            <div class="form-group">
                <label class="col-lg-2 control-label">文章类别(<span style="color: red;">*</span>):</label>
                <div class="col-lg-4">
                    <?php echo Code::select('CATEGORY',['name'=>'category','class'=>'select','id'=>'primary'],true,$model ? $model->category : '')?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-2 control-label">标题(<span style="color: red;">*</span>):</label>
                <div class="col-lg-4">
                    <input type="text" name="title" class="form-control" required="true" value="<?php echo $model ? $model->title : ''?>">
                </div>
            </div>

            <div class="form-group tabstract">
                <label class="col-lg-2 control-label">摘要:</label>
                <div class="col-lg-4">
                    <textarea  name="summary" class="form-control"><?php echo $model?$model->summary:''?></textarea>
                </div>
            </div>

            <div class="form-group hBanner">
                <label class="col-lg-2 control-label">附件:</label>
                <div class="col-lg-4">
                    <div class="img-box full" style="padding: 0px;">
                        <section class=" img-section">
                            <div class="z_photo upimg-div clear">
                                <?php $isHas = $model?($model->attachment):false;?>

                                <?php if($isHas) {
                                    foreach(explode(',',$isHas) as $val) {

                                    if($val){
                                        $ext = explode('.',$val)[1];
                                    } ?>
                                    <section class="up-section fl" style="width: 40px;height: 40px;">
                                        <span class="up-span"><a href="<?=$val?>" target="_blank" >查看文件</a></span>
                                        <img class="close-upimg" src="/resource/assets/css/img/a7.png" style="top:0px;right: 0px; width: 20px;">
                                        <img class="up-img" src="<?php if($ext == 'jpg' || $ext == 'png' || $ext == 'gif' || $ext == 'bmp' || $ext == 'jpeg'){echo $val;}else if($ext == 'pdf'){ echo '/resource/assets/css/img/pdf.png';} else{ echo '/resource/assets/css/img/files.png';}?>">
                                        <input type="hidden" style="display:none;" name="files[]" value="<?=$val?>">
                                    </section>
                                <?php
                                    }
                                }?>
                                <section class="z_file fl" style="width: 40px;height: 40px;">
                                    <img src="/resource/assets/css/img/a11.png?_1" class="add-img" style="width: 40px;height: 40px ;">
                                    <input type="file" name="file2" id="file2" class="file" value="" multiple />
                                </section>
                            </div>
                        </section>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-2 control-label">内容(<span style="color: red;">*</span>):</label>
                <div class="col-lg-10">
                    <div class="summernote">
                        <?php echo $model?$model->content:''?>
                    </div>

                    <input type="hidden" name="desc" id="nContent">
                </div>
            </div>

            <button type="submit" id="btn-Submit" class="btn btn-primary">保存</button>

            <a href="javascript:history.back();" class="btn btn-link">返回</a>
        </div>
    </div>
</form>

<aside class="mask works-mask">
    <div class="mask-content">
        <p class="del-p">确定移除文件？</p>
        <p class="check-p"><span class="del-com wsdel-ok" style="cursor: pointer">确定</span><span class="wsdel-no" style="cursor: pointer">取消</span></p>
    </div>
</aside>

<script src="/resource/app/filesPlugin.js?_=<?php echo time()?>"></script>

<script>
    $(function(){
        $("#file2").takungaeImgup({
            formData: {
                path: $('#file2').val(),
                name:'files[]'
            },
            imageNum:1,
            //fit : ['png','PNG','jpg','JPG','jpeg','JPEG','gif','GIF'],
            url: '/upload/dofile',

            success: function(data) {
                //console.log(data);
            },
            error: function(err) {
                comm.dAlert(err);
            }
        });
        $('#frmArticles select').select2();
        $('.summernote').summernote({
            callbacks: {
                onImageUpload: function (files) { //the onImageUpload API
                    console.log(files);
                    var img = sendFile(files[0]);
                }
            }
        });
    });

    comm.valid({
        ele : $('#frmArticles'),
        fun : function(){
            var markupStr = $('.summernote').summernote('code');
            $('#nContent').val(markupStr);
            var frm = $('#frmArticles').serialize();
            comm.POST({
                url:'/articles/save?_='+Math.random(),
                data:frm,

                success:function(result){
                    if(result.retCode){
                        comm.pAlert(result.retMsg);

                        setTimeout(function(){
                            window.history.back();
                        },3000);

                    }else{
                        comm.dAlert(result.retMsg);
                    }
                }
            });

        }
    });

    function sendFile(file) {
        var data = new FormData();
        data.append("file", file);
        $.ajax({
            data: data,
            type: "POST",
            url: "/upload/dofile",
            cache: false,
            contentType: false,
            processData: false,
            success: function(result) {
                $(".summernote").summernote('insertImage', result.url, 'image name');
            }
        });
    }
</script>