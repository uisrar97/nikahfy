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
						<h2 class="main">Add Admin Users</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                                <a class="btn btn-round btn-info btn-block" href="<?php echo base_url('add-new-role');?>"><i class="fa fa-plus" style="color:black;"> Add New Role</i></a>
                            </li>
                        </ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <form role="form" id="admin_data" action="<?= base_url(); ?>" method="post" enctype="multipart/form-data">
                                <div class="clearfix"></div>
                                <div class="col-md-6">
                                    <label >Name</label>
                                    <input name="name" class="form-control" placeholder="Name" required/>
                                    <br>
                                    <label >Email</label>
                                    <input type="email" name="email_address" class="form-control" placeholder="Email" required/>
                                    <br>
                                    <label>About</label>
                                    <textarea name="about" class="form-control" placeholder="About" required> </textarea>
                                    <br>
                                    <label >Profile Image</label>
                                    <input type="file" id="profileimage" name="profile_image" class="form-control" accept="image/jpg, image/jpeg, image/png" required/>                                    
                                </div>
                                <div class="col-md-6">
                                    <label >User Name</label>
                                    <input name="username" class="form-control" placeholder="User Name" required/>
                                    <br>
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password" required/>
                                    <br>
                                    <label>Admin Role</label>
                                    <select name="admin_role_id" class="form-control">
                                        <option value = "">Select An Option</option>
                                        <?php
                                            foreach($roles as $val)
                                            {
                                                $value = $val->role_title;
                                                echo "<option value='$val->id'>$value</option>";
                                            }
                                        ?>
                                    </select>
                                    <br><br>
                                    <label>Profile Image Preview</label>
                                    <br>
                                    <img style="width: 100px; height: 100px" id="image" src="" alt="Upload An Image">
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-12"><br></div>
                                <div class="col-md-12" style="text-align: center;">
                                    <input class="btn btn-primary" type="submit" value="Submit" />
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
        $('#admin_data').on('submit',function(e) 
        {
            var formURL=$(this).attr("action");
            var postData=new FormData(this);
            e.preventDefault();
            e.stopImmediatePropagation();
            $.ajax(
            {
                url : "<?php echo base_url().'manageadmin/Newadmin/Insert'?>",
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
                    $('#admin_data').trigger('reset');
                    location.reload();
                }
            });
        });
        $("#profileimage").change(function ()
        {
            readURL(this);
        });
    });
    function readURL(input) 
    {
        if (input.files && input.files[0]) 
        {
            var reader = new FileReader();
            
            reader.onload = function (e) 
            {
                $('#image').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<?php $this->load->view('admin/include/footer')?>