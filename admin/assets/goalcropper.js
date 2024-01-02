window.addEventListener('DOMContentLoaded', function () {
    var avatar = document.getElementById('avatar1');
    var image = document.getElementById('image1');
    var input = document.getElementById('input1');
    var $progress = $('.progress1');
    var $progressBar = $('.progress-bar1');
    var $alert = $('.alert1');
    var $modal = $('#modal1');
    var cropper;

    $('[data-toggle="tooltip"]').tooltip();

    input.addEventListener('change', function (e) {
        var files = e.target.files;
        var loyalty=$('#loyalclass').val();
        $('.Trclass').val(loyalty);
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
       var classtest= $('.Trclass').val();
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
                $.ajax(base_url+'admin/ImageRepository/Uploadimage', {
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
						var row_id = $('#loyalclass').val();
						$('.goalimagefolder'+row_id).val('');
						$('.goalimageold'+row_id).val('');
						$('.goalimagecropper'+row_id).val(res);
						var img1 = base_url+'uploads/ImageRepository/'+res;
						$('.goalimagetd'+row_id).html('<img class="img-thumbnail" style="width:50px;height: 30px" src="' + img1+ '">');
						
                        // $('.profile11').html('');
                       // $('.goalimage').val(res);
                        // $(".goaltb").find($("."+classtest+"")).val(res);
                        // var img1 = base_url+'uploads/ImageRepository/'+res;
                        // var img = '<img class="img-thumbnail" style="width:50px;height: 30px" src="' + img1+ '">';
                      //  var row= $(this).select().closest('tr');
                        //row.find('td:eq(3)').append(img);
                         // $(".goaltb").find("."+classtest+":first").append(img);
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