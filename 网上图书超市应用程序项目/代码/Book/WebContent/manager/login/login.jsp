<%@ page language="java" contentType="text/html; charset=UTF-8"
	pageEncoding="UTF-8"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
	 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>后台管理</title>
		<LINK href="${pageContext.request.contextPath}/public/css/style.css" rel="stylesheet" />
	</head>
	<body>
		<TABLE class=tableBorder height=230 cellSpacing=0 cellPadding=0
			width=350 align=center background=${pageContext.request.contextPath}/public/images/login_M.jpg border=0>
				<TR>
					<TD align=middle height=64>&nbsp;
						
					</TD>
				</TR>
				<TR>
					<TD vAlign=top height=45>
						<TABLE height=96 cellSpacing=0 cellPadding=0 width="62%" border=0>
							<FORM name=form1 action="login" method=post>
							<TBODY>
								<TR>
									<TD align=middle>
										&nbsp;用户名：
										<INPUT id=manager name=admin.userName>
									</TD>
								</TR>
								<TR>
									<TD align=middle>
										&nbsp;密&nbsp;&nbsp;码：
										<INPUT id=PWD type=password name=admin.password>
									</TD>
								</TR>
								<TR>
									<TD align=middle>
									<INPUT class=btn_grey type=submit value=登陆 name=Submit1>
										&nbsp;
										<INPUT class=btn_grey type=reset value=重置 name=Submit2>
										&nbsp;
										<A class=btn_grey
												href="http://localhost:8085/Book/index/index" type=button
												 name=Submit3>返回</A>
									</TD>
								</TR>
								</FORM>
						</TABLE>
					</TD>
				</TR>
			</TBODY>
		</TABLE>
		<%if(request.getAttribute("result").equals("error")){ %>
				<h4 align="center">登录失败，请重新登录！</h2>
		<%} %>
	</body>
</html>