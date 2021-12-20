<%@ page language="java" import="java.util.*" pageEncoding="utf-8"
	import="com.dhee.entity.UserEntity,com.dhee.entity.URLEntity"%>
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

		<title>My JSP 'url.jsp' starting page</title>
		<style>
		div,font{
	 		color: #66AFE9;
 		}
 		body,p,td{
 			color: #F7ECB5;
 		}
 		a{
 			color:#5BC0DE;
 		}
/* 		center{ */
/* 			background: url(images/url.jpeg) repeat-x; */
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
		<script type="text/javascript">
		function del(id){
			if(confirm("确定删除吗？")){
				location.href="delUrl?urlId="+id;
			}
		}

		function output(){
			location.href="getFile";
		}

		</script>
	</head>

	<body>
	<div id="Layer2" style="position:absolute; width:100%; height:100%; z-index:-1"> 
	<img src="images/other.jpeg" height="800px" width="100%"/>    
	</div>
	<%
		if(session.getAttribute("report")!=null){//abc
			Boolean b = (Boolean) session.getAttribute("report");
			if(b){//
				%>
				<script type="text/javascript">alert("生成报告成功！");</script>
				<%
				session.removeAttribute("report");
			}else{
				%>
				<script type="text/javascript">alert("生成报告失败！");</script>
				<%
			}
		}
	
	%>
		<center>
			<font size="5">URL管理</font>
			<%
				if (session.getAttribute("userInfo") != null) {
					UserEntity user = (UserEntity) session.getAttribute("userInfo");
			%>
			<div>
				欢迎<%=user.getName()%>登录！
			</div>
			<span><a href="index.jsp">爬虫</a> </span>
			<span><a href="sql.jsp">SQL注入</a> </span>
			<span><a href="xss.jsp">XSS漏洞</a> </span>
			<span><a href="logout">退出</a> </span>

			<%
				}
			%>
			<table border="1" width="1200px" height="100px">
				<tr>
					<td>
						URL
					</td>
					<td>
						sql注入
					</td>
					<td>
						xss漏洞
					</td>
					<td>
						操作
					</td>
				</tr>
				<%
					if (session.getAttribute("urlList")!=null) {
						List<URLEntity> urlList = (List<URLEntity>) session.getAttribute("urlList");
						for(URLEntity url: urlList){
				%>

				<tr align=middle width="70%">
					<td>
						<%=url.getUrl() %>
					</td>
					<td align=middle width="15%"0>
						<%
							if(url.getSql()==1){
						%>
						存在注入点
						<%} %>
						<%
							if(url.getSql()==2){
						%>
						不存在注入点
						<%} %>
						<%
							if(url.getSql()==3){
						%>
						未检测
						<%} %>
					</td>
					<td align=middle width="10%">
						<%
							if(url.getXss()==1){
						%>
						存在注入点
						<%} %>
						<%
							if(url.getXss()==2){
						%>
						不存在注入点
						<%} %>
						<%
							if(url.getXss()==3){
						%>
						未检测
						<%} %>
					</td>
					<td>

						<input type="button" value="删除" onclick="del('<%=url.getId() %>')" />
					</td>
				</tr>

				<%
						}}
				%>
				<tr>
					<td colspan="3" align=middle>
						<input type="button" value="生成报告" onclick="output()" />
					</td>
				</tr>
			</table>
		</center>
	</body>
</html>
