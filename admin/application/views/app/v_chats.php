<?php $this->load->view('admin/include/header')?>
<?php $this->load->view('admin/include/sidebar')?>

<!-- /top navigation -->

<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2 class="main">Latest Chats By User</h2>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
                        <div class="table-responsive">
	    				    <table id="datatable-sent" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
							    <thead>
								    <tr>
									    <th>Sender Name</th>
						  	    		<th>Receiver Name</th>
						   		    	<th>Last Message</th>
                                        <th>View Chat</th>
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

<?php $this->load->view('admin/include/footer')?>

<script type="text/javascript">
    base_url = '<?=base_url()?>';
    $(document).ready(function() 
	{
		<?php if(isset($id))
		{?>
			id='<?=$id?>';
		<?php } ?>
        $('body').on('click','.view',function () {
            var id= $(this).attr('id');
            location.href=base_url+'admin/Dashboard/vChats/'+id;
        });
		$('#datatable-sent').DataTable({
			retrieve: true,
    		paging: true,
			order: [],
			"scrollX": true,
			"ajax":{
				"url": base_url+"app/Chats/get_chats/"+id,
				"processing" : true,
				"serverside" : false,
				"dataType": "json",
				"deferRender": true,
				"type": "GET"
			},
			"columns": [
				{
					"data": "sender"
				},
				{
					"data": "recipient"
				},
				{
					"data": "message"
				},
                {
                    "data": "btn",
                    className: "textalign"
                }
			]
		});
    });
</script>