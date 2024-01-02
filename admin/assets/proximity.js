$(document).on('click','#link-btn2',function(){
    if($('.link-input-container2').hasClass("hidden")){
        $('.link-input-container2').removeClass("hidden");
        $(".link1").focus();
    }else{
        $('.link-input-container2').addClass("hidden");
        $(".link2").val('');
    }
});
$(document).ready(function() {
    $('.choose_business2').select2({
        placeholder: "Select Business Type",
        allowClear: true,
        width:'100%'

    });


    $('.choose_proximity').select2({
        placeholder: "Choose proximity Type",
        allowClear: true,
        width:'100%'


    });



    $('.choose_beacon_geo').select2({
        placeholder: "Select Devices",
        allowClear: true,
        width:'100%'
    });
    $('.choose_ST2').select2({
        placeholder: "Choose Store|Branch",
        allowClear: true,
        width:'100%'

    });

    $('.choose-messagetype2').select2({
        placeholder: "Select Message Type",
        allowClear: true,
        width:'100%'
    });


    $('.choose-head2').select2({
        placeholder: "Select HeadQuarter",
        allowClear: true,
        width:'100%'

    });
    $('#input-default2').emojiPicker({
        width: '300px',
        height: '200px',
    });

    $('body').on('click','.addlink2',function () {
        var data= $('.link2').val();
        var message= $('.message2').val();
        var holestring=message+data;
        $('.message2').val(holestring);
    });

    $('body').on('click','#camera2',function () {
        $('#file12').trigger('click');
    });

    $('body').on('change','#business_type2',function () {
        var bustype=$(this).val();
        $.ajax({
            url: base_url+"admin/Promotionalmessages/get_headquarter_type",
            type:"POST",
            dataType:"json",
            data:{bustype:bustype},
            success:function(res) {
                $('#head_quarters2').html('');
                if(res!="false"){
                    $("#head_quarters2").prepend("<option>Choose HeadQuarter</option>");
                    $.each(res,function (key,value) {
                        var html= $(
                            '<option value="'+value.id+'">'+value.company+'</option>'
                        );
                        $('#head_quarters2').append(html);
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

    $('body').on('change','#head_quarters2',function () {
        var id=$(this).val();
        $.ajax({
            url: base_url+"admin/ProductCategory/get_store",
            type:"POST",
            dataType:"json",
            data:{hqid:id},
            success:function(res) {
                $('#store2').html('');
                if(res!="false"){
                    $("#store2").prepend("<option>Choose Store|Branch</option>");
                    $.each(res,function (key,value) {
                        var headhtml= $(
                            '<option value="'+value.id+'">'+value.name+'</option>'
                        );
                        $('#store2').append(headhtml);
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


    $('body').on('change','#proximity_type',function () {
        var proximity_type= $(this).val();
        var storeid= $('#store2').val();
        $('#geobeacon').show();
        $.ajax({
            url: base_url+"admin/Promotionalmessages/get_beacon_geo",
            type:"POST",
            dataType:"json",
            data:{proximity_type:proximity_type,storeid:storeid},
            success:function(res) {
                $('#beacon_geo').html('');
                if(res!="false"){
                    $("#beacon_geo").prepend("<option>Choose a Device</option>");
                    $.each(res,function (key,value) {
                        var headhtml= $(
                            '<option value="'+value.id+'">'+value.name+'</option>'
                        );
                        $('#beacon_geo').append(headhtml);
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
