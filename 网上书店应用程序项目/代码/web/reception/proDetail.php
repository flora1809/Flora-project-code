<!--商品详情页面 根据提交数据(书籍id)来展示不同书籍商品的详细信息-->
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
		  $sql = "select * from books where id = {$id}";
		  $result = mysqli_query($link,$sql);
		  $row = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>详情页</title>
		<link rel="stylesheet" type="text/css" href="css/public.css"/>
		<link rel="stylesheet" type="text/css" href="css/proList.css"/>
	</head>
	<body>
		<!------------------------------head------------------------------>
		<div class="head">
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
			</div>
		</div>
		<!-----------------address------------------------------->
		<div class="address">
			<div class="wrapper clearfix">
				<a href="index.php">首页</a>
				<a href="#" class="on">  >  <?php echo $row['bookname'];?></a>
			</div>
		</div>
		<!-----------------------Detail------------------------------>
		<div class="detCon">
			<div class="proDet wrapper">
				<div class="proCon clearfix">
					<div class="proImg fl">
						<img class="det" src="../public/book/<?php echo $row['picture'];?>" />
					</div>
					<form id="testform" class="fr intro" action="" method="post" target="_blank">
						<div class="title">
							<h4> <?php echo $row['bookname'];?></h4>
							<p> <?php echo $row['details'];?> </p>
							<span>￥<?php echo $row['price'];?></span>
						</div>
						<div class="proIntro">
							<p>数量&nbsp;&nbsp;库存<span>2096</span>件</p>
							<div class="num clearfix">
							<input type="number" max="5" min="1" value="1" name="num">
							</div>
						</div>
						<div class="btns clearfix">
							<button onclick="submitme(1)"><p class="buy fl">立即购买</p></button>
							<button onclick="submitme(2)"><p class="cart fr">加入购物车</p></button>
						</div>
					</form>
					</div>
				</div>
			</div>
		</div>
		<div class="introMsg wrapper clearfix">
			<div class="msgL fl">
				<div class="msgTit clearfix">
					<p>商品详情</p>
				</div>
				<div class="msgAll">
						<p>书籍名称：<?php echo $row['bookname'];?></p>
						<p>作者：<?php echo $row['writer'];?></p>
						<p>出版社：<?php echo $row['chubanshe'];?></p>
						<p>ISBN：<?php echo $row['ISBN'];?></p>
						<p>详情：<?php echo $row['details'];?></p>
						<p><img src="../public/book/<?php echo $row['picture'];?>" /></p>
					</div>
				</div>
			</div>
			<div class="msgR fr">
				<h4>为你推荐</h4>
				<div class="seeList">
					<?php
					$sql = "select * from books";
					$result = mysqli_query($link,$sql);
					$i=3;
					while($i){
						$row1 = mysqli_fetch_assoc($result);
						echo "<a href='proDetail.php?a={$row1["id"]}'>";
						echo "<dl>";
						echo "<dt><img src='../public/book/{$row1["picture"]}'></dt>";
						echo "<dd>¥ {$row1['price']}</dd>";
						echo "<span>¥ {$row1['price']}</span></dd>";
						echo "</dl>";
						echo "</a>";	
						$i--;
					}
					?>
				</div>				
			</div>
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
		<script src="js/jquery-1.12.4.min.js" type="text/javascript" charset="utf-8"></script>
		<script>
		form = document.getElementById('testform');//点击不同的按钮，表单向不同的页面提交信息
		function submitme(x){
		if(x==1){form.action="order.php";form.submit();}
		else if(x==2){form.action="order_action.php?a=add&b=<?php echo($row['bookname'])?>&c=<?php echo($row['price'])?>";form.submit();}
		}
		
		</script>
		<script src="js/jquery.SuperSlide.2.1.1.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/public.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/nav.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
			jQuery(".bottom").slide({titCell:".hd ul",mainCell:".bd .likeList",autoPage:true,autoPlay:false,effect:"leftLoop",autoPlay:true,vis:1});
		</script>
		<?php //关闭数据库
		mysqli_close($link);
		?>
	</body>
</html>
