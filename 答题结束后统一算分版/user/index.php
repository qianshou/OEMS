<?php require_once("../config/saemysql.class.php");?>
<?php require_once("../function/user/common-function.php");?>
<?php require_once("../common/common-head.php");?>
<?php
     if(false == check_user())
     {
?>
      <script type="text/javascript">
        alert('登录超时，请重新登录');
        window.location.href="../index.php";
      </script>
<?php
        exit(0);
      }
      $tag = "koastal";
?> 
        <div class="navbar">
          <div class="navbar-inner">
            <div class="container">
              <ul class="nav">
                <li class="active"><a href="index.php">个人信息</a></li>
                <li><a href="./index.php?id=11&fid=1">选择题</a></li>
                <li><a href="./index.php?id=22&fid=1">判断题</a></li>
                <li><a href="index.php?id=3">答题情况</a></li>
                <li><a href="../function/user/common-action.php?cmd=logout"  style="color:green">退出系统</a></li>
                <li><a href="#Submit" data-toggle="modal" data-backdrop="static" style="color:red">提交试卷</a></li>
              </ul>
            </div>
          </div>
        </div>

      </div>



<?php
        switch ($_GET["id"]) {
          case 0:
            require_once("./include/index-user.php");
            break;
          case 3:
            require_once("./include/view-answer.php");
            break; 
          case 11:
            require_once("./include/answer-choice.php");
            break;  
          case 22:
            require_once("./include/answer-judge.php");
            break;                               
          default:
            //默认显示考生答题情况
            require_once("./include/index-user.php");
            break;
        }
?>



      <hr>

    <?php require_once("../common/common-footer.php");?>

    </div> <!-- /container -->


<script type="text/javascript">
$(function(){
  var str = $("span#info").text();
  //alert(str);
  $("ul.nav li:contains("+str+")").addClass("active").siblings().removeClass("active");
});
function sub_ok(){
  window.location.href = "../function/user/common-action.php?cmd=submit-paper";
};
</script>
   

    <!-- #Submit Model -->
  <div id="Submit" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header" style="padding: 50px 15px;text-align:center;">
      <h3 id="myModalLabel">确认要提交试卷么？</h3>
    </div>
    <div class="modal-body login-body" style="margin-top: 20px;margin-bottom: 20px;margin-left:100px">
    <button class="btn btn-large btn-danger" onclick="sub_ok()">确定</button>
    <span style="display:inline-block;width:150px;">&nbsp;</span> 
    <button class="btn btn-large btn-primary" data-dismiss="modal">取消</button>
    </div>
  </div>
    <!-- #Login Model end -->



  </body>
</html>
