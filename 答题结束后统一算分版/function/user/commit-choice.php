<?php

require_once("../../config/saemysql.class.php");

$uid = intval($_COOKIE["user_id"]);
$qid = intval($_POST["qid"]);
$post_answer = trim($_POST["answer"]);
$sql = "select * from `choice_answer` where `user_id`=$uid and `ques_id`=$qid";
$mysql = new SaeMysql();
$row = $mysql->getLine($sql);
$mysql->closeDb();

if($row != false)
{		
	//更新答案操作
	$sql = "update `choice_answer` set `answer`='$post_answer' where `user_id`=$uid and `ques_id`=$qid";
	$mysql = new SaeMysql();
	$mysql->runSql($sql);
	if($mysql->errno()==0)
	{
		echo "答案更新成功";
	}else{
		echo "答案更新失败，请稍后重试";
	}
	$mysql->closeDb();
}
else
{	
	//插入答案操作
	$sql = "insert into `choice_answer` (`user_id`,`ques_id`,`answer`) values ($uid,$qid,'$post_answer') ";
	$mysql = new SaeMysql();
	$mysql->runSql($sql);
	if($mysql->errno()==0)
	{
		echo "答案提交成功";
	}else{
		echo "答案提交失败，请稍后重试";
	}
	$mysql->closeDb();
}

