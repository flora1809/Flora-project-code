<!--后台首页-->
<?php
//开启session
session_start();
//var_dump($_SESSION["manager"],!isset($_SESSION["manager"]));
if(isset($_SESSTION['manager'])){
	header("Refresh:5,Url=../login/admin_login.php");
	exit;
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>后台管理</title>
        <link rel="stylesheet" type="text/css" href="css/common.css"/>
        <link rel="stylesheet" type="text/css" href="css/main.css"/>
		<link rel="stylesheet" type="text/css" href="css/admin.css"/>
		<link rel="stylesheet" type="text/css" href="css/pintuer.css"/>
   	 	<script type="text/javascript" src="js/libs/modernizr.min.js"></script>
    </head>
    <body>
		<!--标题块-->
		<div class="header bg-main">
		  <div class="logo margin-big-left fadein-top">
		    <img src="images/y.jpg" class="radius-circle rotate-hover" height="50" alt="" />
		  </div>
		  <div class="logo margin-big-left fadein-top">
		    <h1>欢迎<?php echo($_SESSION['manager']['name'])?>进入后台管理中心</h1>
		  </div>
		  <div class="head-l"><a class="button button-little bg-green" href="../reception/index.php" target="_blank"><span class="icon-home"></span> 前台首页</a> 
		  &nbsp;&nbsp;<a class="button button-little bg-red" href="../login/action.php?a=managerlogout"><span class="icon-power-off"></span> 退出登录</a> </div>
		</div>
		<!--导航栏块-->
       	<div class="container clearfix">
		    <div class="sidebar-wrap">
		        <div class="sidebar-title">
		            <h1>菜单</h1>
		        </div>
		        <div class="sidebar-content">
		            <ul class="sidebar-list">
		                <li>
		                    <a href="#"><i class="icon-font">&#xe003;</i>用户管理</a>
		                    <ul class="sub-menu">
		                        <li><a href="user_browse.php" target="right"><i class="icon-font">&#xe008;</i>浏览</a></li>
		                        <li><a href="user_add.php" target="right"><i class="icon-font">&#xe005;</i>添加</a></li>
		                    </ul>
		                </li>
		                <li>
		                    <a href="#"><i class="icon-font">&#xe018;</i>书籍管理</a>
		                    <ul class="sub-menu">
		                        <li><a href="book_browse.php" target="right"><i class="icon-font">&#xe008;</i>浏览</a></li>
		                        <li><a href="book_add.php" target="right"><i class="icon-font">&#xe005;</i>添加</a></li>
		                    </ul>
		                </li>
						<li>
						    <a href="#"><i class="icon-font">&#xe018;</i>订单管理</a>
						    <ul class="sub-menu">
						        <li><a href="order_browse.php" target="right"><i class="icon-font">&#xe008;</i>浏览</a></li>
						        <li><a href="order_add.php" target="right"><i class="icon-font">&#xe005;</i>添加</a></li>
						        
						    </ul>
						</li>
		            </ul>
		        </div>
		    </div>
		    <!--/sidebar-->
		    <script type="text/javascript">
		    $(function(){
		      $(".leftnav h2").click(function(){
		    	  $(this).next().slideToggle(200);	
		    	  $(this).toggleClass("on"); 
		      })
		      $(".leftnav ul li a").click(function(){
		    	    $("#a_leader_txt").text($(this).text());
		      		$(".leftnav ul li a").removeClass("on");
		    		$(this).addClass("on");
		      })
		    });
		    </script>
			<!--当前位置-->
		    <ul class="bread">
		      <li><a href="{:U('Index/info')}" target="right" class="icon-home"> 首页</a></li>
		      <li><a href="##" id="a_leader_txt">用户列表</a></li>
		    </ul>
			<!--窗口调取不同页面-->
			<div class="admin">
			  <iframe scrolling="auto" rameborder="0" src="user_browse.php" name="right" width="100%" height="99%"></iframe>
			</div>
			<div style="text-align:center;">
		    <!--/main-->
		</div>

    </body>
</html>