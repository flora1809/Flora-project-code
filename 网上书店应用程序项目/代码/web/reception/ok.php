<!--订单支付成功页面-->
<?php
//开启session
session_start();
//var_dump($_SESSION["user"],!isset($_SESSION["user"]));
if(isset($_SESSTION['user'])){
	header("Refresh:5,Url=../login/user_login.php");
	exit;
}
else{}
//1、导入配置文件
		  $id = $_GET['a'];
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
		  $sql = "select * from books";
		  $result = mysqli_query($link,$sql);
		  $row = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html>
	<head lang="en">
		<meta charset="utf-8" />
		<title>ok</title>
		<link rel="stylesheet" type="text/css" href="css/public.css"/>
		<link rel="stylesheet" type="text/css" href="css/proList.css" />
	</head>
	<body>
		<!----------------------------------------order------------------>
		<div class="head ding">
			<div class="wrapper clearfix">
				<div class="clearfix" id="top">
					<h1 class="fl"><a href="index.php"><img src="img/logo.png"/></a></h1>
					<div class="fr clearfix" id="top1">
						<p class="fl">
							<a href="mygxin" id="login">欢迎<?php echo($_SESSION['user']['name'])?>进入</a>
							<a href="../login/action.php?a=userlogout" id="reg" >退出</a>
						</p>
						<form action="#" method="get" class="fl">
							<input type="text" placeholder="搜索" />
							<input type="button" />
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
		<div class="order mt cart">
			<div class="site">
				<p class="wrapper clearfix">
					<span class="fl">支付成功</span>
					<img class="top" src="img/temp/cartTop03.png">
				</p>
			</div>
			<p class="ok">支付成功！剩余<span>5</span>秒<a href="myorderq.php">返回订单页</a></p>
		</div>
		<div class="like">
			<h4>猜你喜欢</h4>
			<div class="bottom">
				<div class="hd">
					<span class="prev"><img src="img/temp/prev.png"></span>
					<span class="next"><img src="img/temp/next.png"></span>
				</div>
				<div class="imgCon bd">
					<div class="likeList clearfix">
							<?php
							$sql = "select * from books";
							$result = mysqli_query($link,$sql);
							$i=3;
							while($i){
								$j=3;
								echo "<div>";
								while($j){
									$row2 = mysqli_fetch_assoc($result);
									echo "<a href='proDetail.php?a={$row2["id"]}'>";
									echo "<dl>";
									echo "<dt><img src='../public/book/{$row2["picture"]}'></dt>";
									echo "<dd> {$row2['bookname']} </dd>";
									echo "<dd>¥ {$row2['price']}</dd>";
									echo "</dl>";
									echo "</a>";
									$j--;
								}
								echo "<a href='proDetail.php?a={$row2["id"]}'  class='last'>";
								echo "<dl>";
								echo "<dt><img src='../public/book/{$row2["picture"]}'></dt>";
								echo "<dd> {$row2['bookname']} </dd>";
								echo "<dd>¥ {$row2['price']}</dd>";
								echo "</dl>";
								echo "</a>";
								echo "</div>";
							$i--;
							}
							?>
					</div>
				</div>
			</div>
		</div>
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
		<script src="js/jquery-1.12.4.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/public.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/pro.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/jquery.SuperSlide.2.1.1.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
			jQuery(".bottom").slide({titCell:".hd ul",mainCell:".bd .likeList",autoPage:true,autoPlay:false,effect:"leftLoop",autoPlay:true,vis:1});
		</script>
		<?php //关闭数据库
		mysqli_close($link);
		?>
	</body>
</html>
