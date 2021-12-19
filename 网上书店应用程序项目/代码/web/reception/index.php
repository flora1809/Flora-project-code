<!--前台首页-->
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
		  $sql = "select * from books";
		  $result = mysqli_query($link,$sql);

?>
<!DOCTYPE html>
<html>
	<head lang="en">
		<meta charset="utf-8" />
		<title>前台</title>
		<link rel="stylesheet" type="text/css" href="css/public.css"/>
		<link rel="stylesheet" type="text/css" href="css/index.css" />
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
			</div>
		</div>
		<!-------------------------banner--------------------------->
		<div class="block_home_slider">
			<div id="home_slider" class="flexslider">
				<ul class="slides">
					<li>
						<div class="slide">
							<img src="img/banner2.jpg"/>
						</div>
					</li>
					<li>
						<div class="slide">
							<img src="img/banner1.jpg"/>
						</div>
					</li>
				</ul>
			</div>
		</div>

		<!------------------------------news------------------------------>
		<div class="news">
			<div class="wrapper">
				<h2><img src="img/ih2.jpg"/></h2>
				<?php
				$j=3;
				while($j){
					echo "<div class='flower clearfix tran'>";
					$i=3;
					while($i){
						$row = mysqli_fetch_assoc($result);
						echo "<a href='proDetail.php?a={$row["id"]}' class='clearfix'>";
						echo "<dl>
								<dt>
									<span class='abl'></span>";
						echo "		<img src='../public/book/{$row["picture"]}'/>";
						echo "		<span class='abr'></span>
								</dt>";
						echo "<dd>{$row['bookname']}</dd>";
						echo "<dd><span>¥ {$row['price']}</span></dd>";
						echo "</dl>
						</a>";
					$i--;
					}
					echo "</div>";
					$j--;
				}
				?>


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
		
		<!-------------------login-------------------------->
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
			违法和不良信息举报电话：400-800-8200，本网站所列数据，除特殊说明，所有数据均出自我司实验室测试</p>
		</div>
		<script>
			function search(){
				var form = document.getElementById('form1');
				form.submit();
			}
		</script>
		<script src="js/jquery-1.12.4.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/public.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/nav.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/jquery.flexslider-min.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
			$(function() {
				$('#home_slider').flexslider({
					animation: 'slide',
					controlNav: true,
					directionNav: true,
					animationLoop: true,
					slideshow: true,
					slideshowSpeed:2000,
					useCSS: false
				});

			});
		</script>
		
		<?php //关闭数据库
		mysqli_close($link);
		?>
	</body>
</html>
