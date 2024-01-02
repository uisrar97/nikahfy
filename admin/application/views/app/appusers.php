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

<div class="right_col" role="main">
	<div class="">
		<div class="row">
			<img id="loader" src="<?php echo base_url('assets/images/loader.gif')?>">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2 class="main">App User List</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li>

								<!--     <button class="btn btn-round btn-info btn-block addcat"><i class="fa fa-plus"></i> Add New</button>-->
								<!-- <button class="btn btn-round btn-info btn-block download"><i class="fa fa-download"></i> Download</button> -->

							</li>

						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">

						<!--	<p>Add class <code>bulk_action</code> to table for bulk actions options on row select</p>-->

						<div class="table-responsive">
                            <label>Search Filters</label>
                            <table id="search" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
								<tfoot>
                                    <tr>
                                        <th>User Name</th>
                                        <th>Profile Name</th>
                                        <th>Gender</th>
                                        <th>Marital Status</th>
                                    </tr>
								</tfoot>
                            </table>
							<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
								<thead>
                                    <tr>
                                        <th>Profile Image</th>
                                        <th>User Name</th>
                                        <th>Profile Name</th>
                                        <th>Gender</th>
                                        <th>Marital Status</th>
                                        <th>Status</th>
                                        <th>Profile Completion in %</th>
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

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #2695B9; color: white">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Delete Record</h4>
			</div>
			<div class="modal-body">
				Are you sure To permanently Deleted Record?..
				<input type="hidden" class="catid">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-primary deleted">Delete</button>
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
            location.href=base_url+'admin/Dashboard/view/'+id;
        });
        
        $('#datatable-responsive').DataTable({
            /*     dom: 'Bfrtip',
				 buttons: [
					 'csv', 'excel', 'pdf', 'print'
				 ],*/
                 //paging: false,
            order: [],
            "scrollX": true,
            "ajax":{
                "url": base_url+"app/Appusers/get_appusers",
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
                    "data": "fullName"
                },
                {
                    "data": "pro_name"
                },
                {
                    "data": "pro_gender"
                },
                {
                    "data": "pro_marital_status"
                },
                {
                    "data": "status"
                },
                {
                    "data": "total",
                    className: "textalign"
                },

                {
                    "data": "btn",
                    className: "textalign"
                }
            ]
        });
        // Setup - add a text input to each footer cell
        $('#search tfoot th').each(function() {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Search ' + title + '" />');
        });

        // DataTable
        var table = $('#datatable-responsive').DataTable();

        // Apply the search
        table.columns().every(function() {
            var that = this.data();

            $('input', this.footer()).on('keyup change clear', function() {
                if (that.search() !== this.value) {
                    that
                        .search(this.value)
                        .draw();
                }
            });
        });
        $('body').on('click','.delete_cat',function () {

            var id=$(this).attr('id');
            $('.catid').val(id);
            $('.bs-example-modal-sm').modal('show');

        });


        $('body').on('click','.editcategory',function () {

            var id=$(this).attr('id');
            $.ajax({
                url:"<?php echo base_url().'cms/Subscriber/get_Subscriber_id/'?>",
                type:"POST",
                dataType:"json",
                data:{catid:id},
                success:function(res) {
                    if(res!="false"){

                        $('.editemail').val(res.sub_email);
                        $('#sub_id').val(res.sub_id);
                        $('.editcatmodal').modal('toggle');

                    }else{

                        new PNotify({
                            title: 'Delete',
                            text: 'No Records Found!',
                            type: 'error',
                            hide: true,
                            styling: 'bootstrap3'
                        });
                    }

                }
            });

        });

        $('body').on('click','.deleted',function (e) {
            var id= $('.catid').val();
            e.preventDefault();
            e.stopImmediatePropagation();
            $('.bs-example-modal-sm').modal('hide');
            $.ajax({
                url:"<?php echo base_url().'app/Appusers/app_user_del/'?>",
                type:"POST",
                data:{id:id},
                success:function(res) {
                    if(res!="false"){

                        new PNotify({
                            title: 'Delete',
                            text: 'Record Successfully Deleted!',
                            type: 'info',
                            hide: true,
                            styling: 'bootstrap3'
                        });
                        $('#datatable-responsive').DataTable().ajax.reload();
                    }else{

                        new PNotify({
                            title: 'Delete',
                            text: 'Record Not Deleted!',
                            type: 'error',
                            hide: true,
                            styling: 'bootstrap3'
                        });
                    }

                }
            });
        });
        /*=======================================Deactivate========================================== */
        $('body').on('click','.disapp',function (e) {
            var id= $(this).attr('id');
            e.preventDefault();
            e.stopImmediatePropagation();
           // $('.bs-example-modal-sm').modal('hide');
            $.ajax({
                url:"<?php echo base_url().'app/Appusers/Deactivate'?>",
                type:"POST",
                data:{id:id},
                success:function(res) {
                    if(res!="false"){

                        new PNotify({
                            title: 'Disapproved',
                            text: 'User Successfully Disapproved!',
                            type: 'info',
                            hide: true,
                            styling: 'bootstrap3'
                        });
                        $('#datatable-responsive').DataTable().ajax.reload();
                    }else{

                        new PNotify({
                            title: 'Error',
                            text: 'Something Went Wrong!',
                            type: 'error',
                            hide: true,
                            styling: 'bootstrap3'
                        });
                    }

                }
            });
        });

        $('body').on('click','.app',function (e) {
            var id= $(this).attr('id');
            e.preventDefault();
            e.stopImmediatePropagation();
            // $('.bs-example-modal-sm').modal('hide');
            $.ajax({
                url:"<?php echo base_url().'app/Appusers/Activate'?>",
                type:"POST",
                data:{id:id},
                success:function(res) {
                    if(res!="false"){

                        new PNotify({
                            title: 'Approved',
                            text: 'User Successfully Approved!',
                            type: 'info',
                            hide: true,
                            styling: 'bootstrap3',
							position:'bottom'
                        });
                        $('#datatable-responsive').DataTable().ajax.reload();
                    }else{

                        new PNotify({
                            title: 'Error',
                            text: 'Something Went Wrong!',
                            type: 'error',
                            hide: true,
                            styling: 'bootstrap3'
                        });
                    }

                }
            });
        });
        /*=======================================save categories form using ajax========================================== */



        $('#addcategory_form').on('submit',function(e) {
            var formURL=$(this).attr("action");
            var postData=new FormData(this);
            e.preventDefault();
            e.stopImmediatePropagation();
            $.ajax({
                url : formURL,
                type: "POST",
                data : postData,
                dataType:"json",
                mimeType:"multipart/form-data",
                contentType: false,
                cache: false,
                processData:false,
                async:true,
                success:function(res) {

                    if(res!=''){
                        new PNotify({
                            title: 'save',
                            text: 'Records Inserted Successfully',
                            type: 'info',
                            hide: true,
                            styling: 'bootstrap3'
                        });
                        $('#datatable-responsive').DataTable().ajax.reload();
                        $('#addcategory_form').trigger('reset');
                        $('.catmodal').modal('hide');

                    }else{
                        new PNotify({
                            title: 'save',
                            text: 'Records Not Inserted Successfully',
                            type: 'success',
                            hide: true,
                            styling: 'bootstrap3'
                        });
                        $('#addcategory_form').trigger('reset');
                    }

                }

            });

        });
        $('#Editcategory_form').on('submit',function(e) {
            var formURL=$(this).attr("action");
            var postData=new FormData(this);
            e.preventDefault();
            e.stopImmediatePropagation();
            $.ajax({
                url : formURL,
                type: "POST",
                data : postData,
                dataType:"json",
                mimeType:"multipart/form-data",
                contentType: false,
                cache: false,
                processData:false,
                success:function(res) {

                    if(res!=''){
                        new PNotify({
                            title: 'updated',
                            text: res,
                            type: 'info',
                            hide: true,
                            styling: 'bootstrap3'
                        });
                        $('#datatable-responsive').DataTable().ajax.reload();
                        $('#Editcategory_form').trigger('reset');
                        $('.editcatmodal').modal('hide');

                    }else{
                        new PNotify({
                            title: 'updated',
                            text: res,
                            type: 'success',
                            hide: true,
                            styling: 'bootstrap3'
                        });
                        $('#Editcategory_form').trigger('reset');
                    }

                }

            });

        });



    });



</script>

<?php $this->load->view('admin/include/footer')?>

