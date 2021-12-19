<!--书籍信息查询的界面-->
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
	  		  <form method="post" action="book_search.php">
	  			查询方式：<select name="cid" class="input" style="width:200px; line-height:17px;">
	  		    <option value="0">请选择查询方式</option>
	  		    <option value="1">书籍名称</option>
	  		    <option value="2">出版社</option>
	  		    <option value="3">书籍作者</option>
	  		    <option value="4">ISBN</option>
	  			<option value="5">书籍修改日期</option>
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
	if($type==4&&strlen($keywords)!=13){
		echo 'alert("ISBN输入长度不正确请重新输入!");';
		header('Refresh:1,Url=book_browse.php');
	}
	switch($type){
		case '0':
			echo '<script>alert("请选择查询方式");</script>';
			header('Refresh:1,Url=user_login.php');
			break;
		case '1':
			$sql = "select * from books where bookname like '%{$keywords}%';";
			$result = mysqli_query($link,$sql);
			break;
		case '2':
			$sql = "select * from books where chubanshe like '%{$keywords}%';";
			$result = mysqli_query($link,$sql);
			break;
		case '3':
			$sql = "select * from books where writer like '%{$keywords}%';";
			$result = mysqli_query($link,$sql);
			break;
		case '4':
			$sql = "select * from books where ISBN = '%{$keywords}%';";
			$result = mysqli_query($link,$sql);
			break;
		case '5':
			$sql = "select * from books where addtime like '%{$keywords}%';";
			$result = mysqli_query($link,$sql);
			break;
	}
	//5、解析并遍历输出结果
	if(mysqli_num_rows($result)>0){
		echo "<table class='table table-hover text-center'>
		  <tr>
		    <th width='120'>ID</th>
		    <th>书名</th>   
			<th>作者</th>	
		    <th>出版社</th>
			<th>ISBN</th>
			<th>价格</th>
		    <th>图片</th>
		    <th>库存</th>
		     <th width='120'>修改时间</th>
			 <th>状态</th>
		    <th>操作</th>       
		  </tr>    ";
	while($row = mysqli_fetch_assoc($result)){
				
				  $state = array(0 => '未审核',1 => '在线销售',2 => '下架');
				  echo "<tr>";
				  echo "<th width='120'>{$row['id']}</th>";
				  echo "<th>{$row['bookname']}</th>";
				  echo "<th>{$row['writer']}</th>";
				  echo "<th>{$row['chubanshe']}</th>";
				  echo "<th>{$row['ISBN']}</th>";
				  echo "<th>{$row['price']}</th>";
				  echo "<th><img src='../public/book/{$row["picture"]}' alt='' width='120' height='50' /></th>";
				  echo "<th>{$row['reserve']}</th>";
				  //echo "<th width='25%'>{$row['details']}</th>";
				  echo "<th width='120'>{$row['addtime']}</th>";
				  echo "<th>{$state[$row['state']]}</th>";
				  echo "<td><div class='button-group'>";
				  echo "<a class='button border-main' href='book_alt.php?a={$row['id']}'><span class='icon-edit'></span> 修改</a>";
				  echo "<a class='button border-red' href='book_action.php?a=del&b={$row['id']}' onclick='return del(1)'><span class='icon-trash-o'></span> 删除</a> ";
				  echo "</div></td>";
				  echo "</tr>";
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