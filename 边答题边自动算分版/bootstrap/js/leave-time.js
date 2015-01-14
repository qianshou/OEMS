
function CountDown(){  
	if(maxtime>=0){   
	  minutes = Math.floor(maxtime/60);   
	  seconds = Math.floor(maxtime%60);   
	  msg = "<strong>距离考试结束还有"+minutes+"分"+seconds+"秒</strong><br/>（该时间仅供参考，以服务器时间为准）";   
	  document.all["leave_time"].innerHTML=msg;
	  --maxtime;   
	}   
	else{   
	  clearInterval(timer);   
	}   
}   

function oes_time(start_time,end_time)
{
	var date1 = Date.parse(start_time.replace(/-/g,"/"));
	var date2 = Date.parse(end_time.replace(/-/g,"/"));
	var now = new Date();
	if(now < date1)
	{
	     msg = "本场考试尚未开始";   
	     document.all["leave_time"].innerHTML=msg;
	}
	else if(now > date2)
	{
		msg = "本场考试已经结束";   
	    document.all["leave_time"].innerHTML=msg;
	}
	else if(now>date1 && now<date2)
	{
		var leave_seconds = Math.floor((date2-now.getTime())/1000);
		maxtime = leave_seconds; //单位是秒  
		timer = setInterval("CountDown()",1000);   
	}
}

