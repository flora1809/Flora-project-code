<!--个人中心——我的中心 用户信息显示并修改的页面-->
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
		<title>个人信息</title>
		<link rel="stylesheet" type="text/css" href="css/public.css"/>
		<link rel="stylesheet" type="text/css" href="css/mygrxx.css" />
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
				<a href="index.php" class="fl">首页</a>
				<span>/</span>
				<a href="mygxin.php" class="on">个人信息</a>
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
							<li><a href="myorderq.php">我的订单</a></li>
						</ul>
						<h4>个人中心</h4>
						<ul>
							<li><a href="mygxin.php">我的中心</a></li>
							<li class="on"><a href="mygrxx.php">个人信息</a></li>
						</ul>
					</div>
				</div>
				<div class="you fl">
					<h2>个人信息</h2>
					<div class="gxin">
						<div class="tx"><img src="img/tx.png"/></div>
						<div class="xx">
							<h3 class="clearfix"><strong class="fl">基础资料</strong><a href="#" class="fr" id="edit1">编辑</a></h3>
							<div>姓名：<?php echo($_SESSION['user']['name'])?></div>
							<div>生日：<?php echo($_SESSION['user']['birthdate'])?></div>
							<div>性别：<?php $sex = array(0 => '男',1 => '女'); echo($sex[$_SESSION['user']['sex']])?></div>
						</div>
					</div>			
				</div>
			</div>
		</div>
		<!--遮罩-->
		<div class="mask"></div>
		<!--编辑弹框-->
		<div class="bj">
			<div class="clearfix"><a href="#" class="fr gb"><img src="img/icon4.png"/></a></div>
			<h3>编辑基础资料</h3>
			<form action="user_action.php?a=informalt" method="post"  id="form1">
				<p><label>姓名：</label><input type="text" name="realname"  value="<?php echo($_SESSION['user']['name'])?>" /></p>
				<p><label>生日：</label><input type="text" name="birthdate" value="<?php echo($_SESSION['user']['birthdate'])?>"  /></p>
				<p>
					<label>性别：</label>
					<span><input name="sex" type="radio" <?php echo ($_SESSION['user']['sex'] == 0)?'checked':'';?> value="0" />男</span>
					<span><input name="sex" type="radio" <?php echo ($_SESSION['user']['sex'] == 1)?'checked':'';?> value="1"  />女</span>
				</p>
				<div class="bc">
					<input type="button" value="保存" onclick="save()" />
					<input type="button" value="取消" />
				</div>
			</form>
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
			违法和不良信息举报电话：400-800-8200，本网站所列数据，除特殊说明，所有数据均出自我司实验室测试</p>
		</div>
		<script>
			function save(){
				var form = document.getElementById('form1');
				form.submit();
			}
		</script>
		<script src="js/jquery-1.12.4.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/public.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/user.js" type="text/javascript" charset="utf-8"></script>
	<?php //关闭数据库
	mysqli_close($link);
	?>
	</body>
</php>
