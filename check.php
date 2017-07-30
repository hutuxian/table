<?php  
session_start();
require_once("ms_login.php");  
//require_once ("mysql_connect.php");  
$name=$_POST['name'];  
$password=$_POST['password'];  
if($name == ""){
	echo "请填写用户名<br>";
	echo"<script type='text/javascript'>alert('请填写用户名');
		location='login.php';
	</script>";			       
}
else if($password == ""){
	//echo "请填写密码<br><a href='login.php'>返回</a>";
	echo"<script type='text/javascript'>alert('请填写密码');location='login.php';</script>";          
}  
else{
	require_once ("mysql_connect.php");  
	$sql = "select id,pwd from user where username = '$name'";  
	$result = mysql_query($sql);  

	if(mysql_num_rows($result) == 1){
		$row = mysql_fetch_assoc($result);
		if ($row["pwd"] == $password){
			//echo "验证成功！<br>";
			$_SESSION['uid'] = $row["id"];
			$_SESSION['username'] = $name;
			echo"<script type='text/javascript'>alert('登陆成功');location='table.php';</script>";  
		}else{
			//echo "密码错误<br>";
			echo"<script type='text/javascript'>alert('密码错误');location='login.html';</script>";  
		}
	}
	else {
		echo "the username is error";
		echo"<script type='text/javascript'>alert('密码错误');location='login.html';</script>";  
	}
	//echo "<a href='login.php'>返回</a>";  
		        
}  
?>  
