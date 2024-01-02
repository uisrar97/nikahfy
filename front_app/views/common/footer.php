<?php
$ci= &get_instance();
$setting=$ci->get_setting();

?>
</div>
<!--content ends-->

<!--footer started-->
<script src="//code.jivosite.com/widget.js" data-jv-id="LQPsdGIDWA" async></script>
<div class="footer-wraper">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="footer-text-wraper">
					<div class="footer-logo-wrp">
						<img src="<?php echo base_url()?>admin/uploads/editor_images/logo_1.png" alt="">
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="footer-download-button"> <a href="https://play.google.com/store/apps/details?id=com.plandstudios.matrimonialapp"> <img src="<?php echo base_url()?>assets/images/appbutton.png" alt="Google Play Store Button"> </a>
				<a href=""> <img src="<?php echo base_url()?>assets/images/appbutton1.png" alt="Apple App Store Button"> </a></div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="copyright-text-footer">
			<div class="row">
				<div class="col-md-4 col-sm-4 col-xs-12">
					<div class="copy-rigt"> Copyrights &copy; <?= date('Y')?> Nikahfy.</div>
				</div>
                <div class="col-md-4 col-sm-4 col-xs-12" style="text-align: center;">
                <?php if(isset($setting['facebook'])){ ?>
                    <a href="<?= $setting['facebook'] ?>"><img src="<?php echo base_url()?>assets/images/facebook-icon.png" alt="Facebook"></a>&nbsp
                <?php } ?>
                <?php if(isset($setting['instagram'])){ ?>
                    <a href="<?= $setting['instagram'] ?>"><img src="<?php echo base_url()?>assets/images/instagram.png" alt="Instagram"></a>&nbsp
                <?php } ?>
                <?php if(isset($setting['twitter'])){ ?>
                    <a href="<?= $setting['twitter'] ?>"><img src="<?php echo base_url()?>assets/images/twitter.png" alt="Twitter"></a>&nbsp
                <?php } ?>
                <?php if(isset($setting['linkedin'])){ ?>
                    <a href="<?= $setting['linkedin'] ?>"><img src="<?php echo base_url()?>assets/images/linkedin.png" alt="LinkedIn"></a>&nbsp
                <?php } ?>
                <?php if(isset($setting['pinterest'])){ ?>
                    <a href="<?= $setting['pinterest'] ?>"><img src="<?php echo base_url()?>assets/images/pinterest.png" alt="Pinterest"></a>&nbsp
                <?php } ?>
                <?php if(isset($setting['presskit'])){ ?>
                    <a href="<?= $setting['presskit'] ?>"><img src="<?php echo base_url()?>assets/images/press-kit.png" alt="Press Kit"></a>&nbsp
                <?php } ?>
                <?php if(isset($setting['googlemap'])){ ?>
                    <br><br>
                    <?= $setting['googlemap'] ?>&nbsp
                <?php } ?>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-12">
					<div class="footer-navigation">
						<ul>
							<li> <a href="<?php echo base_url()?>"> Home </a> </li>
							<li> <a href="<?= base_url().'pages/about-us'?>"> About </a> </li>
							<li> <a href="<?= base_url().'pages/faqs'?>"> FAQs </a> </li>
							<li> <a href="<?= base_url().'pages/contact-us'?>"> Contact </a> </li>
						</ul>
					</div> 
				</div>
			</div>
		</div>
	</div>
    <div class="container">
		<div class="copyright-text-footer"></div>
	</div>
</div>
<!--footer ends-->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script type="text/javascript" src="<?= base_url()?>assets/js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script type="text/javascript" src="<?= base_url()?>assets/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).ready(function () {

        $('.consend').click(function(e) {

            var validate=0;
            var name= $('#name').val();
            var email= $('#email').val();
            var message= $('#message').val();
            var subject= $('#subject').val();
            if(name==''){
                $('#name').css('border','1px solid red');
                validate=1;
            }else{
                $('#name').css('border','1px solid green');
            }
            if(email==''){
                $('#email').css('border','1px solid red');
                validate=1;
            }else{
                $('#email').css('border','1px solid green');
            }
            if(message==''){
                $('#message').css('border','1px solid red');
                validate=1;
            }else{
                $('#message').css('border','1px solid green');
            }
            if(validate==0) {
                $(this).prop('disabled',true);
                $('#pro').show();
                e.preventDefault();
                $.ajax({
                    url : "<?php echo base_url().'Home/contact_send_us'?>",
                    type: "POST",
                    data : {name:name,subject:subject,email:email, message:message},
                    dataType:"json",
                    success: function(res) {
                        if (res != 'false') {
                            swal("Thank you for trying to reach us. We will be in touch soon.");
                            $('#name').val('');
                            $('#subject').val('');
                            $('#email').val('');
                            $('#message').val('');
                            $('#contactform').trigger('reset');
                            $('.consend').prop('disabled',false);
                            $('#pro').hide();

                        } else {
                            swal("Please. Try Again!");
                        }

                    }

                });
            }

        });
        var trigger = $('.hamburger'),
            overlay = $('.overlay'),
            isClosed = false;

        trigger.click(function () {
            hamburger_cross();
        });

        function hamburger_cross() {

            if (isClosed == true) {
                overlay.hide();
                trigger.removeClass('is-open');
                trigger.addClass('is-closed');
                isClosed = false;
            } else {
                overlay.show();
                trigger.removeClass('is-closed');
                trigger.addClass('is-open');
                isClosed = true;
            }
        }

        $('[data-toggle="offcanvas"]').click(function () {
            $('#wrapper').toggleClass('toggled');
        });
    });
</script>
</body>
</html>
