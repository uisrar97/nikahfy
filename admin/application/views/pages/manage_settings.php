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
                        <h2 class="main"><?= $this->lang->line('msetting')?></h2>
                        
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
                        
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <!-- <li class="dropdown">
                                 <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                 <ul class="dropdown-menu" role="menu">
                                     <li><a href="#">Settings 1</a>
                                     </li>
                                     <li><a href="#">Settings 2</a>
                                     </li>
                                 </ul>
                             </li>
                             <li><a class="close-link"><i class="fa fa-close"></i></a>
                             </li>-->
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!--  <p class="text-muted font-13 m-b-30">
                              Responsive is an extension for DataTables that resolves that problem by optimising the table's layout for different screen sizes through the dynamic insertion and removal of columns from the table.
                          </p>-->

                     <form role="form" id="manage_settings" action="<?php echo base_url()?>pages/update_settings" method="post" enctype="multipart/form-data">               
                        
                        <div class="clearfix"></div>
                        <?php $i = 0; if(!empty($settings)) { foreach($settings as $setting) {
                            $required = "";
                            $required_text = "";
                            $help_text = '<p class="text-info">Leave empty to hide.</p>';
                            if($setting['required'] == "yes") {
                                $required = "required";
                                $help_text = "";
                                $required_text = '<span style="color: #FF0000;">*</span>';
                            }
                        ?>
                            <?php if($setting['type'] == 'textarea') { ?>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="<?= $setting['field_name']; ?>"><?= $setting['description']; ?> <?= $required_text; ?></label>
                                    <textarea rows="1" id="<?= $setting['field_name']; ?>" class="form-control" name="<?= $setting['field_name']; ?>" placeholder="<?= $setting['description']; ?>" <?= $required; ?>><?= $setting['value']; ?></textarea>
                                    <?= $help_text; ?>
                                </div>
                            </div>
                            <?= ($i%2 == 0)? "" : "<div class='clearfix'></div>"; ?>
                            <?php }else if($setting['type'] == 'textfield') { ?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="<?= $setting['field_name']; ?>"><?= $setting['description']; ?>  <?= $required_text; ?></label>
                                        <input type="text" id="<?= $setting['field_name']; ?>" class="form-control" name="<?= $setting['field_name']; ?>" placeholder="<?= $setting['description']; ?>" value="<?= $setting['value']; ?>" <?= $required; ?> />
                                        <?= $help_text; ?>
                                    </div>
                                </div>
                            <?= ($i%2 == 0)? "" : "<div class='clearfix'></div>"; ?>
                            <?php }else if($setting['type'] == 'selectfield') {
								$options_array = explode(",", $setting['selectfield_values']);
							?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="<?= $setting['field_name']; ?>"><?= $setting['description']; ?>  <?= $required_text; ?></label>
										<select id="<?= $setting['field_name']; ?>" class="form-control" name="<?= $setting['field_name']; ?>" placeholder="<?= $setting['description']; ?>">
											<?php foreach($options_array as $option) { ?>
												<option value="<?= $option; ?>" <?= ($setting['value'] == $option)? "selected" : ""; ?>><?= $option; ?></option>
											<?php } ?>
										</select>
                                        <?= $help_text; ?>
                                    </div>
                                </div>
                            <?= ($i%2 == 0)? "" : "<div class='clearfix'></div>"; ?>
                            <?php }else if($setting['type'] == 'file') { ?>
                                <div class="col-md-6">
                                    <div class="col-md-9 col-xs-7 text-left" style="padding-left: 0px">
                                        <div class="form-group">
                                            <label for="<?= $setting['field_name']; ?>"><?= $setting['description']; ?>  <?= $required_text; ?></label>
                                            <input type="text" id="<?= $setting['field_name']; ?>" class="form-control" name="<?= $setting['field_name']; ?>" placeholder="<?= $setting['description']; ?>" value="<?= $setting['value']; ?>" <?= $required; ?> readonly />
                                            <?= $help_text; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-xs-5 text-right" style="padding-right: 0px">
                                        <label>&nbsp;</label>
                                        <div class="clearfix"></div>
                                        <a href="<?= base_url(); ?>assets/plugins/responsive_filemanager/filemanager/dialog.php?type=1&field_id=<?= $setting['field_name']; ?>" class="btn btn-default iframe-btn" type="button"><?= $this->lang->line('selectfile')?></a>
                                    </div>
                                </div>
                            <?= ($i%2 == 0)? "" : "<div class='clearfix'></div>"; ?>
                            <?php }else if($setting['type'] == 'checkbox') { ?>
                                <div class="col-md-6">
                                    <div class="form-group">
									<label>&nbsp;</label>
                                        <label for="<?= $setting['field_name']; ?>"><?= $setting['description']; ?>  <?= $required_text; ?></label>
										<input type="hidden" id="<?= $setting['field_name']."_hidden"; ?>" name="<?= $setting['field_name']; ?>" value="<?= $setting['value']; ?>"/>
                                        <input class="checkboxcheck" data-id="<?= $setting['field_name']; ?>" type="checkbox" id="<?= $setting['field_name']; ?>"  placeholder="<?= $setting['description']; ?>" value="yes" <?= ($setting['value'] == "")? "" : "checked"; ?> />
                                        
                                    </div>
                                </div>
                            <?= ($i%2 == 0)? "" : "<div class='clearfix'></div>"; ?>
                            <?php } ?>
                            <?php $i++; } ?>

                                <div class="clearfix"></div>
                                <div class="box-footer">
                                    <input type="submit" class="btn btn-primary" value="<?= $this->lang->line('update')?>" />
                                </div>
                            <?php } ?>                                
                    </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- footer content -->


<?php $this->load->view('admin/include/footer')?>
<script src="<?= base_url(); ?>assets/plugins/jQueryValidate/jquery.validate.min.js"></script>
<link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/fancybox/jquery.fancybox.css">
<script src="<?= base_url(); ?>assets/plugins/fancybox/jquery.fancybox.js"></script>

<script>
    $(document).ready(function () {
       


		
		$(document).on("click", ".checkboxcheck", function() {
			if($(this).is(":checked")) {
				$("#"+$(this).data("id")+"_hidden").val("yes");
			}else {
				$("#"+$(this).data("id")+"_hidden").val("");
			}
		});
		
        $('.iframe-btn').fancybox({	
            'width' : 900,
            'minHeight': 500,
            'type' : 'iframe',
            'autoScale' : false
        });
        /* Validate method to check image size */
        $.validator.addMethod('filesize', function (value, element, param) {
            return this.optional(element) || (element.files[0].size <= param)
        });
        $("#manage_settings").validate({
            errorClass: 'validate_error',
        });
    }); //document.ready   
</script>
<script>

    $(document).ready(function() {


        <?php if($this->session->flashdata('success')){ ?>
        new PNotify({
            title: 'Save',
            text: '<?php echo $this->session->flashdata("success");?>',
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


    });



</script>
