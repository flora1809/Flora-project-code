<%@page import="com.dhee.bookshop.book.entity.Book"%>
<%@page import="com.dhee.bookshop.catelog.entity.Catelog"%>
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
		<script type="text/javascript" src="${pageContext.request.contextPath}/public/js/bookcatelog.js"></script>
	</head>

	<body>
		<!-- 最外层的大表格 -->
		<table cellpadding="0" cellspacing="0" border="0" width="100%"
			height="100%">

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
														<TABLE height=35 cellSpacing=0 cellPadding=0 width="100%"
															border=0>
															<TBODY>
																<TR align=middle>
																	<TD vAlign=bottom height=22>
																		<A href="/Book/index/index">首页</A>
																	</TD>
																	<TD vAlign=top width=1 rowSpan=2>
																		<IMG height=36 src="${pageContext.request.contextPath}/public/images/Nav_separate.gif" width=1>
																	</TD>
																	<TD vAlign=bottom>
																		<A href="#">新书上架</A>
																	</TD>
																	<TD vAlign=top width=1 rowSpan=2>
																		<IMG height=36 src="${pageContext.request.contextPath}/public/images/Nav_separate.gif" width=1>
																	</TD>
																	<TD vAlign=bottom>
																		<A href="">图书分类</A>
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
																		<IMG height=36 src="${pageContext.request.contextPath}/public/images/Nav_separate.gif" width=1>																	</TD>
																	<TD vAlign=bottom>&nbsp;</TD>

																</TR>
																<TR align=middle>
																	<TD height=13>
																		<A href="/Book/index/index">Index</A>
																	</TD>
																	<TD>
																		<A href="#">New Books</A>
																	</TD>
																	<TD>
																		<A href="">Book Sort</A>
																	</TD>
																	<TD>
																		<A href="#">Shopping Bag</A>
																	</TD>
																	<TD>
																		<A href="#">Order Search</A>																	</TD>
																	<TD>&nbsp;</TD>
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
													<TD vAlign=top width="26%">
														<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
															<TBODY>
																<TR>
																	<TD align=middle height=40>&nbsp;
																		
																	</TD>
																	<TD align=middle background=${pageContext.request.contextPath}/public/images/bg_booksort.gif
																		height=40>
																		<TABLE height=26 cellSpacing=0 cellPadding=0
																			width="100%" border=0>
																			<TBODY>
																				<TR>
																					<TD class=word_white align=right width="29%">
																						<IMG height=25 src="${pageContext.request.contextPath}/public/images/ico_booksort.gif"
																							width=25>
																					</TD>
																					<TD class=word_white width="71%">
																						&nbsp;<A href="/Book/index/bookCatelog">图书分类列表</A>
																					</TD>
																				</TR>
																			</TBODY>
																		</TABLE>
																	</TD>
																</TR>
																<TR>
																	<TD width=20 height=31>&nbsp;
																		
																	</TD>
																	<TD width=182 height=31>
																	<%
																		List<Catelog> cateloglist = (List<Catelog>) request.getAttribute("cateloglist");
																		for (Catelog catelog : cateloglist) {
																	%>
																		<TABLE class=tableBorder_B1 height=22 cellSpacing=0
																			cellPadding=0 width="100%" border=0>
																			<TBODY>
																				<TR>
																					<TD align=right width="16%">
																						<IMG height=14 src="${pageContext.request.contextPath}/public/images/boardlist.gif" width=25>
																					</TD>
																					<TD width="84%" height=26>
																						<A href="javascript:void(0)" onclick='catelog("<%=catelog.getCname()%>")'>&nbsp;<%=catelog.getCname()%></A>
																					</TD>
																				</TR>
																			</TBODY>
																		</TABLE>
																	<%
																		}
																	%>
																	</TD>
																</TR>
															</TBODY>
														</TABLE>
													</TD>
													<!--左边内容部分，占26%的宽度-->




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
																		<FORM name=form2 action="" method=post>
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








																<!--新书上架内容部分-->
																<tr>
																	<td valign="top">
																		<TABLE width="100%" height=126 border=0 cellPadding=0
																			cellSpacing=0>
																			<TBODY>
																				<TR>
																					<TD>
																						<TABLE height=55 cellSpacing=0 cellPadding=0
																							width="100%" border=0>
																							<TBODY>
																								<TR>
																									<TD class=tableBorder_B>
																										图书类别：<%
																													String catelogname = (String) request.getAttribute("catelogname");
																													out.print(catelogname);
																												%>
																									</TD>
																								</TR>
																								<TR>
																									<TD vAlign=top width="86%" height=100>
																										<TABLE class=tableBorder_B height=34
																											cellSpacing=0 cellPadding=0 width="96%"
																											align=center border=0>
																											<TBODY>
																												<TR>
																													<TD align=middle width="6%" height=33>&nbsp;
																														
																													</TD>
																													<TD
																														style="PADDING-RIGHT: 5px; PADDING-LEFT: 5px; PADDING-BOTTOM: 5px; PADDING-TOP: 5px"
																														width="48%">
																														书名
																													</TD>
																													<TD
																														style="PADDING-RIGHT: 5px; PADDING-LEFT: 5px; PADDING-BOTTOM: 5px; PADDING-TOP: 5px"
																														width="35%">
																														出版社
																													</TD>
																													<TD
																														style="PADDING-RIGHT: 5px; PADDING-LEFT: 5px; PADDING-BOTTOM: 5px; PADDING-TOP: 5px"
																														width="11%">
																														价 格
																														
																													</TD>
																												</TR>
																											</TBODY>
																										</TABLE>
																										<%
																											List<Book> booklist = (List<Book>) request.getAttribute("booklist");
																											for (Book book : booklist) {
																										%>
																										<TABLE class=tableBorder_B height=21
																											cellSpacing=0 cellPadding=0 width="96%"
																											align=center border=0>
																											<TBODY>
																												<TR>
																													<TD align=middle width="6%">
																														<IMG height=13 src="${pageContext.request.contextPath}/public/images/greendot.gif"
																															width=11>
																													</TD>
																													<TD
																														style="PADDING-RIGHT: 5px; PADDING-LEFT: 5px; PADDING-BOTTOM: 5px; PADDING-TOP: 5px"
																														width="48%">
																														<A
																															href="http://localhost:8085/Book/index/indexdetail?bid=<%=book.getBid() %>"><%=book.getBname()%></A>
																													</TD>
																													<TD
																														style="PADDING-RIGHT: 5px; PADDING-LEFT: 5px; PADDING-BOTTOM: 5px; PADDING-TOP: 5px"
																														width="35%">
																														<%=book.getPublish()%>
																													</TD>
																													<TD
																														style="PADDING-RIGHT: 5px; PADDING-LEFT: 5px; PADDING-BOTTOM: 5px; PADDING-TOP: 5px"
																														width="11%">
																														<%
																														if(book.getPrice() == null){ out.print("&nbsp&nbsp—"); }
																														else{ out.print(book.getPrice()); }
																														%>
																													</TD>
																												</TR>
																											</TBODY>
																										</TABLE>
																									<%
																										}
																									%>
																									<TABLE cellSpacing=0 cellPadding=0 width="100%"
																										border=0>
																										<TBODY>
																											<TR>
																												<%
																													int nowPage = (Integer) request.getAttribute("page");
																													int countPage = (Integer) request.getAttribute("countPage");
																												%>
																												<TD align=right>
																													<%
																														if (nowPage == 1 && nowPage != countPage) {
																															//显示下一页,尾页
																													%> 当前页数：[<%=nowPage%>/<%=countPage%>]&nbsp; <A
																													href="javascript:void(0)"
																													onclick='nextPage(<%=nowPage%>)'>下一页</A> <A
																													href="javascript:void(0)"
																													onclick='endPage(<%=countPage%>)'>最后一页&nbsp;</A>
																													<%
																														}
																													%> <%
 	if (nowPage != 1 && nowPage != countPage) {//显示首页,上一页 ,下一页,尾页
 %> <A href="javascript:void(0)" onclick='firstPage()'>首页</A>
																													<A href="javascript:void(0)"
																													onclick='upPage(<%=nowPage%>)'>上一页&nbsp;</A>
																													当前页数：[<%=nowPage%>/<%=countPage%>]&nbsp; <A
																													href="javascript:void(0)"
																													onclick='nextPage(<%=nowPage%>)'>下一页</A> <A
																													href="javascript:void(0)"
																													onclick='endPage(<%=countPage%>)'>最后一页&nbsp;</A>
																													<%
																														}
																													%> <%
 	if (nowPage == countPage && nowPage != 1) { //显示首页,上一页
 %> <A href="javascript:void(0)" onclick='firstPage()'>首页</A>
																													<A href="javascript:void(0)"
																													onclick='upPage(<%=nowPage%>)'>上一页&nbsp;</A>
																													当前页数：[<%=nowPage%>/<%=countPage%>]&nbsp; <%
																		}
																	%><%
																	if (nowPage == countPage && nowPage == 1) {
																	%>当前页数：[<%=nowPage%>/<%=countPage%>]&nbsp; <%
																		}
																	%>


																												</TD>
																											</TR>
																									</TABLE>
																								</TD>
																								</TR>
																							</TBODY>
																						</TABLE>
																					</TD>
																				</TR>
																			</TBODY>
																		</TABLE>
																	</td>

																</tr>
																<!--新书上架内容部分-->



























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
																	<TD align=middle>
																		本站请使用IE6.0或以上版本 1024*768为最佳显示效果
																	</TD>
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