<?php
	if($tag != "koastal")
	exit(0);
?>

 <div class="jumbotron">
        <div class="content">
        <p class="text-info"><strong>添加判断题题目：</strong><span style="display:none;" id="info">题目</span></p>
        <p>&nbsp;</p><p>&nbsp;</p>
			<form class="form-horizontal" method="post" action="../function/admin/common-action.php?cmd=insert-judge" target="_self">	

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
			  <label class="control-label" >正确答案</label>
			   <div class="controls">
			    <label class="radio inline">
					<input type="radio" name="right_answer" id="first" value="1">
				     <span class="span2">正确</span>
				</label>
				<label class="radio inline">
				    <input type="radio" name="right_answer" id="second" value="0">
				     <span class="span2">错误</span>
				</label>
				</div>
			  </div>
			  <div class="control-group" style="margin-top:50px">
			    <div class="controls">
			      <button type="submit" class="btn">提交</button>
			      <span style="display:inline-block;width:80px"></span>
			      <button type="reset" class="btn">重置</button>
			    </div>
			  </div>
			</form>
        </div>
</div> 