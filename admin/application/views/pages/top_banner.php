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
                        <h2 class="main">Manage Top Banner</h2>
                        
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
                          
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!--  <p class="text-muted font-13 m-b-30">
                              Responsive is an extension for DataTables that resolves that problem by optimising the table's layout for different screen sizes through the dynamic insertion and removal of columns from the table.
                          </p>-->

                     <form role="form" id="manage_settings" action="<?= base_url(); ?>pages/update_banner" method="post" enctype="multipart/form-data">               
                        
                        <div class="clearfix"></div>
                       
                              <div class="col-md-12">
                                    <div class="col-md-9 col-xs-7 text-left" style="padding-left: 0px">
                                        <div class="form-group">
                                            <label for="topbar">Top Banner</label>
                                            <input type="text" id="topbar" class="form-control" name="topbar" placeholder="Top Banner" value="<?=$banner["value"]?>" required readonly />
                                            <input type="hidden"  class="form-control" name="id"  value="<?=$banner["id"]?>" required readonly />
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-xs-5 text-right" style="padding-right: 0px">
                                        <label>&nbsp;</label>
                                        <div class="clearfix"></div>
                                        <a href="<?= base_url(); ?>assets/plugins/responsive_filemanager/filemanager/dialog.php?type=1&field_id=topbar" class="btn btn-default iframe-btn" type="button">Select File</a>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="box-footer">
                                    <input type="submit" class="btn btn-primary" value="Update Banner" />
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
