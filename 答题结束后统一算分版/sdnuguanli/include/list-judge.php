<?php
	if($tag != "koastal")
	exit(0);
?>


<?php require_once("../function/admin/common-function.php");?>
 <div class="jumbotron">
        <div class="content">
        <p class="text-info" ><strong>查看判断题题目：</strong><span style="display:none;" id="info">题目</span></p>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>题目编号</th>
						<th>描述</th>
						<th>正确答案</th>
						<th>查看</th>
						<th>修改</th>
						<th>删除</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$mysql = new SaeMysql();
						$sql = "select `id`,`question`,`right_answer` from `judge_question` order by `id` DESC";

						$rows = $mysql->getData($sql);
						$mysql->closeDb();  
	                   // print_r($rows);

						foreach ($rows as $row ) {

							$right_answer = ($row["right_answer"]==0)? "错误":"正确";
							echo "<tr>";
							echo "<td>".$row["id"]."</td>";
							echo "<td>".substr_cut($row["question"],70)."</td>";
							echo "<td><code>".$right_answer."</code></td>";
							echo "<td><a class=\"btn btn-info\" href=\"./index.php?id=27&qid=".$row["id"]."\">查看</a></td>";
							echo "<td><a class=\"btn btn-primary\" href=\"./index.php?id=28&qid=".$row["id"]."\">修改</a></td>";
							echo "<td><a class=\"btn btn-danger\" href=\"../function/admin/common-action.php?cmd=delete-judge&id=".$row["id"]."\">删除</a></td>";						
							echo "</tr>";
						}
					?>
				</tbody>
			</table>
        </div>
</div>