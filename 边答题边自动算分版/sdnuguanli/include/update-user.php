<?php
	if($tag != "koastal")
	exit(0);
?>


 <?php

	$id = intval($_GET["uid"]);
	$sql = "select `school`,`name`,`username`,`password`,`lock` from `qs_user` where `id`=$id";

	$mysql = new SaeMysql();
	$row = $mysql->getLine($sql);
	$mysql->closeDb();  

?>

 <div class="jumbotron">
        <div class="content">
        <p class="text-info"><strong>修改考生信息:</strong><span style="display:none;" id="info">考生</span></p>
        <p>&nbsp;</p><p>&nbsp;</p>
			<form class="form-horizontal" method="post" action="../function/admin/common-action.php?cmd=update-user" target="_self">
			  <input type="hidden" name="id" value="<?php echo $id;?>">
              <div class="control-group">
			    <label class="control-label" for="school">学校</label>
			    <div class="controls">
			      <input type="text" id="school" name="school"  value="<?php echo $row["school"];?>">
			    </div>
			  </div>
			  <div class="control-group">
			    <label class="control-label" for="name">姓名</label>
			    <div class="controls">
			      <input type="text" id="name" name="name"  value="<?php echo $row["name"];?>">
			    </div>
			  </div>
              <div class="control-group">
			    <label class="control-label" for="username">考号</label>
			    <div class="controls">
			      <input type="text" id="username" name="username" value="<?php echo $row["username"];?>">
			    </div>
			  </div>
			  <div class="control-group">
			    <label class="control-label" for="inputPassword">密码</label>
			    <div class="controls">
			      <input type="text" id="inputPassword" name="password" value="<?php echo $row["password"]; ?>">
			    </div>
			  </div>
              <div class="control-group">
			    <label class="control-label" for="lock">交卷状态</label>
			    <div class="controls">
			      <input type="text" id="lock" name="lock"  value="<?php echo $row["lock"];?>">
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