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
                        <h2 class="main"><?= $this->lang->line('addcat')?></h2>
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

                        <form role="form" id="edit_page" action="<?= base_url(); ?>Faqs/save_faq" method="post" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="page_title"><?= $this->lang->line('title')?> <span style="color: #FF0000;">*</span></label>
                                    <input type="text" id="page_title" required="required" class="form-control" name="cname" placeholder="<?= $this->lang->line('title')?>" />
                                </div>
                            </div>

                            <div class="clearfix"></div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="page_details"><?= $this->lang->line('desc')?> <span style="color: #FF0000;">*</span></label>
                                    <textarea id="page_details" required="required" class="form-control" name="cat_detail" placeholder="<?= $this->lang->line('desc')?>"></textarea>
                                    <p style="display: none;" id="page_details-error" class="validate_error" for="cat_detail">page Detail is required.</p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" value="<?= $this->lang->line('addcat')?>" />
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
        $("#edit_page").submit(function() {
            var content = tinyMCE.activeEditor.getContent();
            if(content == "") {
                $("#page_details-error").show();
                return false;
            }
        });
    }); //document.ready
</script>

