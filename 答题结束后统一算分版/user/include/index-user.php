<?php
	if("koastal" != $tag)
	{
		exit(0);
	}
?>
 <?php

	$id = intval($_COOKIE["user_id"]);
	$sql = "select * from `qs_user` where `id`=$id";

	$mysql = new SaeMysql();
	$row = $mysql->getLine($sql);
	$mysql->closeDb();  
?>


<!-- Jumbotron -->
<div class="jumbotron">
	<div class="content">
	<p class="lead text-info"><strong>先确认个人信息，然后开始答题</strong><span style="display:none;" id="info">考试细则</span></p>
	
	<table class="table table-hover">
			<tr class="info"><td class="span2" style="text-align:center;">个人信息：</td></tr>
			<tr><td class="span2" style="text-align:center;">学&nbsp;&nbsp;&nbsp;&nbsp;校：</td><td><?php echo htmlspecialchars($row["school"]);?></td></tr>
			<tr><td class="span2" style="text-align:center;">姓&nbsp;&nbsp;&nbsp;&nbsp;名：</td><td><?php echo htmlspecialchars($row["name"]);?></td></tr>
			<tr><td class="span2" style="text-align:center;">考&nbsp;&nbsp;&nbsp;&nbsp;号：</td><td><?php echo htmlspecialchars($row["username"]);?></td></tr>
			<tr><td class="span2">&nbsp;</td><td>&nbsp;</td></tr>
			<tr class="warning"><td class="span2" style="text-align:center;color:red;">重要提示：</td><td>确认上述信息正确之后，点击菜单栏的“选择题”和“判断题”进行答题。答题结束，点击“提交试卷”进行提交。</td></tr>
	</table>	
	</div>
</div>