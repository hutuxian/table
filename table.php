<html>  
<head>  
<script src="http://code.jquery.com/jquery-latest.js"></script>    
<script src = "showtable.js"></script>
</head> 
<title>欢迎您</title>  
</head>  
<body>  
<h1>欢迎您的到来！</h1>  


<form action="" method = "post">
	选择日期：
	<select name = "ttime">
	<?php
		require_once ("mysql_connect.php");  
		$sql = "select distinct gtime from gtable";
		$result = mysql_query($sql);  
		while($line = mysql_fetch_assoc($result)){
			echo "<option>".$line["gtime"]."</option>";
		}

	?>
	</select>
	选择类型：
	<select name = "ttype">
	<?php
		require_once ("mysql_connect.php");  
		$sql = "select distinct gtype from gtable";
		$result = mysql_query($sql);  
		while($line = mysql_fetch_assoc($result)){
			$tmp = $line["gtype"];
			if($tmp == 1){
				echo "<option>9~12人</option>";
			}else if($tmp == 2){
				echo "<option>5~8人</option>";
			}else if($tmp == 3){
				echo "<option>1~4人</option>";
			}
		}
	?>
	</select>
	<input type = "submit" value = "查询房间"/>
</form>

<?php
	$ttime = $_POST['ttime'];
	$ttype = $_POST['ttype'];
	$up = 12;
	$qtype = 1;
	if($ttype == "5~8人"){
		$up = 8;
		$qtype = 2;
	}else if($ttype == "1~4人"){
		$up = 4;
		$qtype = 3;
	}
	require_once ("mysql_connect.php");  
	$sql = "select id,gnum from gtable where gtype = ".$qtype." && gtime = '".$ttime."'";
	$result = mysql_query($sql);
	$i = 1;
	session_start();
	while($line = mysql_fetch_assoc($result)){
		echo "<div name = ".$line["id"].">";
		echo "房间".$i."剩余空位：".$line["gnum"];
		echo '<input type="button" value="加入该房间" onclick="location.href=\'join.php?gameid='.$line["id"].'\'"/>'; 
		echo "</div>";
		$i ++;
	}
	if($i == 1){
		echo "查询结果为空";
	}

?>
</body>  
</html> 

