<?php
header("Content-type: text/html; charset=utf-8");

require_once("../../config/saemysql.class.php");

$cmd = $_GET["cmd"];

if("login-judge" == $cmd)
{
	$username = addslashes(trim($_POST['username']));
	$password = addslashes(strtolower(trim($_POST['password'])));

	$mysql = new SaeMysql();
	$sql = "select * from `qs_user` where `username`='$username'";
	$row = $mysql->getLine($sql);
	$mysql->closeDb();

	if($password == strtolower(trim($row['password'])))
	{
		$row["lock"];
		if(1 == $row["lock"])
		{
	?>
			<script type="text/javascript">
				alert("您已提交试卷，不可再次登录");
				window.history.go(-1);
			</script>
	<?php
		}else{
			$mysql = new SaeMysql();
			$sql = "select `start_time`,`end_time` from `config` where `id` = 1";
			$rowt = $mysql->getLine($sql);
			$start_time = strtotime($rowt["start_time"]);
			$end_time = strtotime($rowt["end_time"]);
			$mysql->closeDb();
			
			if(time() < $start_time)
			{
			?>
				<script type="text/javascript">
					alert("考试尚未开始");
					window.history.go(-1);
				</script>
			<?php
			}
			else if(time() > $end_time)
			{
			?>
				<script type="text/javascript">
					alert("考试已经结束");
					window.history.go(-1);
				</script>
			<?php
			}else{

				$user_id = $row["id"];
				$user_username = $row["username"];
				$user_key = md5($user_id."gxdr".$user_username);
			
				setcookie("user_id","$user_id",time()+60*60*5,"/");
				setcookie("user_username","$user_username",time()+60*60*5,"/");
				setcookie("user_key","$user_key",time()+60*60*5,"/");
				?>
				<script type="text/javascript">
					window.location.href="../../user/index.php";
				</script>
				<?php
			}
		}
	}
	else{
		?>
		<script type="text/javascript">
			alert('用户名或密码错误');
			window.history.go(-1);
		</script>
		<?php
	}
}
if("logout" == $cmd)
{
	setcookie("user_id", "", time()-3600,"/");
	setcookie("user_username", "", time()-3600,"/");
	setcookie("user_key", "", time()-3600,"/");
	?>
	<script type="text/javascript">
		window.location.href="../../index.php";
	</script>
	<?php	
}
if("submit-paper" == $cmd)
{
	$mysql = new SaeMysql();
	$id = intval($_COOKIE["user_id"]);
	$sql = "update `qs_user` set `lock`=1 where `id`=$id";
	$rowt = $mysql->runSql($sql);
	$mysql->closeDb();
	setcookie("user_id", "", time()-3600,"/");
	setcookie("user_username", "", time()-3600,"/");
	setcookie("user_key", "", time()-3600,"/");
?>
	<script type="text/javascript">
		alert('交卷成功！');
		window.location.href="../../index.php";
	</script>
	<?php	
}
