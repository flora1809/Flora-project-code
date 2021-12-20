<%@ page language="java" import="java.util.*" pageEncoding="utf-8"%>
<%
	String path = request.getContextPath();
	String basePath = request.getScheme() + "://"
			+ request.getServerName() + ":" + request.getServerPort()
			+ path + "/";
%>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<base href="<%=basePath%>">

		<title>WebScanner</title>

		<style>
		div,body,p,td,font{
	 		color: #DDEEFF;
 		}
		</style>
		<meta http-equiv="pragma" content="no-cache">
		<meta http-equiv="cache-control" content="no-cache">
		<meta http-equiv="expires" content="0">
		<meta http-equiv="keywords" content="keyword1,keyword2,keyword3">
		<meta http-equiv="description" content="This is my page">
		<!--
	<link rel="stylesheet" type="text/css" href="styles.css">
	-->

	</head>

	<body>
	<div id="Layer2" style="position:absolute; width:100%; height:100%; z-index:-1">    
<img src="images/login.jpeg" height="100%" width="100%"/>    
</div> 
		<%
			Integer times = (Integer)session.getAttribute("loginError");
			if(times != null){
			if (times <= 4) {
				//session.removeAttribute("loginError");
				session.setAttribute("times", times);
				int remain = 5 - times;
		%>
		<script>
	
  		alert('用户名密码错误!剩余尝试次数:'+<%=remain%>);
  		</script>
		<%
			}
				if (times > 4) {
				session.removeAttribute("loginError");
		%>
		<script>
  		alert("用户被冻结,请联系管理员修改！")
  		</script>
		<%
				if (times == 5) {
						times = null;
					}
				session.setAttribute("times", times);
				}
			}
		%>
		<center>
			<font size="8">Web漏洞扫描系统</font>
			<br />
			<font>WebScanner</font>
			<br />
			<br />
			<br />
			<form action="login" method="post">
				<table>
					<tr>
						<td>
							用户名：
						</td>
						<td>
							<input type="text" name="userEntity.userName" />
						</td>
					</tr>
					<tr>
						<td>
							密码：
						</td>
						<td>
							<input type="password" name="userEntity.password" />
						</td>
					</tr>
					<tr>
						<td align="center" colspan="2">
							<input type="submit" value="登录" />
							<input type="reset" value="重置" />
							<input type="button" onclick="location.href='reg.jsp'" value="注册" />
<!-- 							<a href="reg.jsp"></a> -->
						</td>
					</tr>

				</table>
			</form>
		</center>
	</body>
</html>
