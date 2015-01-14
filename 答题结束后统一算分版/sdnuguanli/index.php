<?php require_once("../config/saemysql.class.php");?>
<?php require_once("../function/admin/common-function.php");?>
<?php require_once("../common/admin/common-head.php");?>
<?php
     if(false == check_admin())
     {
?>
      <script type="text/javascript">
        window.location.href="./login.php";
      </script>

<?php

        exit(0);
      }
      $tag = "koastal";
?>      
      <div class="container menu">
        <div class="navbar">
          <div class="navbar-inner">
              <ul class="nav">
                <li class="active"><a href="index.php">答题情况</a></li>
                <li class="active"><a href="../function/admin/compute-score.php">计算考生分数</a></li>
                <li class=""><a href="index.php?id=111">设置考试时间</a></li>
                <li class="dropdown">
                  <a class="dropdown-toggle"  id="drop1" role="button" data-toggle="dropdown" href="#">考生管理<b class="caret"></b></a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
                      <li role="presentation"><a  role="menuitem" tabindex="-1" href="index.php?id=3">查看考生</a></li>
                      <li role="presentation"><a  role="menuitem" tabindex="-1" href="index.php?id=2">添加考生</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                  <a  id="drop2" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">题目管理<b class="caret"></b></a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="drop2">
                      <li role="presentation"><a  role="menuitem" tabindex="-1" href="index.php?id=5">查看选择题</a></li>
                      <li role="presentation"><a  role="menuitem" tabindex="-1" href="index.php?id=25">查看判断题</a></li>
                      <li role="presentation"><a  role="menuitem" tabindex="-1" href="index.php?id=6">添加选择题</a></li>
                      <li role="presentation"><a  role="menuitem" tabindex="-1" href="index.php?id=26">添加判断题</a></li>
                    </ul>
                </li>
                <li><a href="../function/admin/common-action.php?cmd=logout">退出系统</a></li>

              </ul>
            </div>
          </div>
        </div>

      </div>

      <!-- Jumbotron -->
     <?php
        switch ($_GET["id"]) {
          case 0:
            require_once("./include/view-answer.php");
            break;
		    case 111:
            require_once("./include/set-time.php");
            break;
          case 1:
            require_once("./include/run-sql.php");
            break;
          case 2:
            require_once("./include/insert-user.php");
            break;  
          case 3:
            require_once("./include/list-user.php");
            break;  
          case 4:
            require_once("./include/update-user.php");
            break;    
          case 5:
            require_once("./include/list-choice.php");
            break;  
          case 6:
            require_once("./include/insert-choice.php");
            break;  
           case 7:
            require_once("./include/view-choice.php");
            break;      
           case 8:
            require_once("./include/update-choice.php");
            break;  
          case 25:
            require_once("./include/list-judge.php");
            break;   
          case 26:
            require_once("./include/insert-judge.php");
            break; 
           case 27:
            require_once("./include/view-judge.php");
            break;   
          case 28:
            require_once("./include/update-judge.php");    
            break;                                           
          default:
            //默认显示考生答题情况
            require_once("./include/view-answer.php");
            break;
        }
      ?>

      <hr>

<?php require_once("../common/admin/common-footer.php");?>

    </div> <!-- /container -->
<script type="text/javascript">
$(function(){
  var str = $("span#info").text();
  //alert(str);
  $("ul.nav li:contains("+str+")").addClass("active").siblings().removeClass("active");
});
</script>
   
  </body>
</html>
