<?php $this->load->view('admin/include/header')?>
<?php $this->load->view('admin/include/sidebar')?>

<!-- /top navigation -->

<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2 class="main">Send Email</h2>

						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <form role="form" id="send_new_email" action="<?php echo base_url('send-new-email');?>" method="post" enctype="multipart/form-data">
                                <div class="clearfix"></div>
                                <div class="col-md-12">
                                        <label>To</label>
                                        <br>
                                        <input id='n_email' name="to" class='form-control to' placeholder="Email Address" required>
                                        <br>
                                </div>
                                <div class="col-md-12">
                                        <label>Cc</label>
                                        <br>
                                        <input id='cc_email' name="cc" class='form-control' placeholder="Cc" value=""/>
                                        <br>
                                </div>
                                <div class="col-md-12">
                                        <label>Bcc</label>
                                        <br>
                                        <input id='bcc_email' name="bcc" class='form-control' placeholder="Bcc" value=""/>
                                        <br>
                                </div>
                                <div class="col-md-12">
                                        <label>Subject</label>
                                        <br>
                                        <input id="email_subject" name="subject" class="form-control" placeholder="Subject">
                                        <br>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <textarea id="email_details" class="form-control" name="emailbody"></textarea>
                                        <p style="display: none;" id="email_details-error" class="validate_error" for="email_details">page Detail is required.</p>
                                    </div>

                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="btn btn-primary" type="submit" value="Send" />
                                    </div>
                                </div>
                            </form>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /page content -->

<?php $this->load->view('admin/include/footer')?>

<script src="<?= base_url(); ?>assets/plugins/tinymce/tinymce.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/jQueryValidate/jquery.validate.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fancybox/jquery.fancybox.css">
<script src="<?php echo base_url(); ?>assets/plugins/fancybox/jquery.fancybox.js"></script>
	
<script>
    $(document).ready(function () 
    {
        $('.iframe-btn').fancybox({
            'width' : 900,
            'minHeight': 500,
            'type' : 'iframe',
            'autoScale' : false
        });
        tinymce.init({
            selector:'#email_details',
            content_css : "<?= DEVDIRNAME; ?>assets/css/bootstrap.min.css,https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap,<?= DEVDIRNAME; ?>assets/css/style.css",
            extended_valid_elements : 'span[class|align|style]',
            //forced_root_block : "",
            forced_root_block_attrs: {
                'class': 'root_block_p',
            },
            setup : function(ed) {
                ed.on('change', function(e) {
                    $("#email_details-error").hide();
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
            external_filemanager_path:"<?php echo base_url(); ?>assets/plugins/responsive_filemanager/filemanager/",
            filemanager_title:"Images Manager" ,
            external_plugins: { "filemanager" : "../responsive_filemanager/filemanager/plugin.min.js"}
        });
    }); //document.ready
</script>