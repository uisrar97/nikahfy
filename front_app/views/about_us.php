<?php $this->load->view('common/header') ?>
<?php $this->load->view('common/menu') ?>
<style>
	.slider-main-wraper{
		height:150px;
	}
</style>

<!--//welcome-->
<!--slider started-->
<?php if (!empty($about)) { ?>
	<?= $about->page_details ?>
<?php } ?>
<!--contact us-->
<?php $this->load->view('common/support') ?>
<!--contact us-->


<!--content ends-->

<!--footer started-->
<?php $this->load->view('common/footer') ?>
