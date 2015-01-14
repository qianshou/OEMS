<?php

require_once("../../config/saemysql.class.php");

$uid = intval($_COOKIE["user_id"]);
$qid = intval($_POST["qid"]);
$post_answer = trim($_POST["answer"]);

$sql = "select * from `judge_answer` where `user_id`=$uid and `ques_id`=$qid";
$mysql = new SaeMysql();
$row = $mysql->getLine($sql);
$mysql->closeDb();

if(false != $row)
{  	
// echo "执行更新操作";
	$sql = "update `judge_answer` set `answer`=$post_answer where `user_id`=$uid and `ques_id`=$qid";
	$mysql = new SaeMysql();
	$mysql->runSql($sql);
	if($mysql->errno() == 0)
	{
		echo "答案更新成功";
	}
	else
	{
		echo "答案更新失败，请重试";
	}
	$mysql->closeDb();
}
else
{
// echo "执行插入操作";
	$sql = "insert into `judge_answer` (`user_id`,`ques_id`,`answer`) values ($uid,$qid,$post_answer) ";
	$mysql = new SaeMysql();
	$mysql->runSql($sql);
	if($mysql->errno() == 0)
	{
		echo "答案提交成功";
	}
	else
	{
		echo "答案提交失败，请重试";
	}
	$mysql->closeDb();
}

