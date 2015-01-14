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
        <p class="text-info"><strong>修改选择题题目：</strong><span style="display:none;" id="info">题目</span></p>
        <p>&nbsp;</p><p>&nbsp;</p>
			<form class="form-horizontal" method="post" action="../function/admin/common-action.php?cmd=update-choice&id=<?php echo $id;?>" target="_self">	
			  <input type="hidden" name="id" value="$id">
			  <div class="control-group">
			    <label class="control-label" for="que">题目描述</label>
			    <div class="controls">
			      <textarea id="que" class="span8" cols=3 name="que"><?php echo $row["question"];?></textarea>
			    </div>
			  </div>
			  <div class="control-group">
			    <label class="control-label" for="choiceA">A选项</label>
			    <div class="controls">
			      <textarea id="choiceA" class="span8" cols=3 name="choiceA"><?php echo $row["choiceA"];?></textarea>
			    </div>
			  </div>
			  <div class="control-group">
			    <label class="control-label" for="choiceB">B选项</label>
			    <div class="controls">
			      <textarea id="choiceB" class="span8" cols=3 name="choiceB"><?php echo $row["choiceB"];?></textarea>
			    </div>
			  </div>
			  <div class="control-group">
			    <label class="control-label" for="choiceC">C选项</label>
			    <div class="controls">
			      <textarea id="choiceC" class="span8" cols=3 name="choiceC"><?php echo $row["choiceC"];?></textarea>
			    </div>
			  </div>
			  <div class="control-group">
			    <label class="control-label" for="choiceD">D选项</label>
			    <div class="controls">
			      <textarea id="choiceD" class="span8" cols=3 name="choiceD"><?php echo $row["choiceD"];?></textarea>
			    </div>
			  </div>
			  <div class="control-group">
			    <label class="control-label" for="choiceE">E选项</label>
			    <div class="controls">
			      <textarea id="choiceE" class="span8" cols=3 name="choiceE"><?php echo $row["choiceE"];?></textarea>
			    </div>
			  </div>
			  <div class="control-group">
			    <label class="control-label" for="right_answer">正确选项</label>
			    <div class="controls">
			      <input id="right_answer" type="text" name="right_answer" value="<?php echo $row["right_answer"];?>">
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