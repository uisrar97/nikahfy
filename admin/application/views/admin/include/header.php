<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Nikahfy</title>
    <link rel="shortcut icon" href="<?php echo base_url().'assets/images/logo2.png'?>">

    <!-- Bootstrap -->
    <link href="<?php echo base_url()?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url()?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url()?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url()?>assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="<?php echo base_url()?>assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?php echo base_url()?>assets/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url()?>assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url()?>assets/build/css/custom.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/vendors/clock/clock.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <script src="<?php echo base_url()?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/build/js/jquery-ui.js"></script>
    <!-- PNotify -->
    <link href="<?php echo base_url()?>assets/build/css/jquery-ui.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/vendors/pnotify/dist/pnotify.css" rel="stylesheet">

    <link href="<?php echo base_url()?>assets/vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">

    <!-- Select Chosen -->
    <style>
        #loader
        {
            position: absolute;
            z-index: 100001;
            margin: auto;
            width: 70px;
            height: 70px;
            top:225px;
            left:46%;
            opacity: 1.0;
            display: none;
        }
        .disp
        {
            display: none;
        }

        .main
        {
            /*margin: 1em 0 0.5em 0;*/
            margin-top: 0px;
            font-weight: normal;
            position: relative;
            text-shadow: 0 -1px rgba(0,0,0,0.6);
            font-size: 15px;
            line-height:20px;
            background: #355681;
            background: rgba(53,86,129, 0.8);
            border: 1px solid #fff;
            padding: 5px 15px;
            color: white;
            border-radius: 0 10px 0 10px;
            box-shadow: inset 0 0 5px rgba(53,86,129, 0.5);
            font-family: 'Muli', sans-serif;
            width: 20%;
        }

        .select2-results__option[aria-selected=true] 
        { 
            display: none;
        }
/*   .wizard_horizontal ul.wizard_steps li a.done .step_no, .wizard_horizontal ul.wizard_steps li a.done:before{
            background:#e72d2e !important;
        }*/
    </style>
  <!--  <style>
        #sortable1, #sortable2 { list-style-type: none; margin: 0; padding: 0 0 2.5em;margin-right: 10px; }
        #sortable1 li, #sortable2 li { margin: 0 5px 5px 5px; padding: 5px; font-size: 1.2em; width: 100%;}
    </style>-->
</head>
