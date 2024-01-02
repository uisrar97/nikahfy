<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,400,600,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" />
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>
<div style="width:600px; background:linear-gradient(45deg, #8a0240 0%, #c9216f 100%); margin:0 auto;">
    <div style="text-align:center; padding:20px 0"><a href="#" ><img src="<?=base_url().'admin/assets/images/logo.jpg'?>"> </a></div>



    <div style="background-color:#fff">
        <p style="padding:25px 25px 5px; margin:0; text-align:left; line-height:30px; font-size:16px; font-family: 'Open Sans', sans-serif; font-weight:600; text-decoration:none ">Dear MountexGroup Admin,</p>

        <p style="padding:0 25px 5px; margin:0; text-align:left; line-height:20px; font-size:12px; font-family: 'Open Sans', sans-serif; text-decoration:none;    color: #333;">New Order Place Successfully:</p>

        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Country</th>
                <th>City</th>
                <th>Post Code</th>
                <th>Address</th>
            </tr>

            <tr>
                <td><?php echo $rcd->fname.' '.$rcd->lname?></td>
                <td><?php echo $rcd->email?></td>
                <td><?php echo $rcd->country?></td>
                <td><?php echo $rcd->state?></td>
                <td><?php echo $rcd->city?></td>
                <td><?php echo $rcd->pcode?></td>
                <td><?php echo $rcd->address?></td>

            </tr>

        </table>

        <p style="padding: 0px 25px 5px; font-family: 'Open Sans', sans-serif; font-size:14px; font-weight:700">Regards, <br><span>MountexGroup</span> </p>






        <div style="background:#333; padding:12px 0">
            <div class="footerlogo" style="text-align:center;margin-top: -30px;margin-bottom: 5px;"><img src="<?=base_url().'admin/assets/images/logo.jpg'?>" style="width:140px;">   </div>


            <div style="text-align:center">
                <a href="#" style="text-decoration:none; margin-left:5px" ><img src="https://dev.yentna.com/assets/images/emailtemplates/icon1.png"  style="width:25px;"></a>
                <a href="#" style="text-decoration:none; margin-left:5px" > <img src="https://dev.yentna.com/assets/images/emailtemplates/icon2.png" style="width:25px;"></a>
                <a href="#" style="text-decoration:none; margin-left:5px" > <img src="https://dev.yentna.com/assets/images/emailtemplates/icon6.png" style="width:25px;"></a>
                <a href="#" style="text-decoration:none; margin-left:5px" > <img src="https://dev.yentna.com/assets/images/emailtemplates/icon4.png" style="width:25px;"></a>
            </div>




            <div style="text-align:center; margin-top:7px; border-top:1px solid #fff; border-bottom:1px solid #fff; padding:4px 0px;    margin-left: 25px;margin-right: 25px;">
                <!--     <a href="#" style="color:#fff; text-decoration:none; font-size:10px;  padding:0 6px; font-family: 'Open Sans', sans-serif;">About Us </a>
                     <a href="#" style="color:#fff; text-decoration:none; font-size:10px; padding:0 6px; font-family: 'Open Sans', sans-serif;">Pricing </a>
                     <a href="#" style="color:#fff; text-decoration:none; font-size:10px; padding:0 6px;  font-family: 'Open Sans', sans-serif"> Faqs </a>-->

                <a href="#" style="color:#fff; text-decoration:none; font-size:9px; padding:0 3px;  font-family: 'Open Sans', sans-serif"> About Us  </a>
                <a href="#" style="color:#fff; text-decoration:none; font-size:9px; padding:0 3px;  font-family: 'Open Sans', sans-serif"> Our Services </a>
                <a href="#" style="color:#fff; text-decoration:none; font-size:9px; padding:0 3px;  font-family: 'Open Sans', sans-serif"> Gallery </a>
                <a href="#" style="color:#fff; text-decoration:none; font-size:9px; padding:0 4px;  font-family: 'Open Sans', sans-serif"> Shop Now  </a>
                <a href="#" style="color:#fff; text-decoration:none; font-size:9px; padding:0 3px;  font-family: 'Open Sans', sans-serif"> Contact Us </a>





            </div>

            <div class="footer-copyright" style="color:#FFF;margin-top: 10px;margin-bottom: -30px; text-align:center;    font-family: 'Open Sans', sans-serif; font-size:8px;">
                <i class="fa fa-copyright" aria-hidden="true"></i> Copyrights &copy; <?php echo date('Y')?> MountexGroup. All Rights Reserved.
            </div>

        </div>
    </div>
</div>





</body>
</html>


