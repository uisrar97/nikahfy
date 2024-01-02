
<?php $this->load->view('common/header')?>


<!--header started-->
<?php $this->load->view('common/menu')?>
<!--header ends-->
<?php
$ci= &get_instance();
$slider= $ci->slider();
$welcome= $ci->WelcomeNikahfy();
$boost= $ci->boost();
$services= $ci->get_services();
?>


<!--slider started-->
<?php if(isset($slider)) {?>
	<?= $slider->page_details?>
<?php }?>
<!--slider ends-->

<!--content started-->
<div class="content-wraper">



	<!--welcome-->
	<?php if(isset($welcome)) {?>
		<?= $welcome->page_details?>
	<?php }?>
	<!--//welcome-->

	<!--services-->
	<div class="our-services-wraper">
		<div class="container">
			<div class="service-heading">Amazing Features of Nikahfy</div>
			<ul class="row">
				<?php $i=0; foreach ($services as $service) {?>
					<?php if($i<=2){?>
				<li class="col-md-4 col-sm-6 col-xs-12">
					<div class="service-listing-wraper">
						<div class="service-listing-icon"> <img src="<?= $service->image?>" alt=""> </div>
						<div class="service-listing-heading"><?= $service->name?></div>
						<p><?= $service->content?></p>
					</div>
				</li>
		<?php }?>
		<?php $i++; }?>
			</ul>
			<div class="ourservice-button"> <a href="#" data-toggle="modal" data-target="#myModal"> Signup </a> </div>
		</div>
	</div>
	<!--services-->

	<!--dowload text-->
    <?php if(isset($boost)) {?>
		<?= $boost->page_details?>
	<?php }?>
	<!--dowload text-->

	<!--contact us-->
	<?php $this->load->view('common/support')?>
	<!--contact us-->


<!--content ends-->

<!--footer started-->
<?php $this->load->view('common/footer')?>
