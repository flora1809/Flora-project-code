<?php
//根据不同指令执行sql语句实现书籍的增删改功能
header("Content-Type: text/html;charset=utf-8");
date_default_timezone_set('PRC'); //东八时区 echo date('Y-m-d H:i:s'); 
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
$path = "../public/book/";
$typelist = array("image/jpeg","image/gif","image/png");

switch($_GET['a']){
	case 'add'://执行书籍添加
		//接受form的数据
		$bookname = $_POST['bookname'];
		$writer = $_POST['writer'];
		$chubanshe = $_POST['chubanshe'];
		$ISBN = $_POST['ISBN'];
		$price = $_POST['price'];
		$upfile = $_FILES['f'];//获取上传图片信息
		$picture = fileupload($upfile,$path,$typelist);
		if($picture['error']==false){
			echo "上传文件失败！原因：".$picture['info'];
		}
		$reserve = $_POST['reserve'];
		$details = $_POST['details'];
		$state = $_POST['state'];
		//4、定义sql语句
		$sql = "insert into books values(null,'{$bookname}','{$writer}','{$chubanshe}','{$ISBN}','{$price}','{$picture["info"]}','{$reserve}',now(),'{$details}','{$state}')";
		$result = mysqli_query($link,$sql);
		if (!$result) {
		    printf("Error: %s\n", mysqli_error($link));
		    exit();
		}
		else{
			echo "添加成功<br>";
			echo "<link rel='stylesheet' href='css/pintuer.css'>";
			echo "<a class='button border-main' href='book_browse.php'><span class='icon-edit'></span> 返回到修改界面</a>";
		}
		break;
	case 'del'://执行书籍删除
		//接受form的数据
		$id = $_GET['b'];
		//4、定义sql语句
		$sql = "delete from books where id = {$id}";
		$result = mysqli_query($link,$sql);
		if(mysqli_affected_rows($link)>0){
			@unlink($path.$picture);//删除文件
			@unlink($path."m_".$picture);
			@unlink($path."s_".$picture);
			echo "删除成功！<br>";
			echo "<link rel='stylesheet' href='css/pintuer.css'>";
			echo "<a class='button border-main' href='book_browse.php'><span class='icon-edit'></span> 返回到修改界面</a>";
		}else{
			echo "删除失败！";
		}
		break;
	
	case 'alt'://执行书籍修改
		//接受form的数据
		$id = $_GET['b'];
		$bookname = $_POST['bookname'];
		$writer = $_POST['writer'];
		$chubanshe = $_POST['chubanshe'];
		$ISBN = $_POST['ISBN'];
		$price = $_POST['price'];
		$upfile = $_FILES['f'];//获取上传图片信息
		if($_FILES['f']['error']!=4){
			//图片上传部分
			$a = fileupload($upfile,$path,$typelist);
			if($a['error']==false){
				echo "上传文件失败！原因：".$a['info'];
			}else{
				$picture = $a['info'];
			}
		}else{
			$picture = $_GET['c'];
		}
		$reserve = $_POST['reserve'];
		$details = $_POST['details'];
		$state = $_POST['state'];
		//4、定义sql语句
		$sql = "update books set bookname = '{$bookname}',writer = '{$writer}',chubanshe = '{$chubanshe}',ISBN = '{$ISBN}',price = '{$price}',picture = '{$picture}',reserve = '{$reserve}',addtime = now(),details = '{$details}',state = '{$state}' where id =' {$id}';";;
		$result = mysqli_query($link,$sql);
		if(mysqli_affected_rows($link)>=0){
			//判断有新图上传
			if($_FILES['f']['error']==0){
				@unlink($path.$_GET['c']);//删除原文件
				@unlink($path."m_".$_GET['c']);
				@unlink($path."s_".$_GET['c']);
				echo "修改成功";
				echo "<link rel='stylesheet' href='css/pintuer.css'>";
				echo "<a class='button border-main' href='book_browse.php'><span class='icon-edit'></span> 返回到修改界面</a>";
			}else{
				echo "修改成功";
				echo "<link rel='stylesheet' href='css/pintuer.css'>";
				echo "<a class='button border-main' href='book_browse.php'><span class='icon-edit'></span> 返回到修改界面</a>";
			}	
		}else{
			@unlink($path.$picture);//删除新文件
			@unlink($path."m_".$picture);
			@unlink($path."s_".$picture);
			echo "修改失败";
		}
		break;

}
//关闭数据库
mysqli_close($link);
?>