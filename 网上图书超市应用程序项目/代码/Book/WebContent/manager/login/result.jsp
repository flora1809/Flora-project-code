<%@ page language="java" contentType="text/html; charset=UTF-8"
	pageEncoding="UTF-8"%>
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
																			href="/Book/admin/loginreflection">退出</A>&nbsp;
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
																		<A href="/Bookadmin/loginreflection">Quit</A>&nbsp;
																	</TD>
																</TR>
															</TBODY>
														</TABLE>
													</TD>
												</TR>
											</TBODY>
										</TABLE>
										<!--后台导航菜单-->
										
										<table align="center">
                                          <tr><td>欢迎登陆网上图书后台系统  </td>
										           
                                        <td> 请开始你的表演！</td></tr>
                                          </table>




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
