<?php $this->load->view('common/header')?>
<?php $this->load->view('common/menu')?>
<!--header ends-->


<!--slider started-->
<div class="inner-slider-wraper" style="background:url(<?php echo base_url()?>assets/images/aboutinnerbg.jpg) no-repeat top">
    <div class="container">
        <h1 class="services-heading"><?php if(isset($service)) {?>
                <?= $service->page_title?>
            <?php }?> </h1>
    </div>
</div>
<!--slider ends-->


<!--content started-->
<div class="content-wraper">


    <!--about us started-->
   <?php if(isset($service)) {?>
       <?= $service->page_details?>
    <?php }?>
    <!--about us ends-->




    <!--client testimonial-->
    <?php //$this->load->view('home/testimonial')?>
    <!--client testimonial-->
    <?php $this->load->view('home/services')?>

    <!--newsletter-->
    <?php $this->load->view('home/subscribe')?>
    <!--newsletter-->


    <!--contact us-->
    <?php //$this->load->view('home/contact')?>
    <!--contact us-->


</div>
<!--content ends-->


<!--footer started-->
<?php $this->load->view('common/footer')?>