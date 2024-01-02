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
						<div class="col-md-3 col-sm-3 col-xs-12 profile_left">
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

							<ul class="list-unstyled user_data">
								<?php if(!empty($profiles->pro_city)){?>
								<li><i class="fa fa-map-marker user-profile-icon"></i> <?= $profiles->pro_city?>, <?= $profiles->pro_residence_country?>
								</li>
								<?php }?>
								<?php if(!empty($profiles->pro_profession)){?>
								<li>
									<i class="fa fa-briefcase user-profile-icon"></i> <?= $profiles->pro_profession?>
								</li>
								<?php }?>
								<?php if(!empty($profiles->pro_contact_person_email)){?>
								<li class="m-top-xs">
									<i class="fa fa-external-link user-profile-icon"></i>
									<a href="mailto:<?= $profiles->pro_contact_person_email?>" target="_blank"><?= $profiles->pro_contact_person_email?></a>
								</li>
								<?php }?>
							</ul>

							<!--<a class="btn btn-round btn-dark btn-sm"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>-->
							<!--	<br />


								<h4>Profile Completion</h4>-->
							<!--<ul class="list-unstyled user_data">
								<li>
									<p>Basic Info</p>
									<div class="progress progress_sm">
										<div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
									</div>
								</li>
								<li>
									<p>Religion</p>
									<div class="progress progress_sm">
										<div class="progress-bar bg-green" role="progressbar" data-transitiongoal="70"></div>
									</div>
								</li>
								<li>
									<p>Education</p>
									<div class="progress progress_sm">
										<div class="progress-bar bg-green" role="progressbar" data-transitiongoal="30"></div>
									</div>
								</li>
								<li>
									<p>Family</p>
									<div class="progress progress_sm">
										<div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
									</div>
								</li>
								<li>
									<p>About</p>
									<div class="progress progress_sm">
										<div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
									</div>
								</li>
							</ul>-->
							<!-- end of skills -->
							<div class="sidebar-widget">
							  <h4>Profile Completion</h4>
							  <canvas width="150" height="80" id="chart_gauge_01" class=""></canvas>
							  <div class="goal-wrapper">
								  <span id="gauge-text" class="gauge-value pull-left"><?= $profiles->total?></span>
								  <span class="gauge-value pull-left">%</span>
								  <span id="goal-text" class="goal-value pull-right">100%</span>
							  </div>
						  </div>
						</div>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<!--<div class="profile_title">
								 <div class="col-md-6">
									 <h2>User Activity Report</h2>
								 </div>
								 <div class="col-md-6">
									 <div id="reportrange" class="pull-right" style="margin-top: 5px; background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #E6E9ED">
										 <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
										 <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
									 </div>
								 </div>
							 </div>-->
							<!-- start of user-activity-graph -->
							<!--<div id="graph_bar" style="width:100%; height:280px;"></div>-->
							<!-- end of user-activity-graph -->

							<div class="" role="tabpanel" data-example-id="togglable-tabs">
								<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
									<li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Basic Info</a>
									</li>
									<li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Religion</a>
									</li>
									<li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Education</a>
									</li>
									<li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab3" data-toggle="tab" aria-expanded="false">Family</a>
									</li>
									<li role="presentation" class=""><a href="#tab_content5" role="tab" id="profile-tab4" data-toggle="tab" aria-expanded="false">About</a>
									</li>
								</ul>
								<div id="myTabContent" class="tab-content">
									<div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

										<!-- start recent activity -->
										<table class="data table table-striped no-margin">
											<!--		<thead>
													<tr>
														<th>#</th>
														<th>Project Name</th>
														<th>Client Company</th>
														<th class="hidden-phone">Hours Spent</th>
														<th>Contribution</th>
													</tr>
													</thead>-->
											<tbody>
											<tr>
												<td>Profile Name:</td>
												<td><?= $profiles->pro_name?></td>
												<td>Gender:</td>
												<td><?= $profiles->pro_gender?></td>
												<td>Relation:</td>
												<td><?= $profiles->pro_relation?></td>


											</tr>
											<tr>
												<td>Date Of Birth:</td>
												<td><?= (!empty($profiles->pro_dob))?$profiles->pro_dob : 'N/A'?></td>
												<td>Height:</td>
												<td><?= (!empty($profiles->pro_height))?$profiles->pro_height : 'N/A'?></td>
												<td>Marital Status:</td>
												<td><?= (!empty($profiles->pro_marital_status)) ? $profiles->pro_marital_status : 'N/A';?></td>


											</tr>
											<tr>
												<td>Nationality Type:</td>
												<td><?= (!empty($profiles->pro_nationality_type))?$profiles->pro_nationality_type : 'N/A'?></td>
												<td>Nationality1:</td>
												<td><?= (!empty($profiles->pro_nationality1))?$profiles->pro_nationality1 : 'N/A'?></td>
												<td>Residence Country:</td>
												<td><?= (!empty($profiles->residence_country)) ? $profiles->residence_country : 'N/A';?></td>


											</tr>
											<tr>
												<td>City:</td>
												<td><?= (!empty($profiles->pro_city))?$profiles->pro_city : 'N/A'?></td>
												<td>CNIC/Passport:</td>
												<td><?= (!empty($profiles->pro_cnic_passport))?$profiles->pro_cnic_passport : 'N/A'?></td>
												<td>Marriage Planing:</td>
												<td><?= (!empty($profiles->pro_marriage_planing)) ? $profiles->pro_marriage_planing : 'N/A';?></td>


											</tr>

											</tbody>
										</table>
										<!--<ul class="messages">
											<li>
												<img src="images/img.jpg" class="avatar" alt="Avatar">
												<div class="message_date">
													<h3 class="date text-info">24</h3>
													<p class="month">May</p>
												</div>
												<div class="message_wrapper">
													<h4 class="heading">Desmond Davison</h4>
													<blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
													<br />
													<p class="url">
														<span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
														<a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a>
													</p>
												</div>
											</li>
											<li>
												<img src="images/img.jpg" class="avatar" alt="Avatar">
												<div class="message_date">
													<h3 class="date text-error">21</h3>
													<p class="month">May</p>
												</div>
												<div class="message_wrapper">
													<h4 class="heading">Brian Michaels</h4>
													<blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
													<br />
													<p class="url">
														<span class="fs1" aria-hidden="true" data-icon=""></span>
														<a href="#" data-original-title="">Download</a>
													</p>
												</div>
											</li>
											<li>
												<img src="images/img.jpg" class="avatar" alt="Avatar">
												<div class="message_date">
													<h3 class="date text-info">24</h3>
													<p class="month">May</p>
												</div>
												<div class="message_wrapper">
													<h4 class="heading">Desmond Davison</h4>
													<blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
													<br />
													<p class="url">
														<span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
														<a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a>
													</p>
												</div>
											</li>
											<li>
												<img src="images/img.jpg" class="avatar" alt="Avatar">
												<div class="message_date">
													<h3 class="date text-error">21</h3>
													<p class="month">May</p>
												</div>
												<div class="message_wrapper">
													<h4 class="heading">Brian Michaels</h4>
													<blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
													<br />
													<p class="url">
														<span class="fs1" aria-hidden="true" data-icon=""></span>
														<a href="#" data-original-title="">Download</a>
													</p>
												</div>
											</li>

										</ul>-->
										<!-- end recent activity -->

									</div>
									<div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

										<!-- start user projects -->
										<table class="data table table-striped no-margin">

											<tbody>
											<tr>
												<td>Ethnic Group:</td>
												<td><?= (!empty($profiles->pro_ethnic_group))?$profiles->pro_ethnic_group : 'N/A'?></td>
												<td>Caste</td>
												<td><?= (!empty($profiles->pro_caste))?$profiles->pro_caste : 'N/A'?></td>
												<td>Language</td>
												<td><?= (!empty($profiles->pro_language))?$profiles->pro_language : 'N/A'?></td>
											</tr>
											<tr>
												<td>Religion:</td>
												<td><?= (!empty($profiles->pro_religion))?$profiles->pro_religion : 'N/A'?></td>
												<td>Sect</td>
												<td><?= (!empty($profiles->pro_sect))?$profiles->pro_sect : 'N/A'?></td>
												<td>Religious Level</td>
												<td><?= (!empty($profiles->pro_religious_level))?$profiles->pro_religious_level : 'N/A'?></td>

											</tr>
											<tr>

												<td>Often You Pray:</td>
												<td><?= (!empty($profiles->pro_often_you_pray))?$profiles->pro_often_you_pray : 'N/A'?></td>
											</tr>
											</tbody>
										</table>
										<!-- end user projects -->

									</div>
									<div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">

										<table class="data table table-striped no-margin">

											<tbody>
											<tr>
												<td>Education:</td>
												<td><?= (!empty($profiles->pro_education))?$profiles->pro_education : 'N/A'?></td>
												<td>Degree Title</td>
												<td><?= (!empty($profiles->pro_degree_title))?$profiles->pro_degree_title : 'N/A'?></td>
												<td>Profession</td>
												<td><?= (!empty($profiles->pro_profession))?$profiles->pro_profession : 'N/A'?></td>
												<td>Company</td>
												<td><?= (!empty($profiles->pro_company))?$profiles->pro_company : 'N/A'?></td>
												<td>Job Title</td>
												<td><?= (!empty($profiles->pro_job_title))?$profiles->pro_job_title : 'N/A'?></td>
											</tr>

											</tbody>
										</table>
									</div>
									<div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">

										<table class="data table table-striped no-margin">

											<tbody>
											<tr>
												<td>Family Values:</td>
												<td><?= (!empty($profiles->pro_family_values))?$profiles->pro_family_values : 'N/A'?></td>
												<td>Family Type</td>
												<td><?= (!empty($profiles->pro_family_type))?$profiles->pro_family_type : 'N/A'?></td>
												<td>Father Occupation</td>
												<td><?= (!empty($profiles->pro_father_occupation))?$profiles->pro_father_occupation : 'N/A'?></td>
											</tr>
											<tr>
												<td>Mother Occupation:</td>
												<td><?= (!empty($profiles->pro_mother_occupation))?$profiles->pro_mother_occupation : 'N/A'?></td>
												<td>Brothers</td>
												<td><?= (!empty($profiles->pro_brothers))?$profiles->pro_brothers : 'N/A'?></td>
												<td>Sisters</td>
												<td><?= (!empty($profiles->pro_sisters))?$profiles->pro_sisters : 'N/A'?></td>
											</tr>
											<tr>
												<td>Family Hometown:</td>
												<td><?= (!empty($profiles->pro_family_hometown))?$profiles->pro_family_hometown : 'N/A'?></td>
												<td>Contact Person Name</td>
												<td><?= (!empty($profiles->pro_contact_person_name))?$profiles->pro_contact_person_name : 'N/A'?></td>
												<td>Contact Person Email</td>
												<td><?= (!empty($profiles->contact_person_email))?$profiles->contact_person_email : 'N/A'?></td>
											</tr>
											<tr>
												<td>Contact Person Phone:</td>
												<td><?= (!empty($profiles->pro_contact_person_phone))?$profiles->pro_contact_person_phone : 'N/A'?></td>

											</tr>

											</tbody>
										</table>
									</div>
									<div role="tabpanel" class="tab-pane fade" id="tab_content5" aria-labelledby="profile-tab">

										<table class="data table table-striped no-margin">

											<tbody>
											<tr>
												<td>Status Message:</td>
												<td><?= (!empty($profiles->pro_status_message))?$profiles->pro_status_message : 'N/A'?></td>
												<td>About As:</td>
												<td><?= (!empty($profiles->pro_about_us))?$profiles->pro_about_us : 'N/A'?></td>
												<td>Profile Status:</td>
												<td><?= (!empty($profiles->pro_status) && $profiles->pro_status==1)?'<lable class="label label-success">Activated</lable>' : '<lable class="label label-danger">Deactivated</lable>'?></td>
											</tr>
											<tr>
												<td>Eat Halal:</td>
												<td><?= (!empty($profiles->pro_eat_halal) && $profiles->pro_eat_halal==1)?"Yes" : 'No'?></td>
												<td>Smoking:</td>
												<td><?= (!empty($profiles->pro_smoking) && $profiles->pro_smoking==1)?"Yes" : 'No'?></td>
												<td>Alcohalic:</td>
												<td><?= (!empty($profiles->pro_alcohalic) && $profiles->pro_alcohalic==1)?"Yes" : 'No'?></td>
											</tr>
											<tr>
												<td>Profile Image visibility:</td>
												<td><?= (!empty($profiles->pro_visible) && $profiles->pro_visible==1)?"Yes" : 'No'?></td>
												<td>Friend Requests Sent:</td>
												<td><?= $f_sent?></td>
												<td>Friend Requests Accepted:</td>
												<td><?= $f_accepted?></td>
											</tr>
											<tr>
												<td>Friend Requests Rejected:</td>
												<td><?= $f_rejected?></td>
												<td>Friend Pending Requests:</td>
												<td><?= $f_pending?></td>
												<td></td>
												<td></td>
											</tr>

											</tbody>
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
<!-- /page content -->

<?php $this->load->view('admin/include/footer')?>
<script>
  $(document).ready(function() {
		init_gauge(<?= $profiles->total?>);
	});
</script>
