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
                        <h2 class="main">Admin Roles List</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                                <a class="btn btn-round btn-info btn-block" href="<?php echo base_url('add-new-role');?>"><i class="fa fa-plus" style="color:black;"> Add New Role</i></a>
                            </li>
                        </ul>	
						<div class="clearfix"></div>
                    </div>
					<div class="x_content">
                        <div class="table-responsive">
							<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
								<thead>
                                    <tr>
                                        <th>Role Title</th>
                                        <th>Action</th>
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

<!-- footer content -->
<script type="text/javascript">
    base_url = '<?=base_url()?>';
    $(document).ready(function() {
        $('body').on('click','.view',function () {
            var id= $(this).attr('id');
            location.href=base_url+'admin/Dashboard/viewAdmin/'+id;
        });
        $('#datatable-responsive').DataTable({
            order: [],
            "scrollX": true,
            "ajax":{
                "url": base_url+"manageadmin/rolesList/get_adminroles",
                "processing" : true,
                "serverside" : false,
                "dataType": "json",
                "deferRender": true,
                "type": "GET"
            },
            "columns": [
                {
                    "data": "role_title"
                },
                {
                    "data": "btn",
                    className: "textalign"
                }
            ]

        });
    });



</script>

<?php $this->load->view('admin/include/footer')?>

