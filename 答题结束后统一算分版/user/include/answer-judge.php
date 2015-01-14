<?php
	if("koastal" != $tag)
	{
		exit(0);
	}
?>
 <?php

	$uid = intval($_COOKIE["user_id"]);
	$fid = intval($_GET["fid"]);
	if($fid<1 || $fid >20)
	{
		echo "invalid $qid";
		exit(0);
	}


	$num = 20;	//注意这里需要修改
	$qid = ($fid+$uid)%$num+1;

    $sql = "select * from `judge_answer` where `user_id`=$uid and `ques_id` = $qid";
	$mysql = new SaeMysql();
	$rowa = $mysql->getLine($sql);
	$mysql->closeDb();  

	$sql = "select `question` from `judge_question` where `id`=$qid";
	$mysql = new SaeMysql();
	$row = $mysql->getLine($sql);
	$mysql->closeDb();  

?>

<?php 

if($rowa != false)
{
	$answer = ($rowa["answer"]==1)? "first":"second";
?>
<script type="text/javascript">
	$(window).load(function() {
    	var user_answer = "<?php echo $answer;?>";
  		$("#"+user_answer).attr('checked', 'checked');
  });             
</script>	
<?php
}
?>

<script type="text/javascript">

	function commit_judge()
	{
 		var qid = document.getElementById("qid").value;  
        var obj = document.getElementsByName("radio");  
        var tag = 0;
        for(var i=0; i<obj.length; i++){
        	if(obj[i].checked){
           	 	answer = obj[i].value;
           	 	tag = 1; 
        	}
    	} 
    	if(tag == 0)
    	{
    		alert("请勾选答案，然后提交");
    		return false;
    	}
	  //用户勾选了相关答案，进行相关处理  
       	var xmlhttp;
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  	xmlhttp=new XMLHttpRequest();
		  }
		else
		{// code for IE6, IE5
		  	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		 }
        xmlhttp.open("POST","../function/user/commit-judge.php",true);  
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");  
        xmlhttp.send("qid="+qid+"&answer="+answer);  

        xmlhttp.onreadystatechange=function()  
        {  
          if (xmlhttp.readyState==4 && xmlhttp.status==200)  
            {  
                document.getElementById("result").innerHTML=xmlhttp.responseText;  
            }  
        };  
  
         return false;  
	}
</script>

<!-- Jumbotron -->
<div class="jumbotron">
	<div class="content">
	<p class="list_lead text-info"><strong>判断题：第<?php echo ($fid+40);?>题</strong><span style="display:none;" id="info">判断题</span></p>
	
	<p style="display:block;margin-top:80px"><?php echo $row["question"];?></p>
	<form class="form-horizontal" onsubmit="return commit_judge()">
			   <input type="hidden" id="qid" value="<?php echo $qid;?>">
			  <div class="control-group" style="margin-top:50px;margin-bottom:50px">
				<label class="radio inline">
					<input type="radio" name="radio" id="first" value="1" >
				     <span class="span2">正确</span>
				</label>
				<label class="radio inline">
				    <input type="radio" name="radio" id="second" value="0" >
				     <span class="span2">错误</span>
				</label>
			  </div>
			  
			  <div class="control-group">
			    <div class="controls" style="margin-left:30px">
			      <button type="submit" class="btn btn-primary">&nbsp;提&nbsp;&nbsp;交&nbsp;</button><span id="result" style="display:inline-block;margin-left:100px;width=100px;" class="text-info"></span>
			    </div>
			  </div>
	</form>
	<div class="container" style="width:300px;margin-left:10px;">
			<ul class="pager">

			 <?php 
			 //这里需要修改
				if(1 == $fid)
				{
					echo  "<li class=\"previous\">";
					echo  "<a href=\"./index.php?id=11&fid=50\">&lt;&lt; 选择题</a>";
					echo "</li>";
				}
				else
				{
					echo  "<li class=\"previous\">";
					echo  "<a href=\"./index.php?id=22&fid=".($fid-1)."\">&lt;&lt; 上一题</a>";
					echo "</li>";
				}
			?>
			<?php
				if(20 == $fid)
				{
					echo  "<li class=\"nexe disabled\">";
					echo  "<a href=\"#\">后面没有题目了</a>";
					echo "</li>";
				}
				else
				{
					echo  "<li class=\"next\">";
					echo  "<a href=\"./index.php?id=22&fid=".($fid+1)."\">下一题 &gt;&gt;</a>";
					echo "</li>";
				}
			?>
			</ul>
			</div>
	</div>
</div>