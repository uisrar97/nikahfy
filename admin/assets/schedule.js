$(document).on('click','#link-btn1',function(){
    if($('.link-input-container1').hasClass("hidden")){
        $('.link-input-container1').removeClass("hidden");
        $(".link1").focus();
    }else{
        $('.link-input-container1').addClass("hidden");
        $(".link1").val('');
    }
});
$(document).ready(function() {
    $('.choose_business1').select2({
        placeholder: "Select Business Type",
        allowClear: true,
        width:'100%'

    });

    $('.choose_ST1').select2({
        placeholder: "Choose Store|Branch",
        allowClear: true,
        width:'100%'

    });

    $('.choose-messagetype1').select2({
        placeholder: "Select Message Type",
        allowClear: true,
        width:'100%'
    });


    $('.choose-head1').select2({
        placeholder: "Select HeadQuarter",
        allowClear: true,
        width:'100%'

    });
    $('#input-default1').emojiPicker({
        width: '300px',
        height: '200px',
    });

    $('body').on('click','.addlink1',function () {
        var data= $('.link1').val();
        var message= $('.message1').val();
        var holestring=message+data;
        $('.message1').val(holestring);
    });

    $('body').on('click','#camera1',function () {

     //   $('#file11').trigger('click');
        $('.gallerymodal1').modal({
            show: true,
            backdrop: false
        });
        var type = 'Promotional_Notifications';
        $.ajax({
            url: base_url + "admin/ImageRepository/get_image",
            type: "POST",
            dataType: "json",
            data: {type: type},
            success: function (res) {
                $('.gallerylist1').html('');
                if (res != "false") {
                    $.each(res, function (key, value) {
                        var img1 = base_url + 'uploads/ImageRepository/' + value.image;
                        var html = $(
                            '<div class="col-xs-4 col-sm-3 col-md-2 nopad1 text-center">' +
                            '<label class="image-checkbox1" data-img="'+value.image+'">' +
                            '<img class="img-responsive" src="' + img1 + '" />' +
                            '<i class="fa fa-check hidden"></i>' +
                            '</label>' +
                            '</div>'
                        );

                        $('.gallerylist1').append(html);
                        html = '';
                    });
                } else {

                    new PNotify({
                        title: 'Faqs',
                        text: 'No faqs found',
                        type: 'error',
                        hide: true,
                        styling: 'bootstrap3'
                    });
                }

            }
        });
    });

    $('body').on('change','#business_type1',function () {
        var bustype=$(this).val();
        $.ajax({
            url: base_url+"admin/Promotionalmessages/get_headquarter_type",
            type:"POST",
            dataType:"json",
            data:{bustype:bustype},
            success:function(res) {
                $('#head_quarters1').html('');
                if(res!="false"){
                    $("#head_quarters1").prepend("<option>Choose HeadQuarter</option>");
                    $.each(res,function (key,value) {
                        var html= $(
                            '<option value="'+value.id+'">'+value.company+'</option>'
                        );
                        $('#head_quarters1').append(html);
                        html='';
                    });
                }else{

                    new PNotify({
                        title: 'Faqs',
                        text: 'No faqs found',
                        type: 'error',
                        hide: true,
                        styling: 'bootstrap3'
                    });
                }

            }
        });
    });

    $('body').on('change','#head_quarters1',function () {
        var id=$(this).val();
        $.ajax({
            url: base_url+"admin/ProductCategory/get_store",
            type:"POST",
            dataType:"json",
            data:{hqid:id},
            success:function(res) {
                $('#store1').html('');
                if(res!="false"){
                    $("#store1").prepend("<option>Choose Store|Branch</option>");
                    $.each(res,function (key,value) {
                        var headhtml= $(
                            '<option value="'+value.id+'">'+value.name+'</option>'
                        );
                        $('#store1').append(headhtml);
                        headhtml='';
                    });
                }else{

                    new PNotify({
                        title: 'Store',
                        text: 'No Store Found',
                        type: 'error',
                        hide: true,
                        styling: 'bootstrap3'
                    });
                }

            }
        });
    });
});
window.addEventListener('DOMContentLoaded', function () {
    var avatar = document.getElementById('avatar1');
    var image = document.getElementById('image1');
    var input = document.getElementById('input1');
    var $progress = $('.progress');
    var $progressBar = $('.progress-bar');
    var $alert = $('.alert');
    var $modal = $('#modal1');
    var cropper;

    $('[data-toggle="tooltip"]').tooltip();

    input.addEventListener('change', function (e) {
        var files = e.target.files;
        var done = function (url) {
            input.value = '';
            image.src = url;
            $alert.hide();
            $modal.modal('show');
        };
        var reader;
        var file;
        var url;

        if (files && files.length > 0) {
            file = files[0];

            if (URL) {
                done(URL.createObjectURL(file));
            } else if (FileReader) {
                reader = new FileReader();
                reader.onload = function (e) {
                    done(reader.result);
                };
                reader.readAsDataURL(file);
            }
        }
    });

    $modal.on('shown.bs.modal', function () {
        cropper = new Cropper(image, {
            aspectRatio: 300/160,
            viewMode: 3,
            minCropBoxWidth: 300,
            minCropBoxHeight: 160,
        });
    }).on('hidden.bs.modal', function () {
        cropper.destroy();
        cropper = null;
    });

    document.getElementById('crop1').addEventListener('click', function () {
        var initialAvatarURL;
        var canvas;

        $modal.modal('hide');

        if (cropper) {
            canvas = cropper.getCroppedCanvas({
                width: 300,
                height: 160,
            });
            /*       initialAvatarURL = avatar.src;
                   avatar.src = canvas.toDataURL();*/
            $progress.show();
            $alert.removeClass('alert-success alert-warning');
            canvas.toBlob(function (blob) {
                var formData = new FormData();

                formData.append('avatar', blob, 'avatar.jpg');
                $.ajax(base_url+'admin/ImageRepository/promotionalimages', {
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    xhr: function () {
                        var xhr = new XMLHttpRequest();

                        xhr.upload.onprogress = function (e) {
                            var percent = '0';
                            var percentage = '0%';

                            if (e.lengthComputable) {
                                percent = Math.round((e.loaded / e.total) * 100);
                                percentage = percent + '%';
                                $progressBar.width(percentage).attr('aria-valuenow', percent).text(percentage);
                            }
                        };

                        return xhr;
                    },

                    success: function (res) {
                        $('.catimage2').html('');
                        $('#deal_main_image_folder').val('');
                        $('#deal_main_image_cropper').val('');
                        $('#deal_main_image_folder1').val('');
                        $('#deal_main_image_cropper1').val(res);
                        var img1 = base_url+'uploads/promotionalimages/'+res;
                        var img = '<img style="width:200px;height: 100px" src="' + img1+ '">';
                        alert(img);
                        $('.catimage2').append(img);
                        new PNotify({
                            title: 'success',
                            text: 'Upload successfully',
                            type: 'success',
                            hide: true,
                            styling: 'bootstrap3'
                        });
                        $('.gallerymodal1').modal('hide');
                    },

                    error: function () {
                        avatar.src = initialAvatarURL;
                        new PNotify({
                            title: 'Error',
                            text: 'Uploading Fail',
                            type: 'error',
                            hide: true,
                            styling: 'bootstrap3'
                        });
                    }/*,

                        complete: function () {
                            $progress.hide();
                        },*/
                });
            });
        }
    });
});
