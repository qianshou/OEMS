<?php
	if("koastal" != $tag)
	{
		exit(0);
	}
?>
 <?php
	require_once("../function/user/common-function.php");

	$uid = intval($_COOKIE["user_id"]);
?>


<!-- Jumbotron -->
<div class="jumbotron">
	<div class="content">
	<p class="list_lead text-info"><strong>答题情况</strong>(绿色为已做答，黄色为未作答)<span style="display:none;" id="info">答题情况</span></p>
	
	<table class="table table-hover">
				<tr class="info"><td class="span2" style="text-align:center;">不定项选择题：</td></tr>
				<?php
					$mysql = new SaeMysql();
					$num = 13;
					$sql = "select (`choice_question`.`id`-2-$uid+30*$num)%$num+1 as `fid`,`choice_answer`.`user_id` from `choice_question` left outer join `choice_answer` on `choice_answer`.`ques_id`=`choice_question`.`id` and `user_id`=$uid order by `fid` ASC";
					$rows = $mysql->getData($sql);
					echo "<tr>";
					$i = 1;
					foreach ($rows as $row) {
						if($row["user_id"] == $uid)
						{
							if($i<10){
								echo "<td style=\"text-align:center;\"><a href=\"./index.php?id=11&fid=".$row["fid"]."\"><span class=\"badge badge-success\">0".$row["fid"]."</span></a></td>";
							}else{
								echo "<td style=\"text-align:center;\"><a href=\"./index.php?id=11&fid=".$row["fid"]."\"><span class=\"badge badge-success\">".$row["fid"]."</span></a></td>";
							}
						}
						else if($row["user_id"] == NULL)
						{
							if($i<10){
								echo "<td style=\"text-align:center;\"><a href=\"./index.php?id=11&fid=".$row["fid"]."\"><span class=\"badge badge-warning\">0".$row["fid"]."</span></a></td>";
							}else{
								echo "<td style=\"text-align:center;\"><a href=\"./index.php?id=11&fid=".$row["fid"]."\"><span class=\"badge badge-warning\">".$row["fid"]."</span></a></td>";

							}
						}
						if($i%10 == 0)
						{
							echo "<tr/><tr>";
						}
						$i++;
					}
				?>
				</tr>
			</tbody>
	</table>	
	</div>
</div>