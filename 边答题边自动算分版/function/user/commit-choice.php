<?php

require_once("../../config/saemysql.class.php");

$uid = intval($_COOKIE["user_id"]);
$qid = intval($_POST["qid"]);
$post_answer = trim($_POST["answer"]);
$sql = "select * from `choice_answer` where `user_id`=$uid and `ques_id`=$qid";
$mysql = new SaeMysql();
$row1 = $mysql->getLine($sql);
$user_answer = $row1["answer"];
//echo "<br/>";
$sql = "select `score`,`right_answer` from `choice_question` where `id`=$qid";
$row2 = $mysql->getLine($sql);
$score = intval($row2["score"]);
$right_answer = trim($row2["right_answer"]);
if($row1 != false)
{		
	//更新答案操作
	$sql = "update `choice_answer` set `answer`='$post_answer' where `user_id`=$uid and `ques_id`=$qid";
	$mysql->runSql($sql);
	$str = "答案修改成功";
	if($user_answer == $right_answer && $post_answer != $right_answer)
	{	//原答案正确并且现答案错误，则执行减分操作
		$sql = "update `qs_user` set `grade`=`grade`-$score where `id`=$uid";
		$mysql->runSql($sql);
	}
	else if($user_answer != $right_answer && $post_answer == $right_answer)
	{	//原答案错误并且现答案正确，执行加分操作
		$sql = "update `qs_user` set `grade`=`grade`+$score where `id`=$uid";
		$mysql->runSql($sql);	
	}	
}
else
{	
	//插入答案操作
	$sql = "insert into `choice_answer` (`user_id`,`ques_id`,`answer`) values ($uid,$qid,'$post_answer') ";
	$mysql->runSql($sql);
	$str = "答案提交成功";
	if($post_answer == $right_answer && $mysql->errno() == 0)
	{	//提交答案正确，执行加分操作
		$sql = "update `qs_user` set `grade`=`grade`+$score where `id`=$uid";
		$mysql->runSql($sql);
	}
}
if($mysql->errno()==0)
{
	echo $str;
}
$mysql->closeDb();
