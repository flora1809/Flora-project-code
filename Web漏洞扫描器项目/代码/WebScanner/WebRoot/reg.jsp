<%@ page language="java" import="java.util.*" pageEncoding="utf-8"%>
<%
String path = request.getContextPath();
String basePath = request.getScheme()+"://"+request.getServerName()+":"+request.getServerPort()+path+"/";
%>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <base href="<%=basePath%>">
    
    <title>用户注册</title>
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
			if (session.getAttribute("regError") != null) {
				session.removeAttribute("regError");
		%>
		<script>
	
  		alert("用户名不能重复！")
  	</script>
		<%
			}
		%>
    <center>
			<font size="8">Web漏洞扫描系统</font>
			<br />
			<font>WebScanner</font>
			<br />
			<br />
			<br />
			<form action="registe" method="post">
				<table>
				<tr>
						<td align="center" colspan="2">
							用户注册
						</td>
					</tr>
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
						<td>
							姓名：
						</td>
						<td>
							<input type="text" name="userEntity.name" />
						</td>
					</tr>
					<tr>
						<td>
							性别：
						</td>
						<td>
							<input type="radio" name="userEntity.sex" value="m" checked />男
							<input type="radio" name="userEntity.sex" value="f" />女
						</td>
					</tr>
					<tr>
						<td align="center" colspan="2">
							<input type="submit" value="注册" />
							<input type="reset" value="重置" />
						</td>
					</tr>

				</table>
			</form>
		</center>
  </body>
</html>
