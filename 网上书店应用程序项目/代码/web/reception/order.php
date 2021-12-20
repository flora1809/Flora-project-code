<!--订单下单确认页面-->
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
		  //4、定义sql语句
		   $sql = "select * from orders where subscribers = {$_SESSION['user']['id']}&& state= 0;";
		   $result = mysqli_query($link,$sql);
?>
<!DOCTYPE html>
<html>
	<head lang="en">
		<meta charset="utf-8" />
		<title>order</title>
		<link rel="stylesheet" type="text/css" href="css/public.css"/>
		<link rel="stylesheet" type="text/css" href="css/proList.css" />
		<link rel="stylesheet" type="text/css" href="css/mygxin.css" />
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
							<a href="cart.php"><img src="img/gwc.png"/></a>
							<p><a href="#"><img src="img/smewm.png"/></a></p>
						</div>
					</div>
				</div>
				<ul class="clearfix" id="bott">
					<li><a href="index.php">首页</a></li>
				</ul>
			</div>
		</div>
		<div class="order cart mt">
			<!-----------------site------------------->
			<div class="site">
				<p class="wrapper clearfix">
					<span class="fl">订单确认</span>
					<img class="top" src="img/temp/cartTop02.png">
				</p>
			</div>
			<!-----------------orderCon------------------->
			<div class="orderCon wrapper clearfix">
				<div class="orderL fl">
					
					<!--------h3---------------->
					<h3>收件信息</h3>
					<!--------addres---------------->
					<form id="form1" method="post" class="addres clearfix" action="order_action.php?a=alt">
						<div class="addre fl">
							<div class="tit clearfix">
								<p class="fl">收件人姓名:<?php echo "{$_SESSION['user']['name']}";?>
								</p>
								
							</div>
							<div class="addCon">
								<p>收货地址:<input type="text" class="input" name="address" value="" /></p>
								<p>收件人电话:<input type="text" class="input" name="telphone" value="<?php echo "{$_SESSION['user']['telphone']}";?>" /></p>
							</div>
						</div>
					</form>
					<h3>支付方式</h3>
					<!--------way---------------->
					<div class="way clearfix">
						<img class="on" src="img/temp/way01.jpg"> 
						<img src="img/temp/way02.jpg"> 
						<img src="img/temp/way03.jpg"> 
						<img src="img/temp/way04.jpg"> 
					</div>
					<h3>选择快递</h3>
					<!--------dis---------------->
					<div class="dis clearfix">
						<span class="on">顺风快递</span>
						<span>百世汇通</span>
						<span>圆通快递</span>
						<span>中通快递</span>
					</div>
				</div>
				<div class="orderR fr">
					<div class="msg">
						<h3>订单内容<a href="cart.php" class="fr">返回购物车</a></h3>
						<!--------ul---------------->
						<?php
						$sAll=0;
						while($row = mysqli_fetch_assoc($result)){
							echo "<ul class='clearfix'>
							<li class='fl'>";
							$sqlr = "select picture from books where bookname = '{$row['bookname']}';";
							$resultr = mysqli_query($link,$sqlr);
							$rowr = mysqli_fetch_assoc($resultr);
							echo "<img src='../public/book/{$rowr["picture"]}' height='87' width='87' >";
							echo "</li>
							<li class='fl'>";
							echo "<p>{$row['bookname']}</p>";
							echo "<p>数量：{$row['number']}</p>";
							echo "</li>";
							$sAll1 = $row["number"] * $row["price"];
							echo "<li class='fr'>￥{$sAll1}</li>";
							echo "</ul>";
							$sAll=$sAll+$sAll1;
						}
						?>
					</div>
					<!--------tips---------------->
					<div class="tips">
						<p><span class="fl">商品金额：</span><span class="fr">￥<?php echo "{$sAll}";?></span></p>
						<p><span class="fl">优惠金额：</span><span class="fr">￥0.00</span></p>
						<p><span class="fl">运费：</span><span class="fr">免运费</span></p>
					</div>
					<!--------tips count---------------->
					<div class="count tips">
						<p><span class="fl">合计：</span><span class="fr">￥<?php echo "{$sAll}";?></span></p>
					</div>
					<button onClick="pay()" type="submit" class="pay">去支付</button>
				</div>
			</div>
		</div>
		<!--返回顶部-->
		<div class="gotop">
			<a href="cart.php">
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
			<a href="#" class="toptop" style="display: none;">
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
		<script>
			var clkBool=false;
			function pay(){//判断用户是否确认过收货信息，并给予提醒
				if (!form1.address.value=="") {
					var form = document.getElementById('form1');
					form.submit();
				}
				else{
				alert("请填写收件信息！");
				}
			}
		</script>
		<script src="js/jquery-1.12.4.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/public.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/user.js" type="text/javascript" charset="utf-8"></script>
		<?php //关闭数据库
		mysqli_close($link);
		?>
	</body>
</html>
