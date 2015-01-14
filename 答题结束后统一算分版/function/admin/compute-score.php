<?php

require_once("../../config/saemysql.class.php");


for($uid=1;$uid<100;$uid++){	
	$grade = 0;
	//选择题部分
	$mysql = new SaeMysql();
	$sql = "select sum(`score`) as `choice_score` from `choice_answer`,`choice_question` where `ques_id`=`choice_question`.`id` and trim(`right_answer`)=trim(`answer`) and `user_id`=$uid; ";
	$row = $mysql->getLine($sql);
	$grade += $row["choice_score"];
	$mysql->closeDb();
	//判断题部分
	$mysql = new SaeMysql();
	$sql = "select sum(`score`) as `judge_score` from `judge_answer`,`judge_question` where `ques_id`=`judge_question`.`id` and `right_answer`=`answer` and `user_id`=$uid; ";
	$row = $mysql->getLine($sql);
	$grade += $row["judge_score"];
	$mysql->closeDb();
	//修改考生的分数
	$mysql = new SaeMysql();
	$sql = "update `qs_user` set `grade`=$grade where `id`=$uid";
	$mysql->runSql($sql);
	$mysql->closeDb();
}
?>
<script type="text/javascript">
	alert('successfully to update grades');
	window.location.href="../../sdnuguanli/index.php";
</script>
