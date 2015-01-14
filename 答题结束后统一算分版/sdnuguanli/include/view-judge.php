<?php
	if($tag != "koastal")
	exit(0);
?>

 
 <?php

	$id = intval($_GET["qid"]);
	$sql = "select * from `judge_question` where `id`=$id";

	$mysql = new SaeMysql();
	$row = $mysql->getLine($sql);
	$mysql->closeDb();  

	$right_answer = ($row["right_answer"]==0)? "错误":"正确";
?>


 <div class="jumbotron">
        <div class="content">
        <p class="text-info"><strong>查看判断题题目：</strong><span style="display:none;" id="info">题目</span></p>
        <p>&nbsp;</p><p>&nbsp;</p>
			<table class="table table-hover">
				<tr><td class="span2">题目编号：</td><td><?php echo $row["id"];?></td></tr>
				<tr><td class="span2">题目描述：</td><td><?php echo $row["question"];?></td></tr>
				<tr><td class="span2">正确答案：</td><td><?php echo $right_answer;?></td></tr>	
			</table>
        </div>
</div> 