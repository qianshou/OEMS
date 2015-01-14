<?php
	if($tag != "koastal")
	exit(0);
?>


 <?php

$sql = "select `start_time`,`end_time` from `config` where `id`=1";

$mysql = new SaeMysql();
$row = $mysql->getLine($sql);
$mysql->closeDb();  

?>

 <div class="jumbotron">
        <div class="content">
        <p class="text-info"><strong>考试时间：</strong><span style="display:none;" id="info">时间</span></p>
        <p style="display:block;margin-left:70px;"><span class="text-info">考试开始时间：</span><?php echo $row["start_time"];?></p>
        <p style="display:block;margin-left:70px;"><span class="text-info">考试结束时间：</span><?php echo $row["end_time"];?></p>
        <p>&nbsp;</p>
        <p class="text-warning"><strong>重设考试时间：</strong></p>
			<form class="form-horizontal" method="post" action="../function/admin/common-action.php?cmd=set-time" target="_self">
			  <div class="control-group">
			    <label class="control-label" for="start_time">考试开始时间：</label>
			    <div class="controls">
			      <input type="text" id="start_time" name="start_time" value="<?php echo $row["start_time"];?>">
			    </div>
			  </div>
			  <div class="control-group">
			    <label class="control-label" for="end_time">考试结束时间：</label>
			    <div class="controls">
			      <input type="text" id="end_time" name="end_time" value="<?php echo $row["end_time"];?>">
			    </div>
			  </div>
			  <div class="control-group">
			    <div class="controls">
			      <button type="submit" class="btn">提交</button>
			      <span style="display:inline-block;width:80px"></span>
			      <button type="reset" class="btn">重置</button>
			    </div>
			  </div>
			</form>
        </div>
</div>