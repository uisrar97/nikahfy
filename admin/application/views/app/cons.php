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
						<h2 class="main">Profile View</h2>

						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="col-md-2 col-sm-2 col-xs-12 profile_left">
							<div class="profile_img">
								<div id="crop-avatar">
									<!-- Current avatar -->
									<?php if(!empty($profiles->pro_image)) {?>
										<img style="width: 160px; height: 160px" class="img-responsive avatar-view" src="http://nikahfy.com/web-services/assets/profileimage/<?=$profiles->pro_image?>" alt="Avatar" title="Change the avatar">
									<?php }else{?>
										<img style="width: 160px; height: 160px" class="img-responsive avatar-view" src="http://nikahfy.com/web-services/assets/profileimage/default.png'?>" alt="Avatar" title="Change the avatar">
									<?php }?>
								</div>
							</div>
							<h3><?= $profiles->pro_name?></h3>
							<br>
							<ul class="list-unstyled user_data">
								<li class="m-top-xs">Total Connections: <?= $t_connections?></li>
								<li class="m-top-xs">Total Confirmed Requests: <?= $t_confirmed?></li>
								<li class="m-top-xs">Total Pending Requests: <?= $t_pending?></li>
								<li class="m-top-xs">Total Rejected Requests: <?= $t_rejected?></li>
							</ul>
							<!-- end of skills -->

						</div>
						<div class="col-md-10 col-sm-10 col-xs-12">
							<div class="" role="tabpanel" data-example-id="togglable-tabs">
								<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
									<li role="presentation" class="active"><a href="#tab_content1" id="sent-tab" role="tab" data-toggle="tab" aria-expanded="true">Friend Requests Sent</a>
									</li>
									<li role="presentation" class=""><a href="#tab_content2" role="tab" id="received-tab" data-toggle="tab" aria-expanded="false">Friend Requests Received</a>
									</li>
								</ul>
									</div>
								<div id="myTabContent" class="tab-content">
									<div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="sent-tab">
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="x_content">
												<div class="table-responsive">
													<table id="datatable-sent" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
														<thead>
															<tr>
																<th>Profile Image</th>
																<th>Profile Name</th>
																<th>Status</th>
															</tr>
														</thead>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div id="myTabContent" class="tab-content">
									<div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="received-tab">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="x_content">
											<div class="table-responsive">
												<table id="datatable-received" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
													<thead>
														<tr>
															<th>Profile Image</th>
															<th>Profile Name</th>
															<th>Status</th>
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
		$("#sent-tab").click(function(){
			$('#tab_content1').show();
			$('#tab_content2').hide();
		});
		$('#datatable-sent').DataTable({
			retrieve: true,
    		paging: true,
			order: [],
			"scrollX": true,
			"ajax":{
				"url": base_url+"app/Usercons/get_sentcons/"+id,
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
					"data": "to_name"
				},
				{
					"data": "fr_status"
				}
			]
		});
		$("#received-tab").click(function(){
			$('#tab_content1').hide();
			$('#tab_content2').show();
			$('#datatable-received').DataTable({
				retrieve: true,
    			paging: true,
				order: [],
				"scrollX": true,
				"ajax":{
					"url": base_url+"app/Usercons/get_receivedcons/"+id,
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
						"data": "from_name"
					},
					{
						"data": "fr_status"
					}
				]
			});
		});
    });
</script>