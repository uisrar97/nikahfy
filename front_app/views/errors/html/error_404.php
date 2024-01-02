<!DOCTYPE html>
<html lang="en">

    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Plan D Studios">
        <link rel="shortcut icon" href="#">

        <title>404 - Page Not Found</title>
        <!--
            <link rel="stylesheet" href="../../../assets/css/bootstrap.min.css">
        <link href="../../../assets/css/style_404.css" rel="stylesheet">
        --> <!-- Code for live -->
        <!-- Latest compiled and Bootstrap minified CSS -->
        <link rel="stylesheet" href="<?= ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && ! in_array(strtolower($_SERVER['HTTPS']), array( 'off', 'no' ))) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST']."/" ?>assets/css/bootstrap.min.css">

        <!-- Core CSS -->
        <link href="<?= ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && ! in_array(strtolower($_SERVER['HTTPS']), array( 'off', 'no' ))) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST']."/" ?>assets/css/style_404.css" rel="stylesheet">

        <!-- Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,900,300,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Ultra' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Rochester' rel='stylesheet' type='text/css'>


    </head>
    <body class="dusk">
        <div class="col-md-12">
            <div class="owl-background">
                <div class="moon"><div class="left"></div><div class="right"></div></div>
                <div class="owl">
                    <div class="wing1"></div>
                    <div class="wing2"></div>
                    <div class="wing3"></div>
                    <div class="wing4"></div>
                    <div class="wing5"></div>
                    <div class="wing6"></div>
                    <div class="wing7"></div>
                    <div class="wing8"></div>
                    <div class="wing9"></div>
                    <div class="wing10"></div>
                    <div class="wing11"></div>
                    <div class="wing12"></div>
                    <div class="owl-head">
                        <div class="ears"></div>			
                    </div>
                    <div class="owl-body">
                        <div class="owl-eyes">
                            <div class="owleye">
                                <div class="owleye inner"></div>
                                <div class="owleye inner inner-2"></div>
                                <div class="eyelid top"></div>
                                <div class="eyelid bottom"></div>
                            </div>
                            <div class="owleye">
                                <div class="owleye inner"></div>
                                <div class="owleye inner inner-2"></div>
                                <div class="eyelid top"></div>
                                <div class="eyelid bottom"></div>
                            </div>
                            <div class="nose"></div>
                        </div>
                        <div class="feet">
                            <div class="foot1"></div>
                            <div class="foot2"></div>
                        </div>
                    </div>				
                    <div class="branch"></div>
                </div>
            </div> 
        </div>
        <div class="col-md-12">
            <div class="message">
                <h2>Oops, Sorry</h2>
                <p>The page you're looking for does not exist</p><br>
                <div class="btndiv"><a href='<?= ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && ! in_array(strtolower($_SERVER['HTTPS']), array( 'off', 'no' ))) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST']."/" ?>'><button class="btnpop">Go to Home</button><a></div>						
            </div>
        </div>
        <div id='stars1'></div>
        <div id='stars2'></div>
        <div id='stars3'></div>
        <div id='sstar'></div>
</body>
</html>
