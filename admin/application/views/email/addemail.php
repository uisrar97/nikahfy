<?php $this->load->view('admin/include/header')?>
<?php $this->load->view('admin/include/sidebar')?>
<style>
	.textalign{
		text-align: center;
	}
</style>

<div class="right_col" role="main">
	<div class="">
		<div class="row">
			<img id="loader" src="<?php echo base_url('assets/images/loader.gif')?>">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2 class="main">Add Email</h2>
                        <div class="clearfix"></div>
					</div>
					<div class="x_content">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <form role="form" id="team_data" action="<?= base_url(); ?>" method="post" enctype="multipart/form-data">
                                <div class="clearfix"></div>
                                <div class="col-md-6">
                                    <label >Name</label>
                                    <input name="Name" class="form-control" placeholder="Name" required/>
                                    <br>
                                    <label >Contact #</label>
                                    <input name="contact_no" class="form-control" placeholder="Contact Number" required/>
                                </div>
                                <div class="col-md-6">
                                    <label >Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Email" required/>
                                    <br>
                                    <label>Team Type</label>
                                    <select name="t_type" class="form-control" required>
                                        <option value = "">Select An Option</option>
                                        <option value = "0">Marketing Team</option>
                                        <option value = "1">Development Team</option>
                                    </select>
                                    <br><br><br><br><br>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-12"><br></div>
                                <div class="col-md-12" style="text-align: center;">
                                    <input class="btn btn-primary" type="submit" value="Submit"/>
                                    <button class="btn btn-danger" id="cancel" onClick="history.back();">Cancel</button>
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

<!-- footer content -->
<script type="text/javascript">
    base_url = '<?=base_url()?>';
    
    $(document).ready(function() 
    {
        $('#team_data').on('submit',function(e) 
        {
            var formURL=$(this).attr("action");
            var postData=new FormData(this);
            e.preventDefault();
            e.stopImmediatePropagation();
            $.ajax(
            {
                url : "<?php echo base_url().'email/Email/insertNewEmail'?>",
                type: "POST",
                data : postData,
                dataType:"json",
                mimeType:"multipart/form-data",
                contentType: false,
                cache: false,
                processData:false,
                async:true,
                success:function(res) 
                {
                    if(res!='')
                    {
                        new PNotify(
                        {
                            title: 'Save',
                            text: 'Records Inserted Successfully',
                            type: 'success',
                            hide: true,
                            styling: 'bootstrap3'
                        });
                        $('#team_data').trigger('reset');
                        location.replace("<?= base_url()?>");
                    }
                    else
                    {
                        new PNotify(
                        {
                            title: 'Failure',
                            text: 'Records Insertion Failed',
                            type: 'failure',
                            hide: true,
                            styling: 'bootstrap3'
                        });
                    }
                    
                }
            });
        });
    });
</script>

<?php $this->load->view('admin/include/footer')?>