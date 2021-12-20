<!--个人中心——我的订单 订单信息显示并查询的页面-->
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
		  require('../public/config.php');
		  //2、连接数据库并判断
		  $link = mysqli_connect(HOST,USER,PASS);
		  if (!$link) {  
		  	die('Could not connect to MySQL: ' . mysqli_error()); 
		  }
		  //3、选择数据库并设置字符集
		  mysqli_select_db($link,DBNAME);
		  mysqli_set_charset($link,'utf-8');
?>
<!DOCTYPE html>
<html>
	<head lang="en">
		<meta charset="utf-8" />
		<title>前台</title>
		<link rel="stylesheet" type="text/css" href="css/public.css"/>
		<link rel="stylesheet" type="text/css" href="css/myorder.css" />
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
		<!------------------------------idea------------------------------>
		<div class="address mt">
			<div class="wrapper clearfix">
				<a href="#" class="fl">首页</a>
				<span>/</span>
				<a href="myorderq.php" class="on">我的订单</a>
			</div>
		</div>
		
		<!------------------------------Bott------------------------------>
		<div class="Bott">
			<div class="wrapper clearfix">
				<div class="zuo fl">
					<h3>
						<a href="#"><img src="img/tx.png"/></a>
						<p class="clearfix"><a class="fl"><?php echo($_SESSION['user']['name'])?></a><a href="../login/action.php?a=userlogout" class="fr">[退出登录]</a></p>
					</h3>
					<div>
						<h4>我的交易</h4>
						<ul>
							<li><a href="car.php">我的购物车</a></li>
							<li  class="on"><a href="myorderq.php">我的订单</a></li>
						</ul>
						<h4>个人中心</h4>
						<ul>
							<li><a href="mygxin.php">我的中心</a></li>
							<li><a href="mygrxx.php">个人信息</a></li>
						</ul>
					</div>
				</div>
				<div class="you fl">
					<div class="my clearfix">
						<h2 class="fl">我的订单</h2>
						<a href="#" class="fl">请谨防钓鱼链接或诈骗电话，了解更多&gt;</a>
					</div>
					<div class="dlist clearfix">
						<ul class="fl clearfix" id="wa">
							<li class="on"><a href="#2">全部有效订单</a></li>
							<li><a href="#2">待支付</a></li>
							<li><a href="#2l">待收货</a></li>
							<li><a href="#2">已关闭</a></li>
						</ul>
						<form action="#" method="get" class="fr clearfix">
							<input type="text" name="" id="" value="" placeholder="请输入商品名称、订单号" />
							<input type="button" name="" id="" value="" />
						</form>
					</div>
					<?php
					//定义sql语句
					$sql = "select * from orders where subscribers = {$_SESSION['user']['id']}&& state= 3;";
					$result = mysqli_query($link,$sql);
					while($row = mysqli_fetch_assoc($result)){
						echo "<div class='dkuang'>
						<p class='one'>已收货</p>
						<div class='word clearfix'>
							<ul class='fl clearfix'>";
						echo "<li>{$row['date']}
						</li>";
						echo "<li>{$_SESSION['user']['name']}</li>";
						echo "<li>订单号:{$row['id']}</li>";
						echo "<li>在线支付</li>";
						echo "<li>收货地址:{$row['address']}</li>";
						echo "</ul>";
						$sAll = $row["number"] * $row["price"];
						echo "<p class='fr'>订单金额：<span>{$sAll}</span>元</p>";
						echo "</div>
						<div class='shohou clearfix'>";
						echo "<a href='' class='fl'>";
						$sqlr = "select picture from books where bookname = '{$row['bookname']}';";
						$resultr = mysqli_query($link,$sqlr);
						$rowr = mysqli_fetch_assoc($resultr);
						echo "<img src='../public/book/{$rowr["picture"]}' height='65' width='65' >";
						echo "<p class='fl'><a href=''>{$row['bookname']}</a><a href=''>¥{$row['price']}×{$row['number']}</a></p>";
						echo "<p class='fr'>";
						echo "<a>已收货</a>";
						echo "<a href='orderxq.php'>订单详情</a>";
						echo "</p>
						</div>
					</div>";
					}
					$sql = "select * from orders where subscribers = {$_SESSION['user']['id']}&& state= 2;";
					$result = mysqli_query($link,$sql);
					while($row = mysqli_fetch_assoc($result)){
						echo "<div class='dkuang clearfix deng'>
						<p class='one fl'>待收货</p>
						</br>
						<div class='word clearfix'>
							<ul class='fl clearfix'>";
						echo "<li>{$row['date']}
							</li>";
							echo "<li>{$_SESSION['user']['name']}</li>";
							echo "<li>订单号:{$row['id']}</li>";
							echo "<li>在线支付</li>";
							echo "<li>收货地址:{$row['address']}</li>";
							echo "</ul>";
							$sAll = $row["number"] * $row["price"];
							echo "<p class='fr'>订单金额：<span>{$sAll}</span>元</p>";
							echo "</div>
							<div class='shohou clearfix'>";
							echo "<a href='' class='fl'>";
							$sqlr = "select picture from books where bookname = '{$row['bookname']}';";
							$resultr = mysqli_query($link,$sqlr);
							$rowr = mysqli_fetch_assoc($resultr);
							echo "<img src='../public/book/{$rowr["picture"]}' height='65' width='65' >";
							echo "<p class='fl'><a href=''>{$row['bookname']}</a><a href=''>¥99.00×1</a></p>";
							echo "<p class='fr'>";
							echo "<a>确认收货</a>";
							echo "<a href='orderxq.php'>订单详情</a>";
							echo "</p>
							</div>
						</div>";
					}
					$sql = "select * from orders where subscribers = {$_SESSION['user']['id']}&& state= 1;";
					$result = mysqli_query($link,$sql);
					while($row = mysqli_fetch_assoc($result)){
						echo "<div class='dkuang deng'>
						<p class='one'>待支付</p>
						<div class='word clearfix'>
							<ul class='fl clearfix'>";
						echo "<li>{$row['date']}
							</li>";
							echo "<li>{$_SESSION['user']['name']}</li>";
							echo "<li>订单号:{$row['id']}</li>";
							echo "<li>在线支付</li>";
							echo "<li>收货地址:{$row['address']}</li>";
							echo "</ul>";
							$sAll = $row["number"] * $row["price"];
							echo "<p class='fr'>订单金额：<span>{$sAll}</span>元</p>";
							echo "</div>
							<div class='shohou clearfix'>";
							echo "<a href='' class='fl'>";
							$sqlr = "select picture from books where bookname = '{$row['bookname']}';";
							$resultr = mysqli_query($link,$sqlr);
							$rowr = mysqli_fetch_assoc($resultr);
							echo "<img src='../public/book/{$rowr["picture"]}' height='65' width='65' >";
							echo "<p class='fl'><a href=''>{$row['bookname']}</a><a href=''>¥99.00×1</a></p>";
							echo "<p class='fr'>";
							echo "<a>立即支付</a>";
							echo "<a href='orderxq.php'>订单详情</a>";
							echo "</p>
							</div>
						</div>";
					}
					$sql = "select * from orders where subscribers = {$_SESSION['user']['id']}&& state= 4;";
					$result = mysqli_query($link,$sql);
					while($row = mysqli_fetch_assoc($result)){
						echo "<div class='dkuang'>
						<p class='one'>已关闭</p>
						<div class='word clearfix'>
							<ul class='fl clearfix'>";
						echo "<li>{$row['date']}
							</li>";
							echo "<li>{$_SESSION['user']['name']}</li>";
							echo "<li>订单号:{$row['id']}</li>";
							echo "<li>在线支付</li>";
							echo "<li>收货地址:{$row['address']}</li>";
							echo "</ul>";
							$sAll = $row["number"] * $row["price"];
							echo "<p class='fr'>订单金额：<span>{$sAll}</span>元</p>";
							echo "</div>
							<div class='shohou clearfix'>";
							echo "<a href='' class='fl'>";
							$sqlr = "select picture from books where bookname = '{$row['bookname']}';";
							$resultr = mysqli_query($link,$sqlr);
							$rowr = mysqli_fetch_assoc($resultr);
							echo "<img src='../public/book/{$rowr["picture"]}' height='65' width='65' >";
							echo "<p class='fl'><a href=''>{$row['bookname']}</a><a href=''>¥99.00×1</a></p>";
							echo "<p class='fr'>";
							echo "<a>交易失败</a>";
							echo "<a href='orderxq.php'>订单详情</a>";
							echo "</p>
							</div>
						</div>";
					}
					?>
					<div class="fenye clearfix">
						<a href="#"><img src="img/zuo.jpg"/></a>
						<a href="#">1</a>
						<a href="#"><img src="img/you.jpg"/></a>
					</div>
				</div>
			</div>
		</div>
		<!--返回顶部-->
		<div class="gotop">
			<a href="car.php">
			<dl>
				<dt><img src="img/gt1.png"/></dt>
				<dd>去购<br />物车</dd>
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
			<a href="#" class="toptop" style="display: none">
			<dl>
				<dt><img src="img/gt4.png"/></dt>
				<dd>返回<br />顶部</dd>
			</dl>
			</a>
			<p>400-800-8200</p>
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
		<script src="js/user.js" type="text/javascript" charset="utf-8"></script>
		<?php //关闭数据库
		mysqli_close($link);
		?>
	</body>
</html>
