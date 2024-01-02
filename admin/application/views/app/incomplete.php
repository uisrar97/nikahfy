<?php $this->load->view('admin/include/header')?>
<?php $this->load->view('admin/include/sidebar')?>
<style>
	.textalign
    {
		text-align: center;
	}
    .dataTables_filter 
    {
        display: none;
    }
</style>
<div class="modal fade bs-example-modal-md v" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #2695B9; color: white">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Send Email(s)</h4>
            </div>
            <form role="form" id="edit_page" action="<?php echo base_url().'app/Incomplete/send_emails';?>" method="post">
                <div class="modal-body">
                    <label>Email Address(es)</label>
                    <input id='n_email' name="to" class='form-control' placeholder="Email Address(es)" value="">
                    <br>
                    <label>Subject</label>
                    <input id="email_subject" name="subject" class="form-control" placeholder="Subject">
                    <br>
                    <label>Email</label>
                    <textarea id="email_details" class="form-control" name="emailbody"></textarea>
                    <p style="display: none;" id="email_details-error" class="validate_error" for="email_details">page Detail is required.</p>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success" value="Send Email"/>
            </form>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                </div>
        </div>
    </div>
</div>
<div class="right_col" role="main">
	<div class="">
		<div class="row">
			<img id="loader" src="<?php echo base_url('assets/images/loader.gif')?>">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2 class="main">Incomplete Profiles List</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                                <button id="del" style="display:none;" class="btn btn-round btn-info btn-block" href=""><i class="fa fa-plus" style="color:black;"> Send Email(s)</i></button>
                                <!-- <input type="Submit" id="del" style="display:none;" class="btn btn-round btn-info btn-block" value="Send Email"/> -->
                            </li>
                        </ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
                        <div class="table-responsive">
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
								<thead>
                                    <tr>
                                        <th>Profile Image</th>
                                        <th>Profile Name</th>
                                        <th>Gender</th>
                                        <th style="width: 2px">Select All <input type="checkbox" style="width: 16px; height: 16px;" id="inall"></th>
                                    </tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /page content -->

<script src="<?= base_url(); ?>assets/plugins/tinymce/tinymce.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/jQueryValidate/jquery.validate.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fancybox/jquery.fancybox.css">
<script src="<?php echo base_url(); ?>assets/plugins/fancybox/jquery.fancybox.js"></script>

<!-- footer content -->
<script type="text/javascript">
    base_url = '<?=base_url()?>';
    $(document).ready(function() {
        var ids=[];
        var info={};
        $('body').on('click','#inall',function ()
        {
            if($(this).is(":checked"))
            {
                $('.all').each(function () 
                {
                    $(this).prop('checked',true);
                    
                    ids.push($(this).val());
                });
                console.log(ids);
            }
            else
            {
                $('.all').each(function () 
                {
                    $(this).prop('checked',false);
                    checkArray($(this).val());
                });
            }
            showbutton(ids);
        });
        $('body').on('click','.all',function () 
        {
            if($(this).is(":checked"))
            {
                ids.push($(this).val());
            }
            else
            {
                checkArray($(this).val());
            }
            showbutton(ids);
            console.log(ids);
        });
        function checkArray(id)
        {
            $.each(ids, function(key, value)
            {
                if(typeof value !== 'undefined')
                {
                    if(value.id == id)
                    {
                        ids.splice(key,1);
                        console.log(ids);
                    }
                }
            });
        }
        function showbutton(ids)
        {
            if(ids!='')
            {
                $('#del').fadeIn();
            }
            else
            {
                $('#inall').prop('checked',false);
                $('#del').fadeOut();
            }
        }
        
        $('#del').on('click',function()
        {
            document.getElementById("n_email").value = ids;
            
            $('.v').modal(
            {
                show:true,
                backdrop:false
            });
            
        });
        
        $('#datatable-responsive').DataTable({
            order: [],
            "scrollX": true,
            "ajax":{
                "url": base_url+"app/Incomplete/get_incomplete",
                "processing" : true,
                "serverside" : false,
                "dataType": "json",
                "deferRender": true,
                "type": "GET"
            },
            "columns": [
                {
                    "data": "pro_image"
                },
                {
                    "data": "pro_name"
                },
                {
                    "data": "pro_gender"
                },
                {
                    "data": "btn",
                    className: "textalign"
                }
            ]
        });
        $('.iframe-btn').fancybox({
            'width' : 900,
            'minHeight': 500,
            'type' : 'iframe',
            'autoScale' : false
        });
        tinymce.init({
            selector:'#email_details',
            content_css : "<?= DEVDIRNAMEAdmin; ?>assets/css/bootstrap.min.css,https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap,<?= DEVDIRNAMEAdmin; ?>assets/css/style.css",
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
    });
</script>

<?php $this->load->view('admin/include/footer')?>

