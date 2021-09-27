<?php

  session_start();

?><!DOCTYPE html>
<html lang="zxx">
<head>
    <title>Booking land| Home </title>
    <!--meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content=" Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
      Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!--//meta tags ends here-->
    <!--booststrap-->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
    <!--//booststrap end-->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- //font-awesome icons -->
    <!--stylesheets-->
    <link href="css/style.css" rel='stylesheet' type='text/css' media="all">
    <!--//stylesheets-->
    <link href="//fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600" rel="stylesheet">
</head>
<body>
<div class="main-top" id="home">
    <!-- header -->
    <div class="headder-top">
        <div class="container-fluid">
            <!-- nav -->
            <nav >
                <div id="logo">
                    <h1><a class="" href="index.html">Booking Land</a></h1>
                </div>
                <label for="drop" class="toggle">Menu</label>
                <input type="checkbox" id="drop">
                <ul class="menu mt-2">
                    <li class="active"><a href="#home">Home</a></li>
                    <li class="mx-lg-3 mx-md-2 my-md-0 my-1"><a href="#about">About</a></li>
                    <li><a href="#service">Land</a></li>

                    <li><a href="#contact">Contact Us</a></li>
                    <li><a href="sign_in.php">Sign In</a></li>
                    <li><a href="sign_up.php">Sign Up</a></li>
                </ul>
            </nav>
            <!-- //nav -->
        </div>
    </div>
    <!-- //header -->
    <!-- banner -->
    <div class="slider-img one-img text-center">
        <div class="container">
            <div class="slider-info">
                <h5>Use our site to find your land</h5>
                <div class="slider-banner">
                    <div class="col-sm-12">
                        <input type="text" placeholder="Please search your location" class="form-control">
                    </div>
                </div>
                <!--                <div class="outs_more-buttn">-->
                <!--                    <a href="#blog">Read More</a>-->
                <!--                </div>-->
            </div>
        </div>
    </div>
</div>