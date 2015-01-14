<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>山东省大中学生“国学达人”挑战赛</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="山东省大中学生国学达人挑战赛">
    <meta name="author" content="koastal">
    <script src="../bootstrap/js/jquery.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../bootstrap/js/leave-time.js"></script>
    <!-- Le styles -->
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-bottom: 30px;
      }
      .koastal-footer
      {
        width: 100%;
        padding-top: 20px;
        padding-left: 20px;
        height: 120px;
        background-color: #C0392B;
        color: white;
      }
      .koastal-footer .footer-span
      {
        display: inline-block;;
        width: 400px;
      }
      .login-body{
        margin-top: 100px;
        margin-bottom: 100px;
      }
      .koastal-banner{
        width: 100%;
        height: 150px;
        background-color: #C0392B;
        color: white;
        position: relative;
        top:-10px;
      }
      .koastal-banner .text{
        padding-top:50px;
        margin-left: 50px;
        margin-right: auto;
        } 
      /* Custom container */
      .container {
        margin: 0 auto;
        max-width: 1000px;
      }
      .container > hr {
        margin: 60px 0;
      }

      /* Main marketing message and sign up button */
      .jumbotron {
        margin-top: 30px;
        margin-left:10px;
      }
      .jumbotron .content{
        margin-left: 2px;
      }
      .jumbotron .lead {
        font-size: 24px;
        line-height: 1.25;
        margin-bottom: 70px;
      }
       .jumbotron .list_lead {
        font-size: 24px;
        line-height: 1.25;
        margin-bottom: 20px;
      }

      /* Customize the navbar links to be fill the entire space of the .navbar */
      .navbar .navbar-inner {
        padding: 0;
      }
      .navbar .nav {
        margin: 0;
        display: table;
        width: 100%;
      }
      .navbar .nav >li {
        display: table-cell;
        width: 1%;
        float: none;
      }
      .navbar .nav >li a {
        font-weight: bold;
        text-align: center;
        border-left: 1px solid rgba(255,255,255,.75);
        border-right: 1px solid rgba(0,0,0,.1);
      }
      .navbar .nav >li:first-child a {
        border-left: 0;
        border-radius: 3px 0 0 3px;
      }
      .navbar .nav >li:last-child a {
        border-right: 0;
        border-radius: 0 3px 3px 0;
      }
    </style>
    <link href="../bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->
  </head>

  <body>
    <div class="container">

      <div class="masthead">
        <div class="koastal-banner">
          <div class="text">
              <h3>山东省大中学生“国学达人”挑战赛&nbsp;&nbsp;(大学组)</h3>
               <div id="leave_time" class="offset6"></div>
          </div>
        </div>
<?php require_once("../config/saemysql.class.php");?>        
<?php require_once("timer.php");?>