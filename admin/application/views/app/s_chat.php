<?php $this->load->view('admin/include/header')?>
<?php $this->load->view('admin/include/sidebar')?>

<!-- /top navigation -->

<!-- User Message Modal Start-->
<div class="modal fade bs-example-modal-md v" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #2695B9; color: white">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Message</h4>
            </div>
            <div class="modal-body">
               <p><b>Message:</b></p>
               <p id='msg'></p>
               <br>
               <p><b>Date/Time:</b></p>
               <p id='time'></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- User Message Modal End-->

<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
                        <h2 class="main">Chats View</h2>

						<div class="clearfix"></div>
					</div>
					<div class="x_content">
                        <div class="table-responsive">
							<table id="datatable-sent" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>Sender Name</th>
						    			<th>Receiver Name</th>
										<th>Message</th>
                                        <th>Message Date/Time</th>
                                        <th>View Message</th>
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
        $('#datatable-sent').DataTable({
			retrieve: true,
    		paging: true,
			order: [],
			"scrollX": true,
			"ajax":{
				"url": base_url+"app/Chats/get_sentchats/"+id,
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
                    "data": "message_datetime"
                },
				{
					"data": "btn",
					className: "textalign"
				}
			]
		});
		$('body').on('click','.viewm',function () 
        {
            var id=$(this).attr('id');
            $.ajax({
                url: "<?php echo base_url().'app/Chats/get_full_msg/'?>",
                type:"POST",
                dataType:"json",
                data:{chat_id:id},
                success:function(res) 
                {
                    if(res!="false")
                    {
                        $('#msg').text(res.message);
                        $('#time').text(res.message_datetime);
                        $('.v').modal(
                        {
                            show:true,
                            backdrop:false
                        });
                    }
                    else
                    {
                        new PNotify({
                            title: 'No Message Found',
                            text: 'No Subscriber Message Exists.',
                            type: 'error',
                            hide: true,
                            styling: 'bootstrap3'
                        });
                    }
                }
            });
        });
    });
</script>