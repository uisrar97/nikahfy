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
						<h2 class="main">Add Admin Roles</h2>
					
                        
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                                <button class="btn btn-round btn-info btn-block" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Add New Role</button>
                            </li>

                        </ul>	<div class="clearfix"></div>
                    </div>
                    <div class="modal fade bs-example-modal-md newrole" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color: #2695B9; color: white">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Add New Role</h4>
                            </div>
                            <div class="modal-body">
                            <p><b>Role Title:</b></p>
                            <form id="addroles" method="post">
                                <input class="form-control" type="text" name="role_title" required/>
                            
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <input type="Submit" class="btn btn-default submit"/></form>
                            </div>
                        </div>
                    </div>
                    </div>
					<div class="x_content">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <form role="form" id="roles" action="<?= base_url(); ?>" method="post">
                                <div class="clearfix"></div>
                                <div class="col-md-12">
                                        <label style="font-size: 17px;">Admin Role Title</label>
                                        <br>
                                        <select name="role_title" class="form-control" onchange="myFunction(event)">
                                            <option value="Select An Option First">Select An Option</option>
                                            <?php
                                                foreach($admin as $val)
                                                {
                                                    $value = $val->role_title;
                                                    echo "<option value='$value'>$value</option>";
                                                }
                                            ?>
                                        </select>
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
                                </div>
                                <div class="col-md-12"><br></div>
                                <div class="col-md-12">
                                    <label style="font-size: 15px;">User Management</label><br>
                                    <div class="col-md-3">
                                        <input type="checkbox" name="checkbox[]" value="7"/>
                                        <label>App Users List</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="checkbox" name="checkbox[]" value="8"/>
                                        <label>Blocked Users List</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="checkbox" name="checkbox[]" value="9"/>
                                        <label>User Connections</label>
                                    </div>                                                
                                </div>
                                <div class="col-md-12"><br></div>
                                <div class="col-md-12">
                                    <label style="font-size: 15px;">Email</label><br>
                                    <div class="col-md-3">
                                        <input type="checkbox" name="checkbox[]" value="10"/>
                                        <label>New Email</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="checkbox" name="checkbox[]" value="11"/>
                                        <label>To Developer</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="checkbox" name="checkbox[]" value="12"/>
                                        <label>To Marketing</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="checkbox" name="checkbox[]" value="13"/>
                                        <label>To User</label>
                                    </div>
                                </div>
                                <div class="col-md-12"><br></div>
                                <div class="col-md-12">
                                    <label style="font-size: 15px;">Admin Users</label><br>
                                    <div class="col-md-3">
                                        <input type="checkbox" name="checkbox[]" value="14"/>
                                            <label>New Admin</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="checkbox" name="checkbox[]" value="15"/>
                                            <label>Admin List</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="checkbox" name="checkbox[]" value="16"/>
                                            <label>Add Admin Roles</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="checkbox" name="checkbox[]" value="17"/>
                                        <label>View Admin Roles</label>
                                    </div>
                                </div>
                                <div class="col-md-12"><br></div>
                                <div class="col-md-12" style="text-align: center;">
                                    <input class="btn btn-primary" type="submit" value="Submit" />
                                    <input class="btn btn-danger" type="submit" value="Cancel" />
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
                    location.reload();
                }
            });
        });

        $('#addroles').on('submit',function(e)
        {
            var formURL=$(this).attr("action");
            var postData=new FormData(this);
            e.preventDefault();
            e.stopImmediatePropagation();
            $.ajax(
            {
                url : "<?php echo base_url().'manageadmin/Adminroles/Add_role'?>",
                type: "POST",
                data : postData,
                dataType:"json",
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
                            text: 'Records Successfully Added',
                            type: 'info',
                            hide: true,
                            styling: 'bootstrap3'
                        });

                        location.reload();
                        $('#addroles').trigger('reset');
                        $('#roles').trigger('reset');
                    }
                    else
                    {
                        new PNotify(
                        {
                            title: 'Failed',
                            text: 'Records Addition Failed',
                            type: 'Failure',
                            hide: true,
                            styling: 'bootstrap3'
                        });
                        
                    }
                }
            });
        });
    });
    function myFunction(e) 
    {
        document.getElementById("role_title").value = e.target.value
    }
    
</script>

<?php $this->load->view('admin/include/footer')?>

