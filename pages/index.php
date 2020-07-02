<?php include('server.php'); ?>
<html>
    <head>
        <title>Electronic Supply Home Page</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="css/style_navOnline.css">
        <link rel="stylesheet" type="text/css" href="css/style_Main.php">
        <link rel="stylesheet" type="text/css" href="css/style_info.php">
        <link rel="stylesheet" type="text/css" href="css/style_Signup.php">
        <!-- W3S CSS icon lib -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- JQUERY -->
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Bootstrap style --> 
    <link id="callCss" rel="stylesheet" href="themes/bootshop/bootstrap.min.css" media="screen"/>
    <link href="themes/css/base.css" rel="stylesheet" media="screen"/>
<!-- Bootstrap style responsive -->	
	<link href="themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
	<link href="themes/css/font-awesome.css" rel="stylesheet" type="text/css">
<!-- Google-code-prettify -->	
	<link href="themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
<!-- fav and touch icons -->
    <link rel="shortcut icon" href="themes/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="themes/images/ico/apple-touch-icon-57-precomposed.png">
	<style type="text/css" id="enject"></style>
    </head>
    <body bgcolor="#CAC7C7">
        <div class="container">

             <!-- USER BAR  -->
             <?php include("user_bar.php"); ?>
             
             <!-- NAVIGATE -->
            <?php include("navigate.php"); ?>

            <!-- HEAD -->
            <?php
            $allowed = array('about.php', 'index01.php','index.php',"itemSort.php"); // add the pagenames you need
            $page = ( isset($_GET['a']) ) ? $_GET['a'] : 'index.php';
            if ( in_array($page, $allowed) )
            {
                include("header.php");
            }         
?>



            <!-- MENU -->   
            <div style="margin-top: 5px;">
            
                <?php 
                    $notAllowed = array('info.php', 'contact.php','ql_sanPham.php'); // add the pagenames you need
                    $page = ( isset($_GET['a']) ) ? $_GET['a'] : 'index';
                    if (!in_array($page, $notAllowed) )
                    {
                        include("sidebar.php");
                    }

                 ?>

            
                <!-- PRODUCT LIST -->
            
                    <?php
                        
                        if(!isset($_GET['a']))
                        {
                            $a = "index01.php";
                        }
                        else{
                            $a = $_GET['a'];
                        }
                    include($a);
                    ?>        
            </div>  
            
            <?php include("footer.php"); ?>
        </div>
        <script type="text/javascript" src="js/script.js"></script>
        <?php include("subPage/ending.php"); ?>
        <script>
        // COMBOBOX
        $(document).ready(function(){
            $("select.sapXep").change(function(){
                var selectedValue = $(this).children("option:selected").val();
                window.location.replace("index.php?a=index01.php&sx="+selectedValue);
            });
        });
        // CHECKBOX
        $('#check').click(function() {
            alert("Checkbox state (method 1) = " + $('#test').prop('checked'));
            alert("Checkbox state (method 2) = " + $('#test').is(':checked'));
        });
        </script>
    </body>
</html>