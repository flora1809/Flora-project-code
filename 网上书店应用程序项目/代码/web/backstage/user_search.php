<!--用户信息查询的界面-->
<?php 
header("Content-Type: text/html;charset=utf-8");
$type=$_POST['cid']; $keywords=$_POST['keywords'];?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>网站信息</title>  
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/jquery.js"></script>
    <script src="js/pintuer.js"></script>  
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 网站信息</strong></div>
  <div class="body-content">
	  <ul class="search">
	    <li>
	      <button type="button"  class="button border-green" id="checkall"><span class="icon-check"></span> 全选</button>
	      <button type="submit" class="button border-red"><span class="icon-trash-o"></span> 批量删除</button>
	  		  <a class="button border-yellow" href="book_add.php" target="right"><span class="icon-plus-square-o"></span> 添加内容</a>
			  <a class="button bg-blue margin-left" id="cancel" href="book_browse.php">返回首页</a>
	  		  <br>
			  	
	  		  <form method="post" action="user_search.php">
				查询方式：<select name="cid" class="input" style="width:200px; line-height:17px;">
			    <option value="0">请选择查询方式</option>
			    <option value="1">ID</option>
			    <option value="2">用户名</option>
			    <option value="3">真实姓名</option>
			    <option value="4">性别</option>
			  	 <option value="5">状态</option>
			  </select>
	  		  <input type="text" placeholder="<?php echo ($keywords); ?>" name="keywords" class="input" style="width:250px; line-height:17px;display:inline-block" />
	  		  <button class="button border-main icon-search" type="submit"> 搜索</button>
	  		  </form>
	  		  </li>
	  		</li>
	  </ul>
    <form method="post" class="form-x" action="">
	<?php
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
	//4、定义sql语句
	$sql = "select * from users where chubanshe like '%{$keywords}%';";
	$result = mysqli_query($link,$sql);
	switch($type){
	case '0':
		echo '<script>alert("请选择查询方式");</script>';
		header('Refresh:1,Url=user_login.php');
		break;
	case '1':
		$sql = "select * from users where id like '%{$keywords}%';";
		$result = mysqli_query($link,$sql);
		break;
	case '2':
		$sql = "select * from users where name like '%{$keywords}%';";
		$result = mysqli_query($link,$sql);
		break;
	case '3':
		$sql = "select * from users where realname like '%{$keywords}%';";
		$result = mysqli_query($link,$sql);
		break;
	case '4':
		if($keywords=='男'){
			$sql = "select * from users where sex = '0';";
			$result = mysqli_query($link,$sql);
		}
		else{
			if($keywords=='女'){
				$sql = "select * from users where sex = '1';";
				$result = mysqli_query($link,$sql);
			}
			else{
				echo "查询字眼不正确";
			}
		}
		
		break;
	case '5':
		if($keywords=='未审核'){
			$sql = "select * from users where state = '0';";
			$result = mysqli_query($link,$sql);
		}
		else{
			if($keywords=='通过'){
				$sql = "select * from users where state = '1';";
				$result = mysqli_query($link,$sql);
			}
			else{
				echo "查询字眼不正确";
			}
		}
		break;
	}
	//5、解析并遍历输出结果
	if(mysqli_num_rows($result)>0){
		echo "<table class='table table-hover text-center'>
		   <tr>
		     <th>ID</th>
		     <th>用户名</th>     
		     <th>密码</th>  
		     <th>真实姓名</th>     
		     <th>电话</th>
		     <th>性别</th>
		     <th>状态</th>
		     <th>出生日期</th>
		     <th>操作</th>
		   </tr>    ";
	while($row = mysqli_fetch_assoc($result)){
		//var_dump($row);
				$sex= array(0 => '男',1 => '女',);
				  $state = array(0 => '未审核',1 => '通过',);
				  echo "<tr>";
				 echo "<th width='120'>{$row['id']}</th>";
				 echo "<th>{$row['name']}</th>";
				 echo "<th>{$row['password']}</th>";
				 echo "<th>{$row['realname']}</th>";
				 echo "<th>{$row['telphone']}</th>";
				 echo "<th>{$sex[$row['sex']]}</th>";
				 echo "<th>{$state[$row['state']]}</th>";
				 echo "<th width='120'>{$row['birthdate']}</th>";
				  echo "</tr>";
				  echo "<td><div class='button-group'>";
				  echo "<a class='button border-main' href='user_alt.php?a={$row['id']}'><span class='icon-edit'></span> 修改</a>";
				  echo "<a class='button border-red' href='user_action.php?a=del&b={$row['id']}' onclick='return del(1)'><span class='icon-trash-o'></span> 删除</a> ";
				  echo "</div></td>";
				  //var_dump($row);
	}
	}else{
		echo "没有找到查询结果！";
	}
	//关闭数据库
	mysqli_close($link);
	?>
    </form>
  </div>
</div>
</body></html>