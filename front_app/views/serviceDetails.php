<?php $this->load->view('common/header')?>
<?php $this->load->view('common/menu')?>



<!--slider started-->
<div class="inner-slider-wraper" style="background:url(<?= base_url()?>assets/images/aboutinnerbg.jpg) no-repeat top">
    <div class="container">
        <?php if(isset($rcd)) {?>
        <h1 class="services-heading"> <?= $rcd->name?></h1>
    <?php }else{ ?>
            <h1 class="services-heading">Our Services</h1>
    <?php }?>
    </div>
</div>
<!--slider ends-->


<!--content started-->
<div class="content-wraper">


    <!--about us started-->
    <div class="inner-aboutus-wraper">
        <div class="container">


            <div class="about-inner-text-detail">
                <div class="row">
                    <?php if(isset($rcd)) {?>

                    <div class="col-md-6">
                        <div class="inner-services-img" style="background:url(<?= $rcd->image?>) no-repeat top">
                        </div>
                    </div>


                    <div class="col-md-6">

                        <p>
                            <?= $rcd->content?>
                        </p>
                    </div>
                     <?php }else{ ?>
                        <div class="col-md-6">

                            <p>
                               No Record Found!
                            </p>
                        </div>

                          <?php }?>


                </div>

            </div>


        </div>
    </div>
    <!--about us ends-->




    <!--client testimonial-->
    <?php $this->load->view('home/testimonial')?>
    <!--client testimonial-->


    <!--newsletter-->
<?php $this->load->view('home/subscribe')?>
    <!--newsletter-->


    <!--contact us-->
 <?php $this->load->view('home/contact')?>
    <!--contact us-->


</div>
<!--content ends-->


<!--footer started-->
<?php $this->load->view('common/footer')?>