<?php  
// 连接服务器，并且选择test数据库

$db = mysql_connect("127.0.0.1","root","1210")
	or die("连接数据库失败！");
	
mysql_select_db("htj")
	or die ("不能连接到user".mysql_error());
	
//echo "mysql_connect succeed!";      
?>  
