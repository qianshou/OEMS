<?php
	if("koastal" != $tag)
	{
		exit(0);
	}
?>
 <?php
 
	$uid = intval($_COOKIE["user_id"]);
	$fid = intval($_GET["fid"]);
	if($fid<1 || $fid >40)
	{
		echo "invalid $qid";
		exit(0);
	}


	$num = 40;	//注意这里需要修改
	$qid = ($fid+$uid)%$num+1;


    $sql = "select `answer` from `choice_answer` where  `choice_answer`.`user_id`=$uid and `choice_answer`.`ques_id` = $qid";
	$mysql = new SaeMysql();
	$rowa = $mysql->getLine($sql);
	$mysql->closeDb(); 
	$answer = $rowa["answer"];

	$sql = "select `question`,`choiceA`,`choiceB`,`choiceC`,`choiceD`,`choiceE` from `choice_question` where `id`=$qid";
	$mysql = new SaeMysql();
	$row = $mysql->getLine($sql);
	$mysql->closeDb(); 
?>

<script type="text/javascript">
	$(window).load(function() {
        var user_answer = "<?php echo $answer;?>";
        var answer_length = user_answer.length;
        for(var i = 0; i < answer_length; i++){
      		$("#"+user_answer[i]).attr('checked', 'checked');
        }
      });
	function commit_choice()
	{
 		var qid = document.getElementById("qid").value;  
        var str = document.getElementsByName("multicheck");   
        var answer = "";  
        for(var i=0;i<str.length;i++)  
        {  
            if(str[i].checked == true)   
            {   
                answer += str[i].value;   
            }   
        } 
        if(answer == "")alert('请勾选答案，然后提交');  
        else  
        {   //用户勾选了相关答案，进行相关处理  
           var xmlhttp;
			if (window.XMLHttpRequest)
			  {// code for IE7+, Firefox, Chrome, Opera, Safari
			  	xmlhttp=new XMLHttpRequest();
			  }
			else
			  {// code for IE6, IE5
			  	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
 			 }
            xmlhttp.open("POST","../function/user/commit-choice.php",true);  
            xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");  
            xmlhttp.send("qid="+qid+"&answer="+answer);  
  
            xmlhttp.onreadystatechange=function()  
	        {  
	          if (xmlhttp.readyState==4 && xmlhttp.status==200)  
	            {  
	                document.getElementById("result").innerHTML=xmlhttp.responseText;  
	            }  
	        };  
        }  
  
         return false;  
	}
</script>


<!-- Jumbotron -->
<div class="jumbotron">
	<div class="content">
	<p class="list_lead text-info"><strong>不定项选择题：第<?php echo $fid;?>题</strong><span style="display:none;" id="info">选择题</span></p>
	
	<p><?php echo $row["question"];?></p>
	<form class="form-horizontal" onsubmit="return commit_choice()" >
			  <input type="hidden" id="qid" value="<?php echo $qid;?>">
			  <div class="control-group">
			    <label class="checkbox">
				  <input type="checkbox" name="multicheck"  value="A" id="A" >
				  <p>选项A:<span style="display:inline-block;width:50px;">&nbsp;</span><?php echo $row["choiceA"];?></p>
				</label>
			  </div>
			  
			  <div class="control-group">
			    <label class="checkbox">
				  <input type="checkbox" name="multicheck"  value="B" id="B" >
				  <p>选项B:<span style="display:inline-block;width:50px;">&nbsp;</span><?php echo $row["choiceB"];?></p>
				</label>
			  </div>
			  
			  <div class="control-group">
			    <label class="checkbox">
				  <input type="checkbox" name="multicheck"  value="C"  id="C">
				  <p>选项C:<span style="display:inline-block;width:50px;">&nbsp;</span><?php echo $row["choiceC"];?></p>
				</label>
			  </div>
			  
			  <div class="control-group">
			    <label class="checkbox">
				  <input type="checkbox" name="multicheck"  value="D"  id="D">
				  <p>选项D:<span style="display:inline-block;width:50px;">&nbsp;</span><?php echo $row["choiceD"];?></p>
				</label>
			  </div>
<?php if($row["choiceE"] != ""){ ?>
			  <div class="control-group">
			    <label class="checkbox">
				  <input type="checkbox" name="multicheck"  value="E"  id="E">
				  <p>选项E:<span style="display:inline-block;width:50px;">&nbsp;</span><?php echo $row["choiceE"];?></p>
				</label>
			  </div>
<?php } ?>
			  <div class="control-group">
			    <div class="controls" style="margin-left:30px">
			      <button type="submit" class="btn btn-primary">&nbsp;提&nbsp;&nbsp;交&nbsp;</button><span id="result" style="display:inline-block;margin-left:100px;width=100px;" class="text-info"></span>
			    </div>
			  </div>
			</form>
<div class="container" style="width:300px;margin-left:10px;">
		<ul class="pager">
		 <?php 
			if(1 == $fid)
			{
				echo  "<li class=\"previous disabled\">";
				echo  "<a href=\"#\">&lt;&lt; 上一题</a>";
				echo "</li>";
			}
			else
			{
				echo  "<li class=\"previous\">";
				echo  "<a href=\"./index.php?id=11&fid=".($fid-1)."\">&lt;&lt; 上一题</a>";
				echo "</li>";
			}
		?>
		<?php
			if(40 == $fid)
			{
				echo  "<li class=\"nexe\">";
				echo  "<a href=\"./index.php?id=22&fid=1\">判断题 &gt;&gt;</a>";
				echo "</li>";
			}
			else
			{
				echo  "<li class=\"next\">";
				echo  "<a href=\"./index.php?id=11&fid=".($fid+1)."\">下一题 &gt;&gt;</a>";
				echo "</li>";
			}
		?>
		</ul>
</div>

	</div>
</div>