<%@ page language="java" import="java.util.*" pageEncoding="utf-8" import="com.dhee.entity.UserEntity"%>
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

		<title>My JSP 'index.jsp' starting page</title>
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
		<center>
			<font size="5">URL扫描</font>
			<%
				if(session.getAttribute("userInfo")!=null){
					UserEntity user = (UserEntity)session.getAttribute("userInfo");
				%>
				<div>欢迎<%=user.getName() %>登录！</div>
				<span><a href="getUrl" >URL管理</a></span>
				<span><a href="sql.jsp" >SQL注入</a></span>
				<span><a href="xss.jsp">xss漏洞</a> </span>
				<span><a href="logout">退出</a></span>
				
				<%
				}
			
			%>
			<table>
				<form action="scan" method="post" name="">
					<tr>
						<td>
							请输入URL地址：
						</td>
						<td>
							<input name="urlEntity.url" type="text" />
						</td>
						<td>
							<input name="submit" type="submit" value="扫描" />
						</td>
					</tr>
				</form>
				<tr>
					<td>
						扫描结果：
					</td>
					<td colspan="2">
						<select size="20" id="urlResult" style="width: 300px">
							<%
						if(session.getAttribute("enableUrl") != null){
							List<String> enableUrl = (List<String>)session.getAttribute("enableUrl");
							for(String url : enableUrl){
						%>
							<option value="<%=url %>"><%=url %></option>
						<%		
								
							}
						}
						%>
						</select>
					</td>
				</tr>

			</table>
		</center>
	</body>
</html>
