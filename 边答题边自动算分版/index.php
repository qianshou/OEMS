<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>山东省大中学生“国学达人”挑战赛</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="山东省大中学生国学达人挑战赛">
    <meta name="author" content="koastal">
    <script src="./bootstrap/js/jquery.js"></script>
    <script src="./bootstrap/js/bootstrap.min.js"></script>
    <script src="./bootstrap/js/leave-time.js"></script>
    <!-- Le styles -->
    <link href="./bootstrap/css/bootstrap.css" rel="stylesheet">
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
        margin-top: 50px;
        margin-bottom: 50px;
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
        margin: 50px 0;
        text-align: center;
      }
      .jumbotron h1 {
        font-size: 50px;
        line-height: 1;
      }
      .jumbotron .lead {
        font-size: 24px;
        line-height: 1.25;
      }
      .jumbotron .btn {
        font-size: 21px;
        padding: 14px 24px;
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
      .navbar .nav li {
        display: table-cell;
        width: 1%;
        float: none;
      }
      .navbar .nav li a {
        font-weight: bold;
        text-align: center;
        border-left: 1px solid rgba(255,255,255,.75);
        border-right: 1px solid rgba(0,0,0,.1);
      }
      .navbar .nav li:first-child a {
        border-left: 0;
        border-radius: 3px 0 0 3px;
      }
      .navbar .nav li:last-child a {
        border-right: 0;
        border-radius: 0 3px 3px 0;
      }
    </style>
    <link href="./bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

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
              <h3>山东省大中学生“国学达人”挑战赛&nbsp;&nbsp;(加试题)</h3>
              <div id="leave_time" class="offset6"></div>
          </div>
        </div>
      
      </div>

      <!-- Jumbotron -->
      <div class="jumbotron">
        <p class="lead text-info">请仔细阅读考试细则</p>
        <div class="container" style="margin-bottom:30px;">
        <table class="table table-hover">
              <tr class="info"><td class="span1.5">考试细则：</td></tr>
              <tr><td style="text-align:right;">1.</td> <td>本场考试时间为5分钟，题目由13道不定项选择题组成，满分20分。</td></tr>
              <tr><td style="text-align:right;">2.</td> <td>考生使用准考证号和考生姓名全拼（例：zhangsan）进行登录。</td></tr>
              <tr><td style="text-align:right;">3.</td> <td>考生登录系统之后，可以点击“选择题”进行答题。</td></tr>
              <tr><td style="text-align:right;">4.</td> <td>考生每回答一道选择题，都需要点击“提交”按钮，将答案进行提交。</td></tr>
              <tr><td style="text-align:right;">5.</td> <td>考试时间结束之后，考生必须点击菜单栏的“提交试卷”，并确认提交，否则成绩无效。</td></tr>
              <tr><td style="text-align:right;">6.</td> <td>考生“提交试卷”之后，不能再次登录。</td></tr>
        </table>
        <hr/>
          <div class="span3"><input type="checkbox" id="obey" name="obey">我已认真阅读上述考试细则。</div>
          <div class="span2"><button class="btn btn-primary" disabled="disabled" id="login_form" href="#Login" data-toggle="modal" data-backdrop="static">现&nbsp;在&nbsp;登&nbsp;录</button></div>
        </div>
      </div>

      <hr>

  <?php require_once("./common/common-footer.php");?>

    </div> <!-- /container -->



    <!-- #Login Model -->
	<div id="Login" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	    <h3 id="myModalLabel">欢迎登陆考试系统</h3>
	  </div>
	  <div class="modal-body login-body">
		<form class="form-horizontal" action="./function/user/common-action.php?cmd=login-judge" method="post" target="_self">
		  <div class="control-group">
		    <label class="control-label" for="username">准考证号</label>
		    <div class="controls">
		      <input type="text" id="username" name="username" placeholder="准考证号" required>
		    </div>
		  </div>
		  <div class="control-group">
		    <label class="control-label" for="password">考生姓名</label>
		    <div class="controls">
		      <input type="password" id="password" name="password" placeholder="考生姓名" required>
		    </div>
		  </div>
		  <div class="control-group">
		    <div class="controls">
		      <input type="submit" class="btn btn-success" name="login" value="登&nbsp;&nbsp;陆">
		      <span style="display:inline-block;width:80px"></span>
		      <input type="reset" class="btn btn-primary" name="reset" value="重&nbsp;&nbsp;置">
		    </div>
		  </div>
		</form>
	  </div>
	</div>
    <!-- #Login Model end -->
    <script text="text/javascript">
        $(function(){
          $("#obey").click(function(){
            if($("#obey").is(":checked")){
              $("#login_form").removeAttr("disabled");
            }
            else{
              $("#login_form").attr("disabled","disabled");
            }
          });
        })
    </script>
  </body>
</html>