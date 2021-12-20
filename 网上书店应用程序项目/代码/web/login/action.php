<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
if($_GET['a']=='logout'){
	unset($_SESSIONS['user']);
	echo '<script>alert("成功退出，请重新登录！");</script>';
	header("Refresh:1,Url=user_login.php");
}
//接受form的数据
$name = $_POST['name'];
$pass = $_POST['password'];
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
	case 'userlogin'://执行登录
		//4、定义sql语句
		$sql = "select * from users where name ='{$name}'";
		$result = mysqli_query($link,$sql);
		if(mysqli_num_rows($result)>0){
			$user = mysqli_fetch_assoc($result);
			//var_dump($user);
			//exit;
			if($user['password'] == $pass){
				//把用户名存到session里
				$_SESSION["user"] = $user;
				header("Location:../reception");
			}else{
				echo '<script>alert("密码错误");</script>';
				header('Refresh:1,Url=user_login.php');
			}
		}else{
			echo '<script>alert("用户名错误");</script>';
			header('Refresh:1,Url=user_login.php');
		}
		break;
	case 'managerlogin':
		$sql = "select * from managers where name ='{$name}'";
		$result = mysqli_query($link,$sql);
		if(mysqli_num_rows($result)>0){
			$manager = mysqli_fetch_assoc($result);
			$_SESSION["manager"] = $manager;
			if($manager['password'] == $pass){
				header("Location:../backstage");
			}else{
				echo '<script>alert("密码错误");</script>';
				header('Refresh:1,Url=admin_login.php');
			}
		}else{
			echo '<script>alert("用户名错误");</script>';
			header('Refresh:1,Url=admin_login.php');
		}
		break;
	case 'userlogout':
		unset($_SESSIONS['user']);
		//echo '<script>alert("成功退出，请重新登录！");</script>';
		header("Location:user_login.php");
		break;
	case 'managerlogout':
		unset($_SESSIONS['manager']);
		echo '<script>alert("成功退出，请重新登录！");</script>';
		header("Refresh:1,Url=admin_login.php");
		break;
}	
		switch($_GET['a']){
			case 'add'://执行书籍添加
				//接受form的数据
				$name = $_POST['name'];
				$password = $_POST['password'];
				$realname = $_POST['realname'];
				$telphone = $_POST['telphone'];
				$sex = $_POST['sex'];
				//$state = $_POST['state'];
				$birthdate = $_POST['birthdate'];
				//var_dump($_POST,$picture['info']);
				//exit;
				//4、定义sql语句
				$sql = "insert into users values(null,'{$name}','{$password}','{$realname}',
				'{$telphone}','{$sex}','null','{$birthdate}' )";
				$result = mysqli_query($link,$sql);
				//var_dump($sql);
				if (!$result) {
				    printf("Error: %s\n", mysqli_error($link));
				    exit();
				}
				else{
					echo "添加成功<br>";
					echo "<link rel='stylesheet' href='css/pintuer.css'>";
					echo "<a class='button border-main' href='user_login.php'><span class='icon-edit'></span> 返回到登录界面</a>";
				}
				break;
}
//关闭数据库
mysqli_close($link);
?>