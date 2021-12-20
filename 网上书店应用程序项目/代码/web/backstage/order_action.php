<?php
//根据不同指令执行sql语句实现订单的增删改功能
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
require("../public/functions.php");

switch($_GET['a']){
	case 'add'://执行订单添加
		//接受form的数据
		$bookname = $_POST['bookname'];
		$number = $_POST['number'];
		$price = $_POST['price'];
		$subscribers = $_POST['subscribers'];
		$telphone = $_POST['telphone'];
		$address = $_POST['address'];
		$state = $_POST['state'];
		//4、定义sql语句
		$sql = "insert into orders values(null,'{$bookname}','{$number}','{$price}',
		'{$subscribers}','{$telphone}','{$address}',now(),'{$state}')";
		$result = mysqli_query($link,$sql);
		if (!$result) {
		    printf("Error: %s\n", mysqli_error($link));
		    exit();
		}
		else{
			echo "添加成功<br>";
			echo "<link rel='stylesheet' href='css/pintuer.css'>";
			echo "<a class='button border-main' href='order_browse.php'><span class='icon-edit'></span> 返回到修改界面</a>";
		}
		break;
		
	case 'del'://执行订单删除
		//接受form的数据
		$id = $_GET['b'];
		//var_dump($_GET);
		//exit;
		//4、定义sql语句
		$sql = "delete from orders where id = {$id}";
		$result = mysqli_query($link,$sql);

		if(mysqli_affected_rows($link)>0){

			echo "删除成功！<br>";
			echo "<link rel='stylesheet' href='css/pintuer.css'>";
			echo "<a class='button border-main' href='order_browse.php'><span class='icon-edit'></span> 返回到修改界面</a>";
		}else{
			echo "删除失败！";
		}
		break;
		
	case 'alt'://执行订单修改
		//接受form的数据
		$id = $_GET['b'];
		$bookname = $_POST['bookname'];
		$number = $_POST['number'];
		$price = $_POST['price'];
		$subscribers = $_POST['subscribers'];
		$telphone = $_POST['telphone'];
		$address = $_POST['address'];
		$date = $_POST['date'];
		$state = $_POST['state']
		//4、定义sql语句
		$sql = "update orders set bookname = '{$bookname}',number = '{$number}',price = '{$price}',subscribers = '{$subscribers}',
telphone = '{$telphone}',address = '{$address}',date = '{$date}',state = '{$state}' where id =' {$id}';";
		$result = mysqli_query($link,$sql);
		if(mysqli_affected_rows($link)>=0){								
				echo "修改成功";
				echo "<link rel='stylesheet' href='css/pintuer.css'>";
				echo "<a class='button border-main' href='order_browse.php'><span class='icon-edit'></span> 返回到修改界面</a>";
		}else{
			echo "修改失败";
		}
		break;
						
}			
//关闭数据库
mysqli_close($link);
?>