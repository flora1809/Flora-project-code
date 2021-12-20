<%@page import="com.dhee.bookshop.book.entity.Book"%>
<%@page import="java.util.List"%>
<%@ page language="java" contentType="text/html; charset=UTF-8"
	pageEncoding="UTF-8"%>
<%@taglib prefix="s" uri="/struts-tags" %>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<HTML>
	<HEAD>
	 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<TITLE>网上图书超市</TITLE>
		<LINK href="${pageContext.request.contextPath}/public/css/style.css" rel="stylesheet" />
	</HEAD>
	<BODY>
		<!--最外层大表格-->
		<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
			<TBODY>
				<TR>
					<TD>
						<TABLE height=609 cellSpacing=0 cellPadding=0 width=777
							align=center bgColor=#ffffff border=0>
							<TBODY>
								<TR>
									<TD vAlign=top>




										<!--后台导航菜单-->
										<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
											<TBODY>
												<TR>
													<TD bgColor=#81cf00 colSpan=2 height=6></TD>
												</TR>
												<TR>
													<TD width="28%" height=70>
														<IMG height=58 src="${pageContext.request.contextPath}/public/images/index_ht.gif" width=221>
													</TD>
													<TD vAlign=top width="72%">
														<TABLE height=35 cellSpacing=0 cellPadding=0 width="100%"
															border=0>
															<TBODY>
																<TR align=middle>
																	<TD vAlign=bottom rowSpan=2>&nbsp;
																		
																  </TD>
																	<TD vAlign=bottom height=22>
																		<A
																			href="/Book/book/book">图书管理</A>
																	</TD>
																	<TD vAlign=top width=1 rowSpan=2>
																		<IMG height=36 src="${pageContext.request.contextPath}/public/images/Nav_separate.gif" width=1>
																	</TD>
																	<TD vAlign=bottom>
																		<A
																			href="#">用户管理</A>
																	</TD>
																	<TD vAlign=top width=1 rowSpan=2>
																		<IMG height=36 src="${pageContext.request.contextPath}/public/images/Nav_separate.gif" width=1>
																	</TD>
																	<TD vAlign=bottom>
																		<A
																			href="#">订单管理</A>
																	</TD>
																	<TD vAlign=top width=1 rowSpan=2>
																		<IMG height=36 src="${pageContext.request.contextPath}/public/images/Nav_separate.gif" width=1>
																	</TD>
																	<TD vAlign=bottom>
																		<A
																			href="/Book/manage_catelog/catelogList">分类管理</A>
																	</TD>
																	<TD vAlign=top width=1 rowSpan=2>
																		<IMG height=36 src="${pageContext.request.contextPath}/public/images/Nav_separate.gif" width=1>
																	</TD>
																	
																	<TD vAlign=bottom>
																		&nbsp;
																		<A
																			href="/admin/loginreflection">退出</A>&nbsp;
																	</TD>
																</TR>
																<TR align=middle>
																	<TD height=13>
																		<A
																			href="/Book/book/book">Books
																			Manage</A>
																	</TD>
																	<TD>
																		<A
																			href="#">Member
																			Manage</A>
																	</TD>
																	<TD>
																		<A
																			href="#">Order
																			Manage</A>
																	</TD>
																	<TD>
																		<A
																			href="/Book/manage_catelog/catelogList">Catelog
																			Manage </A>
																	</TD>
																	
																	<TD>
																		&nbsp;
																		<A
																			href="/Book/admin/loginreflection">Quit</A>&nbsp;
																	</TD>
																</TR>
															</TBODY>
														</TABLE>
													</TD>
												</TR>
											</TBODY>
										</TABLE>
										<!--后台导航菜单-->



										<!--标题部分-->
										<TABLE class=tableBorder_LTR cellSpacing=0 cellPadding=0
											width="100%" border=0>
											<TBODY>
												<TR>
													<TD align=middle bgColor=#eeeeee height=30>
														≡≡≡
														<A href="#">所有图书列表</A> ≡≡≡
													</TD>
												</TR>
											</TBODY>
										</TABLE>
										<!--标题部分-->



										<!--内容部分-->
										<TABLE class=tableBorder_LBR height=396 cellSpacing=0
											cellPadding=0 width="100%" border=0>
											<TBODY>
												<TR>
													<!--说明部分-->
													<TD vAlign=top width="26%" height=395>
														<TABLE cellSpacing=-2 cellPadding=-2 width="100%" border=0>
															<TBODY>
																<TR>
																	<TD class=word_grey align=middle width="55%" height=82>
																		&nbsp;
																		<IMG height=54 src="${pageContext.request.contextPath}/public/images/reg.gif" width=84>
																	</TD>
																	<TD class=word_grey align=left width="45%">
																		图书管理详情
																	</TD>
																</TR>
																<TR>
																	<TD class=word_grey vAlign=top colSpan=2 height=112>
																		<UL>
															
																		</UL>
																	</TD>
																</TR>
																<TR align=middle>
																	<TD class=word_grey vAlign=center colSpan=2></TD>
																</TR>
															</TBODY>
														</TABLE>
													</TD>
													<!--说明部分-->

													<!--表单部分-->
													<!--分隔条-->
													<TD vAlign=top width=5 background=${pageContext.request.contextPath}/public/images/Cen_separate.gif></TD>
													<!--分隔条-->

													<TD vAlign=top width="73%">
														<TABLE height=14 cellSpacing=0 cellPadding=0 width="100%"
															border=0>
															<TBODY>
															
																			<TABLE height=123 cellSpacing=0 cellPadding=0
																			width="100%" border=0>
																			<TBODY>
																				<TR>
																				<% 
																					Book book = (Book)request.getAttribute("book");
																				%>
																					<TD width="77%">
																						<TABLE height=202 cellSpacing=0 cellPadding=0
																							width="100%" border=0>
																							<TBODY>
																								<TR>
																									<TD width="16%" height=24>
																										书&nbsp;&nbsp;号：
																									</TD>
																									<TD width="84%">
																										<%=book.getBid() %>
																									</TD>
																								</TR>
																								<TR>
																									<TD width="16%" height=24>
																										ISBN：
																									</TD>
																									<TD width="84%">
																										<%=book.getBookisbn() %>
																									</TD>
																								</TR>
																								<TR>
																									<TD width="16%" height=24>
																										书&nbsp;&nbsp;名：
																									</TD>
																									<TD width="84%">
																										<%=book.getBname()%>
																									</TD>
																								</TR>
																								<TR>
																									<TD height=24>
																										出版社：
																									</TD>
																									<TD>
																										<%=book.getPublish()%>
																									</TD>
																								</TR>
																								<TR>
																									<TD height=24>
																										作&nbsp;&nbsp;者：
																									</TD>
																									<TD>
																										<%=book.getWriter()%>
																									</TD>
																								</TR>
																								<TR>
																									<TD height=24>
																										定 &nbsp;价：
																									</TD>
																									<TD>
																										<%=book.getPrice()%>（元）
																									</TD>
																								</TR>
																								<TR>
																									<TD height=24>
																										出版日期：
																									</TD>
																									<TD>
																										<%=book.getPdate()%>
																									</TD>
																								</TR>
																								<TR>
																									<TD height=24>
																										&nbsp;图书简介：
																									</TD>
																									<TD colSpan=2 height=39>
																										<%=book.getDemo()%>
																									</TD>
																								</TR>
																								<TR>
																									<TD align=middle colSpan=4 height=38>
																										<INPUT class=btn_grey
																											onclick=JScript:history.back() type=button
																											value=返回 name=Submit3>
																									</TD>
																								</TR>
																							</TBODY>
																						</TABLE>
																					</TD>
																				</TR>
																			</TBODY>
																		</TABLE>
																	</TD>

																</tr>
															</TBODY>
														</TABLE>
														
													</TD>

													<!--表单部分-->
												</TR>
											</TBODY>
										</TABLE>
										<!--内容部分-->

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
																		<A href="#">网上图书超市</A>客户服务热线：0516 - 85629999 85628888
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
					</TD>
				</TR>
			</TBODY>
		</TABLE>
	</BODY>
</HTML>
