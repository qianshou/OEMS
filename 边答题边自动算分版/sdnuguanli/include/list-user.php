<?php
	if($tag != "koastal")
	exit(0);
?>


 <div class="jumbotron">
        <div class="content">
        <p class="text-info" ><strong>查看考生：</strong><span style="display:none;" id="info">考生</span></p>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>序号</th>
						<th>状态</th>
                        <th>学校</th>
                        <th>姓名</th>
						<th>考号</th>
						<th>修改</th>
						<th>删除</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$mysql = new SaeMysql();
						$sql = "select `id`,`lock`,`school`,`name`,`username` from `qs_user`";
						$rows = $mysql->getData($sql);
						$mysql->closeDb();  
						foreach ($rows as $row ) {
							echo "<tr>";
							echo "<td>".$row["id"]."</td>";
							$tag = (0==$row["lock"])? "<td><span class=\"label label-warning\">未交卷</td>":"<td><span class=\"label label-important\">已交卷</span></td>";
							echo $tag;
							echo "<td>".$row["school"]."</td>";
							echo "<td>".$row["name"]."</td>";
							echo "<td>".$row["username"]."</td>";
							echo "<td><a class=\"btn btn-primary\" href=\"./index.php?id=4&uid=".$row["id"]."\">修改</a></td>";
							echo "<td><a class=\"btn btn-danger\" href=\"../function/admin/common-action.php?cmd=delete-user&id=".$row["id"]."\">删除</a></td>";
							echo "</tr>";
						}
					?>
				</tbody>
			</table>
        </div>
</div>