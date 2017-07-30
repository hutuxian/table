<?php  
session_start();
$userid = $_SESSION['uid'];
$username = $_SESSION['username'];
$tableid = $_GET['gameid'];


	require_once ("mysql_connect.php");  
	$sql = "select * from game where tableid = ".$tableid." && userid = '".$userid."'";
	$result = mysql_query($sql);
	if(mysql_num_rows($result) > 0){
		echo "您已经加入该桌，无需重复加入";
		//echo"<a href='register.php'>返回</a>";
		echo"<script type='text/javascript'>alert('无需重复加入');location='table.php';</script>";  
	}else{
		$sql = "select gnum from gtable where id = ".$tableid;
		$tmpnum = mysql_fetch_assoc(mysql_query($sql))["gnum"];
		echo $tmpnum;
		if($tmpnum == 0){
			echo "无空位";
			//echo"<a href='register.php'>返回</a>";
			echo"<script type='text/javascript'>alert('无空位');location='table.php';</script>";  
		}
		$insertsql="insert into game (tableid,userid,username) values (".$tableid.",".$userid.",".$username.")";
		$result = mysql_query($insertsql);
		$changesql = "update gtable set gnum=gnum-1 where id = ".$tableid;
		mysql_query($changesql);
		echo"<script type='text/javascript'>alert('预订成功');location='table.php';</script>";  
	}
?>
