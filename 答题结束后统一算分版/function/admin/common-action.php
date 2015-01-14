<?php

require_once("../../config/saemysql.class.php");

function check_admin()
{
    if(isset($_COOKIE["admin_id"])&&isset($_COOKIE["admin_username"])&&isset($_COOKIE["admin_key"]))
    {
	 	$id = intval($_COOKIE["admin_id"]);

		$mysql = new SaeMysql();
		$sql = "select * from `qs_admin` where `id`=$id";
		$row = $mysql->getLine($sql);
		$mysql->closeDb();
        if(3 == count($row))
        {
			$admin_username = $row["username"];
		    $admin_key = md5($row["password"].$admin_username);
		    if($_COOKIE["admin_key"] == $admin_key)
		    {
		    	return true;
		    }       	
		    else
		    {
		    	return false;
		    }
        }
        else
        {
        	
            return false;
        }

    }
    else
    {
    	return false;
    }
}

$cmd = $_GET["cmd"];

if("login-judge" == $cmd)
{
	$username = addslashes($_POST['username']);
	$password = addslashes($_POST['password']);
	$password = substr(md5($password),5,20);
	$mysql = new SaeMysql();
	$sql = "select * from `qs_admin` where `username`='$username'";
	$row = $mysql->getLine($sql);
	$mysql->closeDb();
	
	if($password == $row['password'])
	{
		$admin_id = $row["id"];
		$admin_username = $row["username"];
		$admin_key = md5($row["password"].$admin_username);
		setcookie("admin_id","$admin_id",time()+60*60*5,"/");
		setcookie("admin_username","$admin_username",time()+60*60*5,"/");
		setcookie("admin_key","$admin_key",time()+60*60*5,"/");
		?>
		<script type="text/javascript">
			window.location.href="../../sdnuguanli/index.php";
		</script>
		<?php
	}
	else
	{
		?>
		<script type="text/javascript">
			alert('wrong username or password');
			window.history.go(-1);
		</script>
		<?php
	}
}
if("logout" == $cmd)
{
	setcookie("admin_id", "", time()-3600,"/");
	setcookie("admin_username", "", time()-3600,"/");
	setcookie("admin_key", "", time()-3600,"/");
	?>
	<script type="text/javascript">
		window.location.href="../../sdnuguanli/index.php";
	</script>
	<?php	
}
?>
<?php
if(false == check_admin())
    {
        exit(0);
    }
?>  
<?php
if("delete-choice" == $cmd)
{
	$id = intval($_GET["id"]);
	$sql = "delete from `choice_question` where `id`=$id";
	
	$mysql = new SaeMysql();
	$mysql->runSql($sql);
	$mysql->closeDb();  
	
	?>
	
	<script type="text/javascript">
		window.location.href="../../sdnuguanli/index.php?id=5";
	</script>
<?php    
}
else if("delete-judge" == $cmd)
{
	$id = intval($_GET["id"]);
	$sql = "delete from `judge_question` where `id`=$id";
	
	$mysql = new SaeMysql();
	$mysql->runSql($sql);
	$mysql->closeDb();  
	
	?>
	
	<script type="text/javascript">
		window.location.href="../../sdnuguanli/index.php?id=25";
	</script>
<?php
}
else if("delete-user" == $cmd)
{
	$id = intval($_GET["id"]);
	$sql = "delete from `qs_user` where `id`=$id";
	
	$mysql = new SaeMysql();
	$mysql->runSql($sql);
	$mysql->closeDb();  
	
	?>
	
	<script type="text/javascript">
		window.location.href="../../sdnuguanli/index.php?id=3";
	</script>
<?php
}
else if("insert-judge" == $cmd)
{
	$id = intval($_POST["id"]);
	$question = addslashes($_POST["que"]);
	$right_answer = addslashes($_POST["right_answer"]);
	
	
	$sql = "INSERT INTO  `judge_question` (
	`id` ,
	`question`,
	`right_answer`
	)
	VALUES ($id , '$question', $right_answer);";
	
	$mysql = new SaeMysql();
	$mysql->runSql($sql);
	$mysql->closeDb();  
	?>
	
	<script type="text/javascript">
		window.location.href="../../sdnuguanli/index.php?id=25";
	</script>
<?php
}
else if("insert-question" == $cmd)
{
	$id = intval($_POST["id"]);
	$question = addslashes($_POST["que"]);
	$choiceA = addslashes($_POST["choiceA"]);
	$choiceB = addslashes($_POST["choiceB"]);
	$choiceC = addslashes($_POST["choiceC"]);
	$choiceD = addslashes($_POST["choiceD"]);
	$choiceE = addslashes($_POST["choiceE"]);
	$right_answer = addslashes(strtoupper(trim($_POST["right_answer"])));
	
	
	$sql = "INSERT INTO  `choice_question` (
	`id` ,
	`question`,
	`choiceA` ,
	`choiceB` ,
	`choiceC` ,
	`choiceD` ,
	`choiceE` ,
	`right_answer`
	)
	VALUES ($id , '$question', '$choiceA',  '$choiceB',  '$choiceC', '$choiceD',  '$right_answer');";
	
	$mysql = new SaeMysql();
	$mysql->runSql($sql);
	$mysql->closeDb();  
	?>
	
	<script type="text/javascript">
		window.location.href="../../sdnuguanli/index.php?id=5";
	</script>
<?php
}
else if("insert-user" == $cmd)
{
	$username =addslashes( $_POST["username"]);
	$password =addslashes( $_POST["password"]);
	$name =addslashes( $_POST["name"]);
	$school =addslashes( $_POST["school"]);
	
	echo $sql = "INSERT INTO  `qs_user` (
	`id` ,
	`lock`,
	`school` ,
	`name`,
	`username` ,
	`password` ,
	`grade`
	)
	VALUES (
	NULL , 0, '$school',  '$name','$username',  '$password',  0
	);";
	
	$mysql = new SaeMysql();
	$mysql->runSql($sql);
	$mysql->closeDb();  
	?>
	
	<script type="text/javascript">
		window.location.href="../../sdnuguanli/index.php?id=3";
	</script>
<?php	
}
else if("update-choice" == $cmd)
{
	$id = addslashes($_POST["id"]);
	$que = addslashes($_POST["que"]);
	$choiceA = addslashes($_POST["choiceA"]);
	$choiceB = addslashes($_POST["choiceB"]);
	$choiceC = addslashes($_POST["choiceC"]);
	$choiceD = addslashes($_POST["choiceD"]);
	$choiceE = addslashes($_POST["choiceE"]);
	$right_answer = addslashes(strtoupper(trim($_POST["right_answer"])));
	
	$id = intval($_GET["id"]);
	
	$sql = "update `choice_question` set `id`=$id,
							`question`='$que',
							`choiceA`='$choiceA',
							`choiceB`='$choiceB',
							`choiceC`='$choiceC',
							`choiceD`='$choiceD',
							`choiceE`='$choiceE',
							`right_answer`='$right_answer' where `id`=$id";
	
	$mysql = new SaeMysql();
	$mysql->runSql($sql);
	$mysql->closeDb();  
	?>
	
	<script type="text/javascript">
		window.location.href="../../sdnuguanli/index.php?id=5";
	</script>
<?php
}
else if("update-judge" == $cmd)
{
	$id = intval($_POST["id"]);
	$que = addslashes($_POST["que"]);
	$right_answer = addslashes($_POST["right_answer"]);
	
	$id = intval($_GET["id"]);
	
	$sql = "update `judge_question` set `id`=$id,
							`question`='$que',
							`right_answer`=$right_answer where `id`=$id";
	
	$mysql = new SaeMysql();
	$mysql->runSql($sql);
	$mysql->closeDb();  
	?>
	
	<script type="text/javascript">
		window.location.href="../../sdnuguanli/index.php?id=25";
	</script>
<?php
}
else if("update-user" == $cmd)
{
	$username = addslashes($_POST["username"]);
	$password = addslashes($_POST["password"]);
	$school = addslashes($_POST["school"]);
	$name = addslashes($_POST["name"]);
	$lock = intval($_POST["lock"]);
	$id = intval($_POST["id"]);
	
	$sql = "update `qs_user` set `name`='$name',`lock`=$lock,`username`='$username',`password`='$password',`school`='$school' where `id`=$id";
	
	$mysql = new SaeMysql();
	$mysql->runSql($sql);
	$mysql->closeDb();  
	?>
	
	<script type="text/javascript">
		window.location.href="../../sdnuguanli/index.php?id=3";
	</script>
<?php
}
else if("set-time" == $cmd)
{
	$start_time = addslashes($_POST["start_time"]);
	$end_time = addslashes($_POST["end_time"]);
	
	
	$sql = "update `config` set `start_time`='$start_time',`end_time`='$end_time'";
	
	$mysql = new SaeMysql();
	$mysql->runSql($sql);
	$mysql->closeDb();  
	?>
	
	<script type="text/javascript">
		window.location.href="../../sdnuguanli/index.php?id=111";
	</script>
<?php
}
