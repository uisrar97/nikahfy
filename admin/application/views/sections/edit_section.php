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

                        <form role="form" id="edit_page" action="<?= base_url(); ?>Sections/update_section" method="post" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="page_title"><?= $this->lang->line('sectionname')?> <span style="color: #FF0000;">*</span></label>
                                    <input type="text" id="page_title" class="form-control" name="page_title" placeholder="<?= $this->lang->line('sectionname')?>" value="<?= $section->page_title?>" />
                                    <input type="hidden" id="id" class="form-control" name="id" placeholder="Page Title" value="<?= $section->page_id?>"/>
                                </div>
                            </div>

                            <div class="clearfix"></div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="page_details"><?= $this->lang->line('sectiondetail')?> <span style="color: #FF0000;">*</span></label>
                                    <textarea id="page_details" class="form-control" name="page_details" placeholder="<?= $this->lang->line('sectiondetail')?>"><?= $section->page_details?></textarea>
                                    <p style="display: none;" id="page_details-error" class="validate_error" for="page_details">page Detail is required.</p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" value="<?= $this->lang->line('update')?>" />
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
            content_css : "<?= DEVDIRNAMEAdmin; ?>assets/css/bootstrap.min.css,https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap,<?= DEVDIRNAMEAdmin; ?>assets/css/style.css",
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
            external_filemanager_path:"../assets/plugins/responsive_filemanager/filemanager/",
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

