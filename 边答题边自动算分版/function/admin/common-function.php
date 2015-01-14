<?php
function check_admin()
{
    if(isset($_COOKIE["admin_id"])&&isset($_COOKIE["admin_username"])&&isset($_COOKIE["admin_key"]))
    {
	 	$id = intval($_COOKIE["admin_id"]);

		$mysql = new SaeMysql();
		$sql = "select * from `qs_admin` where `id`=$id";
		$row = $mysql->getLine($sql);
		$mysql->closeDb();
        if(3 == count($row))
        {
			$admin_username = $row["username"];
		    $admin_key = md5($row["password"].$admin_username);
		    if($_COOKIE["admin_key"] == $admin_key)
		    {
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