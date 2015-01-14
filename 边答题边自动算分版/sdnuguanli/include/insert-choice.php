<?php
	if($tag != "koastal")
	exit(0);
?>

<div class="jumbotron">
        <div class="content">
        <p class="text-info"><strong>添加选择题题目：</strong><span style="display:none;" id="info">题目</span></p>
        <p>&nbsp;</p>
			<form class="form-horizontal" method="post" action="../function/admin/common-action.php?cmd=insert-question" target="_self">	

			  <div class="control-group">
			    <label class="control-label" for="id">题目编号</label>
			    <div class="controls">
			    		<input id="id" type="text" name="id">
			    </div>
			  </div>

			  <div class="control-group">
			    <label class="control-label" for="que">题目描述</label>
			    <div class="controls">
			      <textarea id="que" class="span8" cols=3 name="que"></textarea>
			    </div>
			  </div>
			  <div class="control-group">
			    <label class="control-label" for="choiceA">A选项</label>
			    <div class="controls">
			      <textarea id="choiceA" class="span8" cols=3 name="choiceA"></textarea>
			    </div>
			  </div>
			  <div class="control-group">
			    <label class="control-label" for="choiceB">B选项</label>
			    <div class="controls">
			      <textarea id="choiceB" class="span8" cols=3 name="choiceB"></textarea>
			    </div>
			  </div>
			  <div class="control-group">
			    <label class="control-label" for="choiceC">C选项</label>
			    <div class="controls">
			      <textarea id="choiceC" class="span8" cols=3 name="choiceC"></textarea>
			    </div>
			  </div>
			  <div class="control-group">
			    <label class="control-label" for="choiceD">D选项</label>
			    <div class="controls">
			      <textarea id="choiceD" class="span8" cols=3 name="choiceD"></textarea>
			    </div>
			  </div>
			  <div class="control-group">
			    <label class="control-label" for="choiceE">E选项</label>
			    <div class="controls">
			      <textarea id="choiceE" class="span8" cols=3 name="choiceE"></textarea>
			    </div>
			  </div>
			  <div class="control-group">
			    <label class="control-label" for="right_answer">正确选项</label>
			    <div class="controls">
			      <input id="right_answer" type="text" name="right_answer">
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