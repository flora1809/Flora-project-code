<!--购物车页面-->
<?php
//开启session
session_start();
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
		<title>cart</title>
		<link rel="stylesheet" type="text/css" href="css/public.css"/>
		<link rel="stylesheet" type="text/css" href="css/proList.css" />
	</head>
	<body>
		<!--------------------------------------cart--------------------->
		<div class="head ding">
			<div class="wrapper clearfix">
				<div class="clearfix" id="top">
					<h1 class="fl"><a href="index.php"><img src="img/logo.png"/></a></h1>
					<div class="fr clearfix" id="top1">
						<p class="fl">
							<a href="mygxin" id="login">欢迎<?php echo($_SESSION['user']['name'])?>进入</a>
							<a href="../login/action.php?a=userlogout" id="reg" >退出</a>
						</p>
						<form action="search.php?a=1" method="post" class="fl" id="form1">
							<input type="text" placeholder="搜索" name="keywords" />
							<input type="button"  onclick="search()" />
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
		<div class="cart mt">
			<!-----------------site------------------->
			<div class="site">
				<p class=" wrapper clearfix">
					<span class="fl">购物车</span>
					<img class="top" src="img/temp/cartTop01.png">
					<a href="index.php" class="fr">继续购物&gt;</a>
				</p>
			</div>
			<!-----------------table------------------->
			<div class="table wrapper">
				<div class="tr">
					<div>商品</div>
					<div>单价</div>
					<div>数量</div>
					<div>小计</div>
					<div>操作</div>
				</div>
				<?php
				if(mysqli_affected_rows($link)>0){
					$i=0;
					while($row = mysqli_fetch_assoc($result)){
						echo "<div class='th'>";
						echo "<div class='pro clearfix'>";
						echo "<label class='fl'>";
						echo "<span></span>";
						echo "</label>";
						$sqlr = "select * from books where bookname = '{$row['bookname']}';";
						$resultr = mysqli_query($link,$sqlr);
						$rowr = mysqli_fetch_assoc($resultr);
						echo "<a class='fl' href='proDetail.php?a={$rowr["id"]}'>";
						echo "<dl class='clearfix'>";
						echo "<dt class='fl'><img src='../public/book/{$rowr["picture"]}' height='120' width='120' ></dt>";
						echo "<dd class='fl'>";
						echo "<p>{$row['bookname']}</p>";
						echo "</dd>";
						echo "</dl>";
						echo "</a>";
						echo "</div>";
						echo "<div class='price'>￥{$row['price']}</div>";
						echo "<div class='number'>";
						echo "<p class='num clearfix'>";
						echo "<input type='number' max='5' min='1' value='{$row['number']}' id='num{$i}' onChange='comp({$i},{$row['price']})'>";
						echo "</p>";
						echo "</div>";
						$sAll = $row["number"] * $row["price"];
						echo "<div class='price sAll' id='all{$i}'>￥{$sAll}</div>";
						echo "<div class='price'><a class='del' href='order_action.php?a=del&b={$row["id"]}'>删除</a></div>";
						echo "</div>";
						$i++;
					}
					echo "<div class='tr clearfix'>";
					echo"<p class='fr'>";
					echo"<span>共<small id='allnum'>0</small>件商品</span>";
					echo"<span>合计:&nbsp;<small id='allprice'>￥0.00</small></span>";
					echo"<a onClick='amoney({$i},{$row['price']})'>结算</a>";		
					echo"</p></div>";
				}else{
					echo "<div class='goOn'>空空如也~<a href='index.php'>去逛逛</a></div>";
				}
	
				?>
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
			function search(){//查询键提交
				var form = document.getElementById('form1');
				form.submit();
			}
			function comp(z,p){//每个商品价格总和计算
				var num=document.getElementById('num'+z).value;
				var mone=document.getElementById('all'+z);
				mone.innerHTML=p*num;
			}
			function amoney(n){//结算时，计算所有商品数量和价格
				var anum=0;
				var aprice=0;
				<?php
					$sqlp = "select price from orders where subscribers = {$_SESSION['user']['id']}&& state= 0;";
					$resultp = mysqli_query($link,$sqlp);
					echo"var spec = new Array();";
					$i=0;
					while($rowp = mysqli_fetch_assoc($resultp)){
						echo"spec[{$i}] = '{$rowp['price']}';";
						$i++;
					}
				?>
				for(var i=0;i<n;i++)
				{
					var num=parseInt(document.getElementById('num'+i).value);
					var price=parseInt(document.getElementById('all'+i).innerHTML);
					if(window.isNaN(price)){
						price=parseInt(spec[i])*num;
					}
					anum+=num;
					aprice+=price;
				}
					document.getElementById('allnum').innerHTML=anum;		
					document.getElementById('allprice').innerHTML=aprice;
				var r = confirm("合计"+aprice+"元，是否提交订单");
				if (r == true) {
				   self.location.href="order.php";
				}
			}

		</script>
		<script src="js/jquery-1.12.4.min.js" type="text/javascript" charset="utf-8"></script
	<?php //关闭数据库
	mysqli_close($link);
	?>
	</body>
</html>
