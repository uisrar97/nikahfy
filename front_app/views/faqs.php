<?php $this->load->view('common/header') ?>

<!--header ends-->
<?php $this->load->view('common/menu') ?>
<!--signup modal-->

<!--slider started-->
<div class="slider-main-wraper innerslider-height"
	 style="background:url(<?php echo base_url() ?>assets/images/slider-image.jpg) no-repeat top">
	<div class="container">
		<h1> Faqs </h1>
	</div>
</div>
<!--slider ends-->

<!--content started-->
<div class="content-wraper">
	<div class="inner-faqs-wraper">
		<div class="container">
			<div class="wrapper center-block">
				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					<div class="row">
						<?php $i = 1;
						foreach ($faqs as $key => $val) { ?>
							<div class="panel panel-default">
								<div class="panel-heading <?php if ($i == 1) {
									echo 'active';
								} else {
									echo '';
								} ?>" role="tab" id="heading<?= $i ?>">
									<h4 class="panel-title">
										<a role="button" data-toggle="collapse" data-parent="#accordion"
										   href="#collapse<?= $i ?>" aria-expanded="<?php if ($i == 1) {
											echo 'true';
										} else {
											echo 'false';
										} ?>"
										   aria-controls="collapse<?= $i ?>" class="<?php if ($i > 1) {
											echo 'collapsed';
										} ?>"><?= $val->cname ?>
										</a>
									</h4>
								</div>
								<div id="collapse<?= $i ?>" class="panel-collapse collapse <?php if ($i == 1) {
									echo 'in';
								} else {
									echo '';
								} ?>" role="tabpanel"
									 aria-labelledby="heading<?= $i ?>">
									<div class="panel-body">
										<?= $val->cat_detail ?>
									</div>
								</div>
							</div>
							<?php $i++;
						} ?>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!--contact us-->
	<?php $this->load->view('common/support') ?>
	<!--contact us-->

	<!--content ends-->

	<!--footer started-->
	<?php $this->load->view('common/footer') ?>
