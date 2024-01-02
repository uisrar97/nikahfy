<?php $this->load->view('admin/include/header') ?>
<?php $this->load->view('admin/include/sidebar') ?>
<style>
	#overlay {

		position: absolute;
		width: 100%;
		margin-top: 59px;
		top: 0;
		left: 0;
		background-color: #292424d9;
		z-index: 1;
		display: block !important;
		height: 100%;
		height: -webkit-calc(100% - 59px);
		height: -moz-calc(100% - 59px);
		height: calc(100% - 59px);
	}

	#text {
		position: absolute;
		top: 50%;
		left: 50%;
		font-size: 50px;
		color: white;
		transform: translate(-50%, -50%);
		-ms-transform: translate(-50%, -50%);
	}
	.percent{
		line-height: 52px !important;
		z-index: 2;
		font-size: 12px !important;
		font-weight: bold;
	}
	.chart canvas {
		position: absolute;
		top: 0;
		left: 0;
		width: 50px !important;
	}
	td span {
	line-height: 52px;
	}
	.chart{

		position: relative;
		width: 110px;
		height: 20px !important;
		margin-top: 5px;
		margin-bottom: 5px;
		text-align: left !important;
		padding-left: 15px !important;
	}
	.test img{
		margin: 10px 0px 0px 15px;

	}	.test #tt{
		margin: 10px 0px 0px 15px;

	}
	.textalign{
	text-align:center;
	}

</style>
<!-- page content -->
<div class="right_col" role="main">
	<!-- top tiles -->
	<div class="row tile_count">

		<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
			 <span class="count_top"><i class="fa fa-clock-o"></i> Total Users</span>
			 <div class="count"><?= $totalusers?></div>
			 <!--<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>-->
		</div>
		<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
			  <span class="count_top"><i class="fa fa-user"></i> Total Males</span>
			  <div class="count"><?= $totalmales?></div>
			  <!--<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>-->
		</div>
		<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
		 <span class="count_top"><i class="fa fa-user"></i> Total Single Males</span>
			 <div class="count"><?= $s_males?></div>
			 <!--<span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span>-->
		</div>
		<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
			 <span class="count_top"><i class="fa fa-user"></i> Total Females</span>
			   <div class="count"><?= $totalfemales?></div>
			   <!--<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>-->
		</div>
		<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
		   <span class="count_top"><i class="fa fa-user"></i> Total Single Females</span>
				 <div class="count"><?= $s_females?></div>
				 <!--<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>-->
		</div>
		<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
		   <span class="count_top"><i class="fa fa-user"></i> Total Connections Established</span>
				 <div class="count"><?= $t_con?></div>
				 <!--<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>-->
		</div>
	</div>
	<div class="row tile_count">
		<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
			<span class="count_top"><i class="fa fa-user"></i> Total Complete Profiles</span>
			<div class="count"><?= $t_com?></div>
			<!--<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>-->
		</div>
		<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
		   	<span class="count_top"><i class="fa fa-user"></i> Total Incomplete Profiles</span>
			<div class="count"><?= $t_incom?></div>
			<a style="color: (internal value); text-decoration: underline;" href="<?php echo base_url().'app/Incomplete';?>">View Incomplete Profiles</a>
			<!--<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>-->
		</div>
	</div>
	<!-- /top tiles -->

	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">

		</div>

	</div>


   <div class="row">


		  <div class="col-md-6 col-sm-6 col-xs-12">
			  <div class="x_panel tile fixed_height_320">
				  <div class="x_title">
					  <h2>App Versions</h2>
					  <!--<ul class="nav navbar-right panel_toolbox">
						  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						  </li>
						  <li class="dropdown">
							  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
							  <ul class="dropdown-menu" role="menu">
								  <li><a href="#">Settings 1</a>
								  </li>
								  <li><a href="#">Settings 2</a>
								  </li>
							  </ul>
						  </li>
						  <li><a class="close-link"><i class="fa fa-close"></i></a>
						  </li>
					  </ul>-->
					  <div class="clearfix"></div>
				  </div>
				  <div class="x_content">
					  <h4>App Usage across versions</h4>
					  <div class="widget_summary">
						  <div class="w_left w_25">
							  <span>0.1.5.2</span>
						  </div>
						  <div class="w_center w_55">
							  <div class="progress">
								  <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 66%;">
									  <span class="sr-only">60% Complete</span>
								  </div>
							  </div>
						  </div>
						  <div class="w_right w_20">
							  <span>123k</span>
						  </div>
						  <div class="clearfix"></div>
					  </div>

					  <div class="widget_summary">
						  <div class="w_left w_25">
							  <span>0.1.5.3</span>
						  </div>
						  <div class="w_center w_55">
							  <div class="progress">
								  <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 45%;">
									  <span class="sr-only">60% Complete</span>
								  </div>
							  </div>
						  </div>
						  <div class="w_right w_20">
							  <span>53k</span>
						  </div>
						  <div class="clearfix"></div>
					  </div>
					  <div class="widget_summary">
						  <div class="w_left w_25">
							  <span>0.1.5.4</span>
						  </div>
						  <div class="w_center w_55">
							  <div class="progress">
								  <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
									  <span class="sr-only">60% Complete</span>
								  </div>
							  </div>
						  </div>
						  <div class="w_right w_20">
							  <span>23k</span>
						  </div>
						  <div class="clearfix"></div>
					  </div>
					  <div class="widget_summary">
						  <div class="w_left w_25">
							  <span>0.1.5.5</span>
						  </div>
						  <div class="w_center w_55">
							  <div class="progress">
								  <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 5%;">
									  <span class="sr-only">60% Complete</span>
								  </div>
							  </div>
						  </div>
						  <div class="w_right w_20">
							  <span>3k</span>
						  </div>
						  <div class="clearfix"></div>
					  </div>
					  <div class="widget_summary">
						  <div class="w_left w_25">
							  <span>0.1.5.6</span>
						  </div>
						  <div class="w_center w_55">
							  <div class="progress">
								  <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 2%;">
									  <span class="sr-only">60% Complete</span>
								  </div>
							  </div>
						  </div>
						  <div class="w_right w_20">
							  <span>1k</span>
						  </div>
						  <div class="clearfix"></div>
					  </div>

				  </div>
			  </div>
		  </div>

		  <div class="col-md-6 col-sm-6 col-xs-12">
			  <div class="x_panel tile fixed_height_320 overflow_hidden">
				  <div class="x_title">
					  <h2>User Sign Up Updates</h2>
					  <div class="clearfix"></div>
				  </div>
				  <div class="x_content">
					  <table class="" style="width:100%">
						  <!--<tr>
							  <th style="width:37%;">
								  <p>Top 5</p>
							  </th>
							  <th>
								  <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
									  <p class="">Device</p>
								  </div>
								  <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
									  <p class="">Progress</p>
								  </div>
							  </th>
						  </tr>-->
						  <tr>
							  <td>
								  <canvas class="canvasDoughnut" height="200" width="200" style="margin: 15px 10px 10px 0"></canvas>
							  </td>
							  <td>
								  <table class="tile_info">
									  <tr>
										  <td>
											  <p><i class="fa fa-square blue"></i>Daily: <?= $daily->d_count?></p>
										  </td>
									  </tr>
									  <tr>
										  <td>
											  <p><i class="fa fa-square green"></i>Weekly: <?= $weekly->w_count?></p>
										  </td>
									  </tr>
									  <tr>
										  <td>
											  <p><i class="fa fa-square red"></i>Monthly: <?= $monthly->m_count?></p>
										  </td>
									  </tr>
								  </table>
							  </td>
						  </tr>
					  </table>
				  </div>
			  </div>
		  </div>


		    <!--<div class="col-md-4 col-sm-4 col-xs-12">
			  <div class="x_panel tile fixed_height_320">
				  <div class="x_title">
					  <h2>Quick Settings</h2>
					  <ul class="nav navbar-right panel_toolbox">
						  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						  </li>
						  <li class="dropdown">
							  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
							  <ul class="dropdown-menu" role="menu">
								  <li><a href="#">Settings 1</a>
								  </li>
								  <li><a href="#">Settings 2</a>
								  </li>
							  </ul>
						  </li>
						  <li><a class="close-link"><i class="fa fa-close"></i></a>
						  </li>
					  </ul>
					  <div class="clearfix"></div>
				  </div>
					  <div class="x_content">
					  <div class="dashboard-widget-content">
						  <ul class="quick-list">
							  <li><i class="fa fa-calendar-o"></i><a href="#">Settings</a>
							  </li>
							  <li><i class="fa fa-bars"></i><a href="#">Subscription</a>
							  </li>
							  <li><i class="fa fa-bar-chart"></i><a href="#">Auto Renewal</a> </li>
							  <li><i class="fa fa-line-chart"></i><a href="#">Achievements</a>
							  </li>
							  <li><i class="fa fa-bar-chart"></i><a href="#">Auto Renewal</a> </li>
							  <li><i class="fa fa-line-chart"></i><a href="#">Achievements</a>
							  </li>
							  <li><i class="fa fa-area-chart"></i><a href="#">Logout</a>
							  </li>
						  </ul>

					<div class="sidebar-widget">
							  <h4>Profile Completion</h4>
							  <canvas width="150" height="80" id="chart_gauge_01" class="" style="width: 160px; height: 100px;"></canvas>
							  <div class="goal-wrapper">
								  <span id="gauge-text" class="gauge-value pull-left">0</span>
								  <span class="gauge-value pull-left">%</span>
								  <span id="goal-text" class="goal-value pull-right">100%</span>
							  </div>
						  </div>
					  </div>
				  </div>
			  </div>
		  </div>-->

	  </div>


</div>


<!-- /page content -->
<!--<script src="https://code.jquery.com/jquery-2.0.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="<?/*= base_url() */?>assets/jquery.easypiechart.min.js"></script>-->
<script>
    base_url = '<?=base_url()?>';
 /*   $(function () {
        $('.chart').easyPieChart({
            easing: 'easeOutBounce',
            onStep: function (from, to, percent) {
                $(this.el).find('.percent').text(Math.round(percent));
            }
        });
        var chart = window.chart = $('.chart').data('easyPieChart');
        $('.js_update').on('click', function () {
            chart.update(Math.random() * 200 - 100);
        });


    });
*/

    $(document).ready(function() {
		init_chart_doughnut(<?=$monthly->m_count?>, <?=$weekly->w_count?>, <?=$daily->d_count?>);
        $('body').on('click','.view',function () {
            var id= $(this).attr('id');
            location.href=base_url+'admin/Dashboard/view/'+id;
        });
        $('#datatable-responsive').DataTable({
       /*     dom: 'Bfrtip',
            buttons: [
                'csv', 'excel', 'pdf', 'print'
            ],*/
            order: [],
            "scrollX": true,
            "ajax":{
                "url": base_url+"admin/Dashboard/get_profiles",
                "processing" : true,
                "serverside" : false,
                "dataType": "json",
                "deferRender": true,
                "type": "GET"
            },
            /*      "fnRowCallback": function(nRow, aData, iDisplayIndex) {
                      $("td:eq(2)", nRow).css('color', '#eb0000');


                  },*/
            "columns": [
                {
                    "data": "fullName"

                },
                {
                    "data": "pro_image"
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

        $('body').on('click','.delete_pro',function () {

            var id=$(this).attr('id');
            $('.catid').val(id);
            $('.bs-example-modal-sm').modal('show');

        });



        $('body').on('click','.deleted',function (e) {
            var id= $('.catid').val();
            e.preventDefault();
            e.stopImmediatePropagation();
            $('.bs-example-modal-sm').modal('hide');
            $.ajax({
                url:"<?php echo base_url().'admin/Dashboard/app_user_del/'?>",
                type:"POST",
                data:{id:id},
                success:function(res) {
                    if(res!="false"){

                        new PNotify({
                            title: 'Delete',
                            text: 'Category Successfully Deleted!',
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




    });
</script>
<!-- footer content -->
<?php $this->load->view('admin/include/footer') ?>



