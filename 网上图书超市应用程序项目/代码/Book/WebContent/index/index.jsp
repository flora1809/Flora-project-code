<%@page import="com.dhee.bookshop.book.entity.Book"%>
<%@page import="java.util.List"%>
<%@ page language="java" contentType="text/html; charset=UTF-8"
	pageEncoding="UTF-8"%>
<%@taglib prefix="s" uri="/struts-tags" %>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title></title>
<LINK href="${pageContext.request.contextPath}/public/css/style.css" rel="stylesheet" />
</head>

<body>
<!-- 最外层的大表格 -->
<table cellpadding="0" cellspacing="0" border="0" width="100%"height="100%">

<tbody>
<tr>
<td>
<!-- 显示页面信息的表格 -->
<TABLE height=800 cellSpacing=0 cellPadding=0 width=777
align=center bgColor=#ffffff border=0>
<tbody>
<tr>
<td valign="top">

<!--网站头部内容(包括导航菜单和Logo图片)-->
<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
<TBODY>
<TR>
<!--绿色背景-->
<TD bgColor=#81cf00 colSpan=2 height=6></TD>
</tr>
<tr>
<!--站点Logo图片-->
<td align=middle width="27%" height=70>
<IMG height=56 src="${pageContext.request.contextPath}/public/images/index_03.gif" width=185>
</td>
<!-- 站点Logo图片 -->

<!-- 导航信息 -->
<TD vAlign=top width="73%">
<TABLE height=35 cellSpacing=0 cellPadding=0 width="100%"border=0>
<TBODY>
<TR align=middle>
<TD vAlign=bottom height=22>
<A href="">首页</A>
</TD>
<TD vAlign=top width=1 rowSpan=2>
<IMG height=36 src="${pageContext.request.contextPath}/public/images/Nav_separate.gif" width=1>
</TD>
<TD vAlign=bottom>
<A href="#">新书上架</A></TD>
<TD vAlign=top width=1 rowSpan=2>
<IMG height=36 src="${pageContext.request.contextPath}/public/images/Nav_separate.gif" width=1>
</TD>
<TD vAlign=bottom>
<A href="/Book/index/bookCatelog">图书分类</A>
</TD>
<TD vAlign=top width=1 rowSpan=2>
<IMG height=36 src="${pageContext.request.contextPath}/public/images/Nav_separate.gif" width=1>
</TD>
<TD vAlign=bottom>
<A href="#">购物车</A>
</TD>
<TD vAlign=top width=1 rowSpan=2>
<IMG height=36 src="${pageContext.request.contextPath}/public/images/Nav_separate.gif" width=1>
</TD>
<TD vAlign=bottom>
<A href="#">订单查询</A>
</TD>
<TD vAlign=top width=1 rowSpan=2>
<IMG height=36 src="${pageContext.request.contextPath}/public/images/Nav_separate.gif" width=1>
</TD>
<TD vAlign=bottom>
<A href="#"></A>
&nbsp;
</TD>

</TR>
<TR align=middle>
<TD height=13>
<A href="#">Index</A>
</TD>
<TD><A href="#">New Books</A>
</TD>
<TD>
<A href="/Book/index/bookCatelog">Book Sort</A>
</TD>
<TD>
<A href="#">Shopping Bag</A>
</TD>
<TD>
<A href="#">Order Search</A></TD>
<TD>
<A href="#"></A></TD>
</TR>
</TBODY>
</TABLE>
</TD>
<!-- 导航信息 -->
</tr>
<!--网站Logo(小女孩)-->
<TR align=right>
<TD colSpan=2 height=70>
<IMG height=244 src="${pageContext.request.contextPath}/public/images/index_06.jpg" width=770>
</TD>
</TR>
<!-- 网站Logo(小女孩) -->
<TR align=right>
<TD colSpan=2 height=17>&nbsp;
														

</TD>
</TR>
</TBODY>
</TABLE>
<!-- Logo部分结束 -->

	<!--网页内容部分-->
<TABLE height=330 cellSpacing=0 cellPadding=0 width="100%"
											border=0>

											<tbody>
												<tr>
													<!--左边内容部分，占26%的宽度-->
													<td valign="top" width="26%">
												







														<!--滚动公告部分-->
														<TABLE height=55 cellSpacing=0 cellPadding=0 width="100%"
															border=0>
															<TBODY>
																<TR>
																	<TD align=right colSpan=2>
																		<IMG height=49 src="${pageContext.request.contextPath}/public/images/index_14.gif" width=185>
																	</TD>
																</TR>
																<TR>
																	<TD width="14%">&nbsp;
																		

																	</TD>
																	<TD class=tableBorder_B vAlign=top width="86%"
																		height=100>
																		<MARQUEE onmousemove=this.stop()
																			onmouseout=this.start() scrollAmount=1 scrollDelay=1
																			direction=up height=100>
																			<TABLE height=21 cellSpacing=0 cellPadding=0
																				width="100%" border=0>
																				<TBODY>
																					<TR>
																						<TD>
																							&nbsp;&nbsp;&nbsp;&nbsp;在圣诞节来临之际，本书店为答解新老朋友的，特举办购物有奖活动！
																						</TD>
																					</TR>
																				</TBODY>
																			</TABLE>
																			<TABLE height=21 cellSpacing=0 cellPadding=0
																				width="100%" border=0>
																				<TBODY>
																					<TR>
																						<TD>
																							购物有奖，快快行动吧！
																						</TD>
																					</TR>
																				</TBODY>
																			</TABLE>
																		</MARQUEE>
																	</TD>
																</TR>
															</TBODY>
														</TABLE>
														<!-- 滚动公告 -->












														<!--投票部分-->
														<!-- 投票部分 -->
                                                        <!--左边内容和中间内容的分隔线-->
                                                    <TD vAlign=top width=5 background=${pageContext.request.contextPath}/public/images/Cen_separate.gif></TD>
















													<!--内容主体部分-->
													<TD vAlign=top width="73%">


														<TABLE height=272 cellSpacing=0 cellPadding=0 width="100%"
															border=0>
															<TBODY>










																<!--搜索引擎-->
																<TR>
																	<TD background=${pageContext.request.contextPath}/public/images/index_10.gif colSpan=3 height=52>
																		<FORM name=form2 action=# method=post>
																			<TABLE height=23 cellSpacing=0 cellPadding=0
																				width="100%" border=0>
																				<TBODY>
																					<TR>
																						<TD>&nbsp;
																							
																						</TD>
																						<TD>&nbsp;
																							
																						</TD>
																						<TD>&nbsp;
																							
																						</TD>
																					</TR>
																					<TR>
																						<TD width="15%">&nbsp;
																							
																						</TD>
																						<TD width="67%">
																							请输入书名：
																							<INPUT class=txt_grey size=48 name=bookkey>
																						</TD>
																						<TD width="18%">
																							<INPUT class=btn_grey type=submit value=搜索
																								name=search>
																						</TD>
																					</TR>
																				</TBODY>
																			</TABLE>
																		</FORM>
																	</TD>
																</TR>
																<!-- 搜索引擎 -->




























																<!--显示图书信息(三行两列)-->
																<TR>
																<%
																List<Book> booklist = (List<Book>) request.getAttribute("booklist");
																%>
																	<TD vAlign=top width="73%" height=220>
																		<TABLE height=126 cellSpacing=0 cellPadding=0
																			width="100%" border=0>
																			<TBODY>
																				<!-- 第一行 -->
																				<%
																				int i=0;
																				while(i<6){
																				%>
																				<TR>
																					<% 
																					for(int j = 0; j < 2; j++){ 
																						Book book = booklist.get(i);
																					%>
																					<TD>
																						<TABLE height=123 cellSpacing=0 cellPadding=0
																							width="100%" border=0>
																							<TBODY>
																								<TR>
																									<TD align=middle width="43%">
																										<a href="#"><IMG src="${pageContext.request.contextPath}/public/upload/<%=book.getImgpath() %>"
																											width=76 height=110 border="0"></a>
																									</TD>
																									<TD width="57%">
																										<TABLE height=119 cellSpacing=0 cellPadding=0
																											width="100%" border=0>
																											<TBODY>
																												<TR>
																													<TD>
																														<%=book.getBname() %>
																													</TD>
																												</TR>
																												<TR>
																													<TD>
																														<%=book.getPublish() %>
																													</TD>
																												</TR>
																												<TR>
																													<TD>
																														作者：<%=book.getWriter() %>
																													</TD>
																												</TR>
																												<TR>
																													<TD>
																														定价：<%=book.getPrice() %>（元）
																													</TD>
																												</TR>
																												<TR>
																													<TD align=middle>
																														<INPUT class=btn_grey type=submit value=查看
																															name=Submit6 onClick="location.href='/Book/index/indexdetail?bid='+<%=book.getBid() %>">
																													</TD>
																												</TR>
																											</TBODY>
																										</TABLE>
																									</TD>
																								</TR>
																							</TBODY>
																						</TABLE>
																					</td>
																					<%
																						i++;
																					} 
																					%>
																					
																				</TR>
																				<%
																				}
																				%>




																					
																			</TBODY>
																		</TABLE>
																	</td>




																	<!--分隔条-->
																	<TD width=5 background=主页_files/Cen_separate.gif>&nbsp;
																		
																	</TD>






																	<!-- 最右边一列 -->
																	<TD vAlign=top>
																		<!-- 新书上架 -->
																		<TABLE height=55 cellSpacing=0 cellPadding=0
																			width="100%" border=0>
																			<TBODY>
																				<TR>
																					<TD align=right>
																						<IMG height=46 src="${pageContext.request.contextPath}/public/images/index_12.gif" width=161>
																					</TD>
																				</TR>
																				<TR>
																					<TD class=tableBorder_B vAlign=top width="86%"
																						height=100>
																						<%
																						while(i<11){
																							Book book = booklist.get(i);
																						%>
																						<TABLE height=21 cellSpacing=0 cellPadding=0
																							width="100%" border=0>
																							<TBODY>
																								<TR>
																									<TD width="9%">
																										<IMG height=13 src="${pageContext.request.contextPath}/public/images/greendot.gif"
																											width=11>
																									</TD>
																									<TD
																										style="PADDING-RIGHT: 5px; PADDING-LEFT: 5px; PADDING-BOTTOM: 5px; PADDING-TOP: 5px"
																										width="91%">
																										<A
																											href="http://localhost:8085/Book/index/indexdetail?bid=<%=book.getBid() %>"><%=book.getBname() %></A>
																									</TD>
																								</TR>
																							</TBODY>
																						</TABLE>
																						<%
																							i++;
																						}
																						%>
																					</TD>
																				</TR>
																			</TBODY>
																		</TABLE>
																		<!-- 新书上架 -->

                                                                    </TD>
																</TR>
															</TBODY>
														</TABLE>
													</TD>
												</TR>
											</TBODY>
										</TABLE>
										<!--网页内容部分-->



















										<!-- 页脚部分 -->
										<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
											<TBODY>
												<TR>
													<TD>&nbsp;
														
													</TD>
												</TR>
												<TR>
													<TD bgColor=#83cc10 height=5></TD>
												</TR>
												<TR>
													<TD align=middle>
														<TABLE height=78 cellSpacing=-2 cellPadding=-2
															width="100%" align=center border=0>
															<TBODY>
																<TR>
																	<TD width=124 height=13>&nbsp;
																		
																	</TD>
																	<TD colSpan=3 height=13>
																		<DIV align=center></DIV>
																	</TD>
																	<TD width=141>&nbsp;
																		
																	</TD>
																</TR>
																<TR>
																	<TD width=124 height=13>&nbsp;
																		
																	</TD>
																	<TD align=middle colSpan=3 height=13>
																		<A
																			href="#">网上图书超市</A>客户服务热线：0516
																		- 85629999 85628888
																	</TD>
																	<TD width=141>&nbsp;
																		
																	</TD>
																</TR>
																<TR>
																	<TD colSpan=2 height=15>&nbsp;
																		
																	</TD>
																	<TD vAlign=bottom width=464>
																		<DIV align=center>
																			CopyRight &copy; 2021 www.dhee.com 
																		</DIV>
																	</TD>
																	<TD colSpan=2>&nbsp;
																		
																	</TD>
																</TR>
																<TR>
																	<TD colSpan=2>&nbsp;
																		
																	</TD>
																	<TD align=center>
																		<a href="/Book/admin/loginreflection">管理员登陆</a>																	</TD>
																	<TD colSpan=2>&nbsp;
																		
																	</TD>
																</TR>
																<TR>
																	<TD colSpan=2 height=15>&nbsp;
																		
																	</TD>
																	<TD align=middle>&nbsp;
																		
																	</TD>
																	<TD colSpan=2>&nbsp;
																		
																	</TD>
																</TR>
															</TBODY>
														</TABLE>
													</TD>
												</TR>
											</TBODY>
										</TABLE>
										<!-- 页脚部分 -->







									</TD>
								</TR>
							</TBODY>
						</TABLE>
						<!-- 显示页面信息的表格 -->
					</TD>
				</TR>
			</TBODY>
		</TABLE>
		<!-- 最外层的大表格 -->



	</BODY>
</HTML>