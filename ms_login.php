<?php  
//从test数据库中提取数据  
  
function collect_data(){  
	require_once ("mysql_connect.php");  
	$sql = "select username,pwd from user";  
	$result = mysql_query($sql);  
	return $result;  
}  
  
?>  

