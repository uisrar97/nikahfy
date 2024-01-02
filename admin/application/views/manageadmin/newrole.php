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
						<h2 class="main">Add New Roles</h2>
					    <div class="clearfix"></div>
                    </div>
                    
					<div class="x_content">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <form role="form" id="roles" action="<?= base_url() ?>" method="post">
                                <div class="clearfix"></div>
                                <div class="col-md-12">
                                    <label style="font-size: 17px;">Admin Role Title</label>
                                    <br>
                                    <input name="role_title" type="text" placeholder="Enter New Role Title" class="form-control"/>
                                    <br>
                                </div>
                                <div class="col-md-12">
                                    <label style="font-size: 17px;">Admin Roles</label><br><br>
                                </div>
                                <div class="col-md-12">
                                    <label style="font-size: 15px;">CMS</label><br/>
                                    <div class="col-md-3">
                                        <input type="checkbox" name="checkbox[]" value="1"/>
                                        <label>Pages</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="checkbox" name="checkbox[]" value="2"/>
                                        <label>Sections</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="checkbox" name="checkbox[]" value="3"/>
                                        <label>SEO</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="checkbox" name="checkbox[]" value="4"/>
                                        <label>Settings</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="checkbox" name="checkbox[]" value="5"/>
                                        <label>Our Services</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="checkbox" name="checkbox[]" value="6"/>
                                        <label>Support Messages</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="checkbox" name="checkbox[]" value="7"/>
                                        <label>FAQs</label>
                                    </div>
                                </div>
                                <div class="col-md-12"><br></div>
                                <div class="col-md-12">
                                    <label style="font-size: 15px;">User Management</label><br>
                                    <div class="col-md-3">
                                        <input type="checkbox" name="checkbox[]" value="8"/>
                                        <label>App Users List</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="checkbox" name="checkbox[]" value="9"/>
                                        <label>Blocked Users List</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="checkbox" name="checkbox[]" value="10"/>
                                        <label>User Connections</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="checkbox" name="checkbox[]" value="11"/>
                                        <label>Incomplete Profiles</label>
                                    </div>                                                
                                </div>
                                <div class="col-md-12"><br></div>
                                <div class="col-md-12">
                                    <label style="font-size: 15px;">Email</label><br>
                                    <div class="col-md-3">
                                        <input type="checkbox" name="checkbox[]" value="12"/>
                                        <label>New Email</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="checkbox" name="checkbox[]" value="13"/>
                                        <label>To Developer</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="checkbox" name="checkbox[]" value="14"/>
                                        <label>To Marketing</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="checkbox" name="checkbox[]" value="15"/>
                                        <label>To User</label>
                                    </div>
                                </div>
                                <div class="col-md-12"><br></div>
                                <div class="col-md-12">
                                    <label style="font-size: 15px;">Admin Users</label><br>
                                    <div class="col-md-3">
                                        <input type="checkbox" name="checkbox[]" value="16"/>
                                            <label>New Admin</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="checkbox" name="checkbox[]" value="17"/>
                                            <label>Manage Roles</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="checkbox" name="checkbox[]" value="18"/>
                                            <label>Admin List</label>
                                    </div>
                                </div>
                                <div class="col-md-12"><br></div>
                                <div class="col-md-12" style="text-align: center;">
                                    <input class="btn btn-primary" type="submit" value="Submit" />
                                    <button class="btn btn-danger" id="cancel">Cancel</button>
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
        $('#roles').on('submit',function(e)
        {
            var formURL=$(this).attr("action");
            var postData=new FormData(this);
            e.preventDefault();
            e.stopImmediatePropagation();
            $.ajax(
            {
                url : "<?php echo base_url().'manageadmin/RolesList/Addrole'?>",
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
                    if(res=='yes')
                    {
                        new PNotify(
                        {
                            title: 'Save',
                            text: 'Records Successfully Updated',
                            type: 'info',
                            hide: true,
                            styling: 'bootstrap3'
                        });
                    }
                    else
                    {
                        new PNotify(
                        {
                            title: 'Failed',
                            text: 'Records Updation Failed',
                            type: 'failure',
                            hide: true,
                            styling: 'bootstrap3'
                        });
                    }
                    $('#roles').trigger('reset');
                    location.replace("<?= base_url().'manageadmin/RolesList';?>");
                }
            });
        });
        $('#cancel').on('click',function(){
            location.replace("<?= base_url().'manageadmin/RolesList';?>");
        });
    });
    
</script>

<?php $this->load->view('admin/include/footer')?>

