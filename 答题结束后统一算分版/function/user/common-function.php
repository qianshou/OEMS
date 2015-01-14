<?php

function check_user()
{
    if(isset($_COOKIE["user_id"])&&isset($_COOKIE["user_username"])&&isset($_COOKIE["user_key"]))
    {
	 	if($_COOKIE["user_key"]==md5($_COOKIE["user_id"]."gxdr".$_COOKIE["user_username"])){
	 		return true;
	 	}
	 	else
	 	{
	 		return false;
	 	}

    }
    else
    {
    	return false;
    }
}

function substr_cut($str,$len)
{
	for($i=0;$i<$len;$i++)
	{
		$temp_str=substr($str,0,1);
		if(ord($temp_str) > 127)
		{
			$i++;
			if($i<$len)
			{
				$new_str[]=substr($str,0,3);
				$str=substr($str,3);
			}
		}
		else
		{
			$new_str[]=substr($str,0,1);
			$str=substr($str,1);
		}
	}
	return join($new_str);
}