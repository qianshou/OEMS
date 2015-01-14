<?php
	if($tag != "koastal")
	exit(0);
?>

 
<?php

	$id = intval($_GET["qid"]);
	$sql = "select `lock`,`grade`,`username`,`school`,`name` from `qs_user` order by `grade` DESC,`username` ASC";

	$mysql = new SaeMysql();
	$rows = $mysql->getData($sql);
	$mysql->closeDb();  

?>

 <div class="jumbotron">
        <div class="content">
            <p class="text-info"><strong>查看考生答题情况：</strong><span style="display:none;" id="info">答题</span></p>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>排名</th>
						<th>状态</th>
						<th>成绩</th>
						<th>考号</th>
						<th>姓名</th>
						<th>学校</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$num = 1;
						foreach ($rows as $row) {
							if($num < 21)
							{
								echo "<tr class=\"success\">";
								echo "<td><span class=\"badge badge-success\">".$num."</span></td>";
							}
							else
							{
								echo "<tr>";
								echo "<td>".$num."</td>";
							}
							$tag = (0==$row["lock"])? "<td><span class=\"label label-warning\">未交卷</td>":"<td><span class=\"label label-important\">已交卷</span></td>";
							echo $tag;
							echo "<td>".$row["grade"]."</td>";
							echo "<td>".$row["username"]."</td>";
							echo "<td>".$row["name"]."</td>";
							echo "<td>".$row["school"]."</td>";
							echo "</tr>";
							$num++;
						}
					?>
				</tbody>
			</table>
        </div>
</div>