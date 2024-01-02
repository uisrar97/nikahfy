<body>
<?php
$ci= &get_instance();
$setting=$ci->get_setting();

?>
<div class="header-main-wraper">
	<div class="container">

		<!--logo-->
		<div class="col-md-3">
			<div class="logo-wraper"> <a href="<?= base_url()?>">
					<?php if($setting['header_logo']) {?>
						<img src="<?= $setting['header_logo']?>" alt="">
					<?php }else{ ?>
					<img src="<?= base_url()?>assets/images/logo.png" alt="">
					<?php }?>
				</a> </div>
		</div>
		<!--//logo-->

		<!--navigation-->
		<div class="col-md-9">
			<div class="header-navigationwrp">
				<ul>
					<li> <a href="<?= base_url()?>"> Home </a> </li>
					<li> <a href="<?= base_url().'pages/about-us'?>"> About </a> </li>
					<li> <a href="<?= base_url().'pages/faqs'?>"> FAQs </a> </li>
					<li> <a href="<?= base_url().'pages/contact-us'?>"> Contact </a> </li>
					<li class="signup-button"> <a href="#" data-toggle="modal" data-target="#myModal"> Signup </a> </li>
				</ul>
			</div>
			<div class="sitemobile-menu-wraper">
				<div id="wrapper">
					<div class="overlay"></div>

					<!-- Sidebar -->
					<nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
						<ul class="nav sidebar-nav">
							<li class="logo-site-black"> <a href="<?= base_url()?>"> <img src="<?= base_url()?>assets/images/logo_1.png" alt=""> </a> </li>
							<li> <a href="<?= base_url()?>"> Home </a> </li>
							<li> <a href="<?= base_url().'pages/about-us'?>"> About </a> </li>
							<li> <a href="<?= base_url().'pages/faqs'?>"> FAQs </a> </li>
							<li> <a href="<?= base_url().'pages/contact-us'?>"> Contact </a> </li>
							<li class="signup-button-menu"> <a href="#" data-toggle="modal" data-target="#myModal">Signup</a> </li>
						</ul>
						<div class="mobile-copyright-wraper"> Copyright@<?php echo date('Y')?> <strong>Plandstudios.</strong> </div>
					</nav>
					<!-- /#sidebar-wrapper -->

					<!-- Page Content -->
					<div id="page-content-wrapper">
						<button type="button" class="hamburger is-closed" data-toggle="offcanvas"> <span class="hamb-top"></span> <span class="hamb-middle"></span> <span class="hamb-bottom"></span> </button>
					</div>
					<!-- /#page-content-wrapper -->

				</div>
			</div>
		</div>
		<!--//navigation-->

	</div>
</div>
<div class="signup-modal-wraper">
	<div id="myModal" class="modal fade" role="dialog">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Ready to find your match?</h4>
				</div>
				<div class="modal-body">
					<div class="mobile-application-buttons"> <a href="https://play.google.com/store/apps/details?id=com.plandstudios.matrimonialapp"> <img src="<?php echo base_url()?>assets/images/appbutton.png" alt=""> </a>
					<a href=""> <img src="<?php echo base_url()?>assets/images/appbutton1.png" alt="Apple App Store Button"> </a></div>
				</div>
			</div>
		</div>
	</div>
</div>
