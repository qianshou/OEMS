<?php
	if($tag != "koastal")
	exit(0);
?>

 
 <?php

	$id = intval($_GET["qid"]);
	$sql = "select * from `choice_question` where `id`=$id";

	$mysql = new SaeMysql();
	$row = $mysql->getLine($sql);
	$mysql->closeDb();  

?>


 <div class="jumbotron">
        <div class="content">
        <p class="text-info"><strong>查看选择题题目：</strong><span style="display:none;" id="info">题目</span></p>
        <p>&nbsp;</p><p>&nbsp;</p>
			<table class="table table-hover">
				<tr><td>题目编号：</td><td><?php echo $row["id"];?></td></tr>
				<tr><td>题目描述：</td><td><?php echo $row["question"];?></td></tr>
				<tr><td>A选项：</td><td><?php echo $row["choiceA"];?></td></tr>
				<tr><td>B选项：</td><td><?php echo $row["choiceB"];?></td></tr>
				<tr><td>C选项：</td><td><?php echo $row["choiceC"];?></td></tr>
				<tr><td>D选项：</td><td><?php echo $row["choiceD"];?></td></tr>
				<tr><td>E选项：</td><td><?php echo $row["choiceE"];?></td></tr>
				<tr><td>正确答案：</td><td><?php echo $row["right_answer"];?></td></tr>	
			</table>
        </div>
</div> 