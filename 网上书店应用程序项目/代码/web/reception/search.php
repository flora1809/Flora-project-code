<!--书籍信息查询的界面-->
<?php
 session_start();
 //var_dump($_SESSION["user"],!isset($_SESSION["user"]));
 if(isset($_SESSTION['user'])){
 	header("Refresh:5,Url=../login/user_login.php");
 	exit;
 }
header("Content-Type: text/html;charset=utf-8");
$type=$_GET['a']; $keywords=$_POST['keywords'];?>
<!DOCTYPE html>
<html>
	<head lang="en">
		<meta charset="utf-8" />
		<title>搜索</title>
		<link rel="stylesheet" type="text/css" href="css/public.css"/>
		<link rel="stylesheet" type="text/css" href="css/proList.css"/>
	</head>
	<body>
		<!------------------------------head------------------------------>
		<div class="head ding">
			<div class="wrapper clearfix">
				<div class="clearfix" id="top">
					<h1 class="fl"><a href="index.php"><img src="img/logo.png"/></a></h1>
					<div class="fr clearfix" id="top1">
						<p class="fl">
							<a href="mygxin" id="login">欢迎<?php echo($_SESSION['user']['name'])?>进入</a>
							<a href="../login/action.php?a=userlogout" id="reg" >退出</a>
						</p>
						<form action="search.php?a={$type}" method="post" class="fl" id="form1">
							<input type="text" placeholder="<?php echo ($keywords); ?>" name="keywords" />
							<input type="button" onclick="search()" />
						</form>
						<div class="btn fl clearfix">
							<a href="mygxin.php"><img src="img/grzx.png"/></a>
							<a href="#" class="er1"><img src="img/ewm.png"/></a>
							<a href="car.php"><img src="img/gwc.png"/></a>
							<p><a href="#"><img src="img/smewm.png"/></a></p>
						</div>
					</div>
				</div>
				<ul class="clearfix" id="bott">
					<li><a href="index.php">首页</a></li>
				</ul>
			</div>
		</div>
		<!-----------------address------------------------------->
		<div class="address">
			<div class="wrapper clearfix">
				<a href="index.php">首页</a>
				<span>/</span>
				<a class="on">搜索“<?php echo($keywords);?>”</a>
			</div>
		</div>

		<!----------------proList------------------------->
		<ul class="proList wrapper clearfix">
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
				$sql = "select * from books where bookname like '%{$keywords}%';";
				$result = mysqli_query($link,$sql);
		//5、解析并遍历输出结果
		if(mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_assoc($result)){
					  echo "<li>";
					  echo "<a href='proDetail.php?a={$row['id']}'>";
					  echo "<dl>";
					  echo "<dt><img src='../public/book/{$row["picture"]}' alt='' width='120' height='50' /></dt>";
					  echo "<dd>{$row['bookname']}</dd>";
					  echo "<dd>{$row['writer']}</dd>";
					  echo "<dd>￥{$row['price']}</dd>";
					  echo "</dl></a></li>";
		}
		}else{
			echo "没有找到查询结果！";
		}
		?>
		</ul>
		<!--返回顶部-->
		<div class="gotop">
			<a href="car.php">
			<dl class="goCart">
				<dt><img src="img/gt1.png"/></dt>
				<dd>去购<br />物车</dd>
				<span>1</span>
			</dl>
			</a>
			<a href="#" class="dh">
			<dl>
				<dt><img src="img/gt2.png"/></dt>
				<dd>联系<br />客服</dd>
			</dl>
			</a>
			<a href="mygxin.php">
			<dl>
				<dt><img src="img/gt3.png"/></dt>
				<dd>个人<br />中心</dd>
			</dl>
			</a>
			<a href="#" class="toptop" style="display: none;">
			<dl>
				<dt><img src="img/gt4.png"/></dt>
				<dd>返回<br />顶部</dd>
			</dl>
			</a>
			<p>400-800-8200</p>
		</div>
		<div class="msk"></div>
		<!--footer-->
		<div class="footer">
			<div class="top">
				<div class="wrapper">
					<div class="clearfix">
						<a href="#2" class="fl"><img src="img/foot1.png"/></a>
						<span class="fl">7天无理由退货</span>
					</div>
					<div class="clearfix">
						<a href="#2" class="fl"><img src="img/foot2.png"/></a>
						<span class="fl">15天免费换货</span>
					</div>
					<div class="clearfix">
						<a href="#2" class="fl"><img src="img/foot3.png"/></a>
						<span class="fl">满599包邮</span>
					</div>
					<div class="clearfix">
						<a href="#2" class="fl"><img src="img/foot4.png"/></a>
						<span class="fl">手机特色服务</span>
					</div>
				</div>
			</div>
			<p class="dibu">最家家居&copy;2013-2017公司版权所有 京ICP备080100-44备0000111000号<br />
			违法和不良信息举报电话：188-0130-1238，本网站所列数据，除特殊说明，所有数据均出自我司实验室测试</p>
		</div>
		<script>
			function search(){
				var form = document.getElementById('form1');
				form.submit();
			}
		</script>
		<script src="js/jquery-1.12.4.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/public.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/pro.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/cart.js" type="text/javascript" charset="utf-8"></script>
		<?php //关闭数据库
		mysqli_close($link);
		?>
	</body>
</html>
