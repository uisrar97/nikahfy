<!DOCTYPE html>
<html lang="en">
<head>
    <title>Nikahfy</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?php echo base_url().'assets/images/logo2.png'?>"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/login/fonts/iconic/css/material-design-iconic-font.min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/login/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/login/css/main.css">
    <link href="<?php echo base_url()?>assets/vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <!--===============================================================================================-->
    <style>
        .imp p img{
            width: 100% !important;
        }
    </style>
</head>
<body>

<div class="limiter">
    <div class="container-login100" style="background-image: url('<?php echo base_url()?>assets/login/images/bg-01.jpg');">
        <div class="wrap-login100">
            <div  class="alert alert-danger alert-dismissible msg1" style="position: absolute;  margin-top: -60px; margin-left:-50px; width: 25%; height: 7%; display: none;">
            </div>
<!--
            --><?php
/*            if (isset($_COOKIE["centersquare_username"]))

                $data= explode(';',$_COOKIE["centersquare_username"]);
            if(!empty($data)){
                $user=$data[0];
                $pass=base64_decode($data[1]);
            }else{
                $user='';
                $pass='';
            }

            */?>
         <!--   <form class="login100-form validate-form" id="check_user" method="post" action="<?php /*echo base_url().''*/?>">-->

					<span class="login100-form-logo">
						<img src="<?php echo base_url().'assets/images/logo.png'?>" style=" border-radius: 10px; box-shadow: 0 1px 10px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;">
					</span>

                    <span class="login100-form-title p-b-5 p-t-1">
						Forgot Password
					</span>
                <form method="POST" action="<?php echo base_url().'admin/Forgot/Reset';?>">
                    <div class="wrap-input100 validate-input" data-validate = "Enter email">
                        <input class="input100" type="text" name="email" placeholder="Email" id="email" onKeyPress="enterpress(event)" />
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                    </div>
                    <!--<div class="contact100-form-checkbox">
                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me" value="1">
                        <label class="label-checkbox100" for="ckb1">
                            Remember me
                        </label>
                    </div>-->
                    <div class="container-login100-form-btn">
                        <input type="submit" class="login100-form-btn send" value="Reset Password"/>
                    </div>
                </form>
           <!-- </form>-->
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="<?php echo base_url()?>assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url()?>assets/login/vendor/bootstrap/js/popper.js"></script>
<script src="<?php echo base_url()?>assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>assets/login/js/main.js"></script>
<script src="<?php echo base_url()?>assets/vendors/pnotify/dist/pnotify.js"></script>
<script src="<?php echo base_url()?>assets/build/js/custom.js"></script>
<script type="text/javascript">
		function enterpress(e){
			if (e.keyCode == 13) {
				$('.send').trigger('click');
			}
		}
    base_url = '<?=base_url()?>';
   /* $(window).load(function(){
        setTimeout(function() {
            $('#loading').fadeOut( 400, "linear" );
        }, 300);
    });*/
    $(document).ready(function(){

        $('body').on('click','.send',function(){
            var name= $('#email').val();
            $.ajax({
                url: base_url+'Forgot/Reset',
                method:"post",
                dataType:"json",
                data:{email:name},
                success:function (res) {
                    if(res=='yes')
                    {
                        location.href=base_url+'dashboard';
                    }
                    else if(res=="false")
                    {
                        new PNotify({
                            title: 'Fail',
                            text: 'Your Password Or UserName Is Invalid!',
                            type: 'error',
                            hide: true,
                            styling: 'bootstrap3'
                        });
                    }
                    else if(res=="stat")
                    {
                        new PNotify({
                            title: 'Fail',
                            text: 'Your Not an Active User!',
                            type: 'error',
                            hide: true,
                            styling: 'bootstrap3'
                        });
                    }
                    else
                    {
                        new PNotify({
                            title: 'Fail',
                            text: 'Security Code Mismatch!',
                            type: 'error',
                            hide: true,
                            styling: 'bootstrap3'
                        });
                        $('#captcha_code').val('');
                        $('.ppp').html(res.image);
                    }
                }
            });
        });
        <?php if($this->session->flashdata('msg')){ ?>
        var html= $(
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>'+
            '</button>'+
            '<p>'+'<?php echo $this->session->flashdata('msg');?>'+'</p>'
        );
        $('.msg1').append(html).fadeIn().delay(2000).fadeOut();
        <?php } ?>
    });
</script>
</body>
</html>