<!--用户信息更改执行页面 根据不同指令执行sql语句实现用户信息的增删改功能-->
<?php
session_start();
header("Content-Type: text/html;charset=utf-8");
//1、导入配置文件
require('../public/config.php');
//2、连接数据库并判断
$link = mysqli_connect(HOST,USER,PASS);
if (!$link) {  
	die('Could not connect to MySQL: ' . mysqli_error()); 
}
//3、选择数据库并设置字符集
mysqli_select_db($link,DBNAME);
mysqli_set_charset($link,'utf-8');
//接受传过来的参数并执行相应的操作

switch($_GET['a']){	
	case 'informalt'://执行用户修改
		//接受form的数据
		$realname = $_POST['realname'];
		$birthdate = $_POST['birthdate'];
		$sex = $_POST['sex'];
	//4、定义sql语句
		$sql = "update users set realname = '{$realname}',birthdate = '{$birthdate}',sex = '{$sex}'where id = {$_SESSION['user']['id']};";
		//$sql = "update books set bookname = '{$bookname}' ,writer = '{$writer}', chubanshe = '{$chubanshe}', ISBN = '{$ISBN}', price = '{$price}', reserve = '{$reserve}',price = '{$price}' ,addtime = now(), details = '{$details}', state = '{$state}' where id = '{$id}';";
		$result = mysqli_query($link,$sql);
		if(mysqli_affected_rows($link)>=0){
			$sql1 = "select * from users where id = {$_SESSION['user']['id']}";
			$result1 = mysqli_query($link,$sql1);
			$user = mysqli_fetch_assoc($result1);
			$_SESSION["user"] = $user;
			echo"<script>alert('修改成功');</script>";
			echo "<script>self.location.href='mygrxx.php'</script>";
		}	
		else{
			echo "修改失败";
		}
		break;
}			
//关闭数据库
mysqli_close($link);
?>