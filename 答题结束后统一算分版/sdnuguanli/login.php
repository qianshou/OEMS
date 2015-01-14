<?php require_once("../common/admin/common-head.php");?>

      </div>


      <!-- Jumbotron -->
      <div class="jumbotron offset2">
        <form class="form-horizontal" action="../function/admin/common-action.php?cmd=login-judge" method="post" target="_self">
          <div class="control-group">
            <label class="control-label" for="username">管理员账户</label>
            <div class="controls">
              <input type="text" id="username" name="username" >
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="password">管理员密码</label>
            <div class="controls">
              <input type="password" id="password" name="password">
            </div>
          </div>
          <div class="control-group">
            <div class="controls">
              <button type="submit" class="btn btn-success" name="login">登&nbsp;&nbsp;陆</button>
              <span style="display:inline-block;width:80px"></span>
              <button type="reset" class="btn btn-primary" name="reset">重&nbsp;&nbsp;置</button>
            </div>
          </div>
        </form>
      </div>

      <hr>

    <?php require_once("../common/admin/common-footer.php");?>

    </div> <!-- /container -->



   
  </body>
</html>
