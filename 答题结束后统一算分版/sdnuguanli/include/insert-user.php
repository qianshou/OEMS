<?php
	if($tag != "koastal")
	exit(0);
?>


 <div class="jumbotron">
        <div class="content">
        <p class="text-info" ><strong>添加考生：</strong><span style="display:none;" id="info">考生</span></p>
        <p>&nbsp;</p><p>&nbsp;</p>
			<form class="form-horizontal" method="post" action="../function/admin/common-action.php?cmd=insert-user" target="_self">
			  <div class="control-group">
			    <label class="control-label" for="school">学校</label>
			    <div class="controls">
			      <input type="text" id="school" name="school">
			    </div>
			  </div>
			 
			  <div class="control-group">
			    <label class="control-label" for="name">姓名</label>
			    <div class="controls">
			      <input type="text" id="name" name="name">
			    </div>
			  </div>

              <div class="control-group">
			    <label class="control-label" for="username">考号</label>
			    <div class="controls">
			      <input type="text" id="username" name="username">
			    </div>
			  </div>
			  <div class="control-group">
			    <label class="control-label" for="inputPassword">密码</label>
			    <div class="controls">
			      <input type="text" id="inputPassword" name="password">
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