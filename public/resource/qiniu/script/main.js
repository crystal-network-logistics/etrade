/*global Qiniu */
/*global plupload */
/*global FileProgress */


$(function() {
    var uploader = Qiniu.uploader({
        runtimes: 'html5,flash,html4',
        browse_button: 'btnUpload',
        container: 'container',
        drop_element: 'container',
        max_file_size: '10000mb',
        flash_swf_url: 'bower_components/plupload/js/Moxie.swf',
        dragdrop: true,
        chunk_size: '4mb',
        multi_selection: !(mOxie.Env.OS.toLowerCase()==="ios"),
        uptoken_url: $('#token').val(),
        domain: 'img.lizhizao.com.qiniudns.com',
        get_new_uptoken: false,
        auto_start: true,
        log_level: 5,
        init: {
            'FilesAdded': function(up, files) {
                console.log('FilesAdded:' + files);
            },
            'BeforeUpload': function(up, file) {
                console.log('BeforeUpload:' + file);
            },
            'UploadProgress': function(up, file) {
                console.log('UploadProgress:' + file);
                console.log(file);
            },
            'UploadComplete': function() {

            },
            'FileUploaded': function(up, file, info) {
                FileUploaded(file,$.parseJSON(info));
            },
            'Key': function(up, file) {
                console.log(file);
                // 若想在前端对每个文件的key进行个性化处理，可以配置该函数
                // 该配置必须要在unique_names: false，save_key: false时才生效
                var key = file.name.substring(0,1) + comm.guid() + '.' +file.name.split('.')[1];
                return key
            },
            'Error': function(up, err, errTip) {

            }

        }
    });

    function FileUploaded(file,info){
        var domain = 'http://img.lizhizao.com/';
        var $section = $("<section class='up-section fl'>");
        $('#btnUpload').before($section);
        var $span = $("<span class='up-span'>");
        $span.appendTo($section);
        var $img0 = $("<img class='close-upimg'>").on("click",function(event) {
            event.preventDefault();
            event.stopPropagation();
            $(".works-mask").show();
            delParent = $(this).parent();
        });

        $img0.attr("src","/resource/assets/css/img/a7.png").appendTo($section);
        var $img = $("<img class='up-img'>");
        var type = file.name.split('.')[1].toLocaleLowerCase();
        if(type == 'jpg' || type == 'png' || type == 'gif' || type == 'bmp' || type == 'jpeg'){
            $img.attr("src", domain + info.key);
        }else if(type == 'pdf'){
            $img.attr("src", '/resource/assets/css/img/pdf.png');
        }else{
            $img.attr("src", '/resource/assets/css/img/files.png');
        }
        $img.appendTo($section);

        var $imgs = $('<input type="hidden" name="imgs[]" value="'+ domain + info.key +'">');

        $imgs.appendTo($section);
    }

    uploader.bind('FileUploaded', function() {
        console.log('hello man,a file is uploaded');
    });
    $('#container').on(
        'dragenter',
        function(e) {
            e.preventDefault();
            $('#container').addClass('draging');
            e.stopPropagation();
        }
    ).on('drop', function(e) {
        e.preventDefault();
        $('#container').removeClass('draging');
        e.stopPropagation();
    }).on('dragleave', function(e) {
        e.preventDefault();
        $('#container').removeClass('draging');
        e.stopPropagation();
    }).on('dragover', function(e) {
        e.preventDefault();
        $('#container').addClass('draging');
        e.stopPropagation();
    });

    $('body').on('click', 'table button.btn', function() {
        $(this).parents('tr').next().toggle();
    });

    var getRotate = function(url) {
        if (!url) {
            return 0;
        }
        var arr = url.split('/');
        for (var i = 0, len = arr.length; i < len; i++) {
            if (arr[i] === 'rotate') {
                return parseInt(arr[i + 1], 10);
            }
        }
        return 0;
    };
});

;(function($) {
    $.fn.extend({
        FileConfig : function(opt){
            var imgContainer = $(this).find('.z_photo');
            if(opt && opt.imageNum)
                imageNum = opt.imageNum;
            if(opt.name)
                name = opt.name;
            if(opt.type)
                type = opt.type?opt.type:["jpg","png","bmp","jpeg","pdf","doc","txt","gif","zip","mp4","xls","xlsx","JPG","PNG","BMP","JPEG","PDF","DOC","ZIP","TXT"];

            function fileAdded(file){

            }

            function beforeUpload(file){

            }

            function uploadProgress(file){
            }


        }
    });
})(jQuery);

