<?php

class SaeMysql
{    


    function __construct()
    {
      
        $this->db_host="localhost";                                             //连接的服务器地址
        $this->db_user="root";                                                  //连接数据库的用户名
        $this->db_psw="gxdr_521";                                                  //连接数据库的密码
        $this->db_name="app_collegeoes";                                             //连接的数据库名称

        $this->conn = mysql_connect($this->db_host, $this->db_user,$this->db_psw);

        mysql_select_db($this->db_name,$this->conn);
        $sql = "set names utf8";  
        mysql_query($sql,$this->conn);
    }
 
    public function get_data( $sql )
    {
        $data = Array();
        $i = 0;
        $result = mysql_query( $sql ,$this->conn);
 
        if (is_bool($result)) {
            return $result;
        } else {
            while( $Array = mysql_fetch_assoc( $result) )
            {
                $data[$i++] = $Array;
            }
        }
 
        if( count( $data ) > 0 )
            return $data;
        else
            return NULL;    
    }
	
	public function getData( $sql )
    {
        return $this->get_data( $sql );
    }

	public function getLine( $sql )
    {
         $data = $this->get_data( $sql );
        if ($data) {
            return @reset($data);
        } else {
            return false;
        }
    }

    public function runSql($sql)
    {
        $ret = mysql_query( $sql,$this->conn);

        return $ret;
    }
    
    public function errno(){
        return mysql_errno($this->conn);
    }

    public function closeDb()
    {
        mysql_close($this->conn);
    }
};