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
						<h2 class="main">Admin Role Privileges</h2>
					    <div class="clearfix"></div>
                    </div>
					<div class="x_content">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <form role="form" id="roles" action="<?= base_url(); ?>" method="post">
                                <div class="clearfix"></div>
                                <div class="col-md-12">
                                        <label style="font-size: 15px;">Admin Role Title</label>
                                        <br>
                                        <input type="text" class="form-control" name="role_title" value="<?php echo $role_title?>"/>
                                        <input name="id" value="<?php echo $id?>" hidden/>
                                        <br>
                                </div>
                                <div class="col-md-12">
                                    <label style="font-size: 15px;">Admin Roles</label><br><br>
                                </div>
                                <div class="col-md-12">
                                    <label style="font-size: 15px;">CMS</label><br/>
                                    <div class="col-md-3">
                                        <!--  -->
                                        <input type="checkbox" name="checkbox[]" value="1"<?php if(in_array("1", $permissions)) echo "checked = 'checked'"; ?>/>
                                        <p style="display:inline; font-size: 14px;">Pages</p>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="checkbox" name="checkbox[]" value="2"<?php if(in_array("2", $permissions)) echo "checked = 'checked'"; ?>/>
                                        <p style="display:inline; font-size: 14px;">Sections</p>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="checkbox" name="checkbox[]" value="3"<?php if(in_array("3", $permissions)) echo "checked = 'checked'"; ?>/>
                                        <p style="display:inline; font-size: 14px;">SEO</p>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="checkbox" name="checkbox[]" value="4"<?php if(in_array("4", $permissions)) echo "checked = 'checked'"; ?>/>
                                        <p style="display:inline; font-size: 14px;">Settings</p>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="checkbox" name="checkbox[]" value="5"<?php if(in_array("5", $permissions)) echo "checked = 'checked'"; ?>/>
                                        <p style="display:inline; font-size: 14px;">Our Services</p>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="checkbox" name="checkbox[]" value="6"<?php if(in_array("6", $permissions)) echo "checked = 'checked'"; ?>/>
                                        <p style="display:inline; font-size: 14px;">Support Messages</p>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="checkbox" name="checkbox[]" value="7"<?php if(in_array("7", $permissions)) echo "checked = 'checked'"; ?>/>
                                        <p style="display:inline; font-size: 14px;">FAQs</p>
                                    </div>
                                </div>
                                <div class="col-md-12"><br></div>
                                <div class="col-md-12">
                                    <label style="font-size: 15px;">User Management</label><br>
                                    <div class="col-md-3">
                                        <input type="checkbox" name="checkbox[]" value="8"<?php if(in_array("8", $permissions)) echo "checked = 'checked'"; ?>/>
                                        <p style="display:inline; font-size: 14px;">App Users List</p>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="checkbox" name="checkbox[]" value="9"<?php if(in_array("9", $permissions)) echo "checked = 'checked'"; ?>/>
                                        <p style="display:inline; font-size: 14px;">Blocked Users List</p>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="checkbox" name="checkbox[]" value="10"<?php if(in_array("10", $permissions)) echo "checked = 'checked'"; ?>/>
                                        <p style="display:inline; font-size: 14px;">User Connections</p>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="checkbox" name="checkbox[]" value="11"<?php if(in_array("11", $permissions)) echo "checked = 'checked'"; ?>/>
                                        <p style="display:inline; font-size: 14px;">Incomplete Profiles</p>
                                    </div>                                                
                                </div>
                                <div class="col-md-12"><br></div>
                                <div class="col-md-12">
                                    <label style="font-size: 15px;">Email</label><br>
                                    <div class="col-md-3">
                                        <input type="checkbox" name="checkbox[]" value="12"<?php if(in_array("12", $permissions)) echo "checked = 'checked'"; ?>/>
                                        <p style="display:inline; font-size: 14px;">New Email</p>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="checkbox" name="checkbox[]" value="13"<?php if(in_array("13", $permissions)) echo "checked = 'checked'"; ?>/>
                                        <p style="display:inline; font-size: 14px;">To Developer</p>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="checkbox" name="checkbox[]" value="14"<?php if(in_array("14", $permissions)) echo "checked = 'checked'"; ?>/>
                                        <p style="display:inline; font-size: 14px;">To Marketing</p>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="checkbox" name="checkbox[]" value="15"<?php if(in_array("15", $permissions)) echo "checked = 'checked'"; ?>/>
                                        <p style="display:inline; font-size: 14px;">To User</p>
                                    </div>
                                </div>
                                <div class="col-md-12"><br></div>
                                <div class="col-md-12">
                                    <label style="font-size: 15px;">Admin Users</label><br>
                                    <div class="col-md-3">
                                        <input type="checkbox" name="checkbox[]" value="16"<?php if(in_array("16", $permissions)) echo "checked = 'checked'"; ?>/>
                                        <p style="display:inline; font-size: 14px;">New Admin</p>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="checkbox" name="checkbox[]" value="17"<?php if(in_array("17", $permissions)) echo "checked = 'checked'"; ?>/>
                                        <p style="display:inline; font-size: 14px;">Manage Roles</p>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="checkbox" name="checkbox[]" value="18"<?php if(in_array("18", $permissions)) echo "checked = 'checked'"; ?>/>
                                        <p style="display:inline; font-size: 14px;">Admin List</p>
                                    </div>
                                </div>
                                <div class="col-md-12"><br></div>
                                <div class="col-md-12" style="text-align: center;">
                                    <input class="btn btn-primary" type="submit" value="Submit" />
                                    <button class="btn btn-danger" onClick="goBack()" id="cancel">Cancel</button>
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
                url : "<?php echo base_url().'manageadmin/Adminroles/Update'?>",
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
    });
    function goBack()
    {
        location.replace("<?= base_url().'manageadmin/RolesList';?>");
    }
    
</script>

<?php $this->load->view('admin/include/footer')?>