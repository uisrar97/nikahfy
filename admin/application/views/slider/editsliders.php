<?php $this->load->view('admin/include/header')?>
<?php $this->load->view('admin/include/sidebar')?>
<style>
    .textalign{
        text-align: center;
    }

    /* td {
           color: black;
     }*/
</style>

<div class="right_col" role="main">
    <div class="">
        <div class="row">
            <img id="loader" src="<?php echo base_url('assets/images/loader.gif')?>">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2 class="main"><?= $this->lang->line('edit')?></h2>

                        <div class="clearfix"></div>
                    </div>

                </div>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="row">
            <img id="loader" src="<?php echo base_url('assets/images/loader.gif')?>">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!--  <p class="text-muted font-13 m-b-30">
                              Responsive is an extension for DataTables that resolves that problem by optimising the table's layout for different screen sizes through the dynamic insertion and removal of columns from the table.
                          </p>-->
                        <form id="addslider" method="post" action="<?php echo base_url().'Slider/update'?>" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="page_title"><?= $this->lang->line('slidertitle')?> <span style="color: #FF0000;">*</span></label>
                                    <input type="text" id="title" class="form-control" name="title" placeholder="Page Title" value="<?php echo $sliders->slider_title?>" />
                                    <input type="hidden" id="title" class="form-control" name="id" placeholder="Page Title" value="<?php echo $sliders->slider_id?>" />
                                </div>
                            </div>
                         
							
								<div class="col-md-6">
										<div class="col-md-9 col-xs-7 text-left" style="padding-left: 0px">
										<div class="form-group">
										<label for="video1"><?= $this->lang->line('sliderimage')?></label>
										<input type="text" id="project_img_1"  class="form-control" value="<?php echo $sliders->sliderimage?>" name="sliderimage" readonly required   placeholder="<?= $this->lang->line('sliderimage')?>" />
<input type="hidden" id="oldimage" class="form-control" name="oldimage" value="<?php echo $sliders->sliderimage?>"/>
										</div>
										</div>
										<div class="col-md-3 col-xs-5 text-right" style="padding-right: 0px">
										<label>&nbsp;</label>
										<div class="clearfix"></div>
										<a href="<?php echo base_url(); ?>assets/plugins/responsive_filemanager/filemanager/dialog.php?type=1&field_id=project_img_1" class="btn btn-default iframe-btn" type="button"><?= $this->lang->line('selectfile')?></a>

										</div>


									</div>
							
                            <div class="col-md-3">
                                <img class="img img-thumbnail" style="width:100px; height: 100px;" src="<?php echo $sliders->sliderimage;?>">
                            </div>

                            <!--<div class="clearfix"></div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="page_details">Description <span style="color: #FF0000;">*</span></label>
                                    <textarea id="page_details" class="form-control" name="desc" placeholder="Description"><?php echo $sliders->desc?></textarea>
                                    <p style="display: none;" id="page_details-error" class="validate_error" for="page_details">description is required.</p>
                                </div>
                            </div>-->
                            <div class="clearfix"></div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input class="btn btn-primary send" type="submit" value="<?= $this->lang->line('update')?>" />
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- footer content -->

<?php $this->load->view('admin/include/footer')?>
<script src="<?= base_url(); ?>assets/plugins/tinymce/tinymce.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/jQueryValidate/jquery.validate.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fancybox/jquery.fancybox.css">
<script src="<?php echo base_url(); ?>assets/plugins/fancybox/jquery.fancybox.js"></script>
<script>

    $(document).ready(function () {
        <?php if($this->session->flashdata('msg')){ ?>
        new PNotify({
            title: 'Save',
            text: '<?php echo $this->session->flashdata("msg");?>',
            type: 'info',
            hide: true,
            styling: 'bootstrap3'
        });
        <?php } elseif ($this->session->flashdata('error')){?>

        new PNotify({
            title: 'Save',
            text: '<?php echo $this->session->flashdata("error");?>',
            type: 'error',
            hide: true,
            styling: 'bootstrap3'
        });
        <?php }?>



        $('.iframe-btn').fancybox({
            'width' : 900,
            'minHeight': 500,
            'type' : 'iframe',
            'autoScale' : false
        });
        tinymce.init({
            selector:'#page_details',
            content_css : "<?= DEVDIRNAMEAdmin; ?>assets/css/bootstrap.min.css,<?= DEVDIRNAMEAdmin; ?>assets/css/font-awesome.min.css,<?= DEVDIRNAMEAdmin; ?>assets/css/style.css,<?= DEVDIRNAMEAdmin; ?>assets/css/uikit.min.css",
            extended_valid_elements : 'span[class|align|style]',
//            forced_root_block : "",
            forced_root_block_attrs: {
                'class': 'root_block_p',
            },
            setup : function(ed) {
                ed.on('change', function(e) {
                    $("#page_details-error").hide();
                });
            },
            element_format : 'html',
            convert_fonts_to_spans : false,
            relative_urls: false,
            remove_script_host : false,
            height: 450,
            browser_spellcheck: true,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code',
                'insertdatetime table contextmenu paste',
                'textcolor responsivefilemanager media'
            ],
            toolbar: 'undo redo | styleselect | fontsizeselect | bold italic | forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link | image | media',
            external_filemanager_path:"<?php echo base_url()?>assets/plugins/responsive_filemanager/filemanager/",
            filemanager_title:"Images Manager" ,
            external_plugins: { "filemanager" : "../responsive_filemanager/filemanager/plugin.min.js"}
        });

        $("#edit_page").validate({
            errorClass: 'validate_error',
            rules: {
                page_title: {
                    required: true
                }
            },
            messages: {
                page_title: {
                    required: "page title is requried.",
                }
            }
        });
        /*
                $("#edit_page").submit(function() {
                    var content = tinyMCE.activeEditor.getContent();
                    if(content == "") {
                        $("#page_details-error").show();
                        return false;
                    }
                });*/
        $('body').on('click','.send',function(){

            $('#addslider').submit();
        });
    }); //document.ready
</script>
