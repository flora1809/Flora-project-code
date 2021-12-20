<%@ page language="java" import="java.util.*" pageEncoding="utf-8" import="com.dhee.entity.UserEntity"%>
<%
String path = request.getContextPath();
String basePath = request.getScheme()+"://"+request.getServerName()+":"+request.getServerPort()+path+"/";
%>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <base href="<%=basePath%>">
    
    <title>My JSP 'sql.jsp' starting page</title>
    <style>
		div,body,p,td,font{
	 		color: #DDEEFF;
 		}
 		a{
 			color:#5BC0DE;
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
  <div id="Layer1" style="position:absolute; width:100%; height:100%; z-index:-1">    
<img src="images/spider.jpeg" height="100%" width="100%"/>    
</div>
  <%
  	if(session.getAttribute("sqlInject")!=null){
  		Boolean b  = (Boolean)session.getAttribute("sqlInject");
  			if(b){
  				%>
  		  		<script>
  		  			alert("url存在Sql注入！");
  		  		
  		  		</script>
  		  	<%
  			}else{
  				%>
  		  		<script>
  		  			alert("url不存在Sql注入！");
  		  		
  		  		</script>
  		  	<%
  			}
  		session.removeAttribute("sqlInject");
  	}
  
  %>
  <center>
    <font size="5">SQL注入扫描</font>
			<%
				if(session.getAttribute("userInfo")!=null){
					UserEntity user = (UserEntity)session.getAttribute("userInfo");
				%>
				<div>欢迎<%=user.getName() %>登录！</div>
				<span><a href="getUrl" >URL管理</a></span>
				<span><a href="index.jsp" >爬虫</a></span>
				<span><a href="xss.jsp">XSS漏洞</a> </span>
				<span><a href="logout">退出</a></span>
				
				<%
				}
			
			%>
			<table>
				<form action="sqlInjection" method="post" name="">
					<tr>
						<td>
							请输入URL地址：
						</td>
						<td>
							<input name="urlEntity.url" type="text" />
						</td>
						<td>
							<input name="submit" type="submit" value="sql注入检测" />
						</td>
					</tr>
				</form>
			</table>
		</center>
  </body>
</html>
