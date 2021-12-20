<%@page import="org.apache.struts2.components.Else"%>
<%@page import="com.dhee.bookshop.catelog.entity.Catelog"%>
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
		<TABLE cellSpacing=0 cellPadding=0 width="100%"
			 border=0>
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
														<A
															href="#">图书管理</A>
														≡≡≡
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
																		修改图书信息
																	</TD>
																</TR>
																<TR>
																	<TD class=word_grey vAlign=top colSpan=2 height=112>
																		<UL>
																			<LI>
																				书号：图书的ISBN，请务必输入正确，此项不能修改。
																			<LI>
																				发行日期：请输入该书首次发行的日期，如2005年10月。
																			<LI>
																				封面文件：请先将图书的封面文件保存到站点的manage\cover文件夹下，再输入文件名即可，包括扩展名，如：JSPxxxtkfaljx.jpg。


																			
																			<LI>
																				是否推荐：选择“是”该图书信息将显示在网站的首页中。
																			<LI>
																				是否新书：选择“是”该图书信息将显示在“新书上架”中。
																			</LI>
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
														<TABLE height=56 cellSpacing=0 cellPadding=0 width="100%"
															border=0>
															<TBODY>
																<TR>
																	<TD align=middle>&nbsp;
																		
																	</TD>
																</TR>
																<TR>
																<% 
																	Book book = (Book)request.getAttribute("book");
																%>
																	<TD align=middle>
																		<FORM name=form1 action="altbook?bid=<%=book.getBid()%>"
																			method=post enctype="multipart/form-data">
																			<TABLE cellSpacing=-2 borderColorDark=#ffffff
																				cellPadding=-2 width="100%" align=center border=0>
																				<TBODY>
																					<TR>
																						<TD width="14%" height=27>
																							&nbsp;ISBN：
																						</TD>
																						<TD height=27>
																							&nbsp;
																							<INPUT class=Sytle_text id=bookID2 value="<%=book.getBookisbn() %>"
																								name="book.bookisbn">
																						</TD>
																						<TD height=27>
																							&nbsp;书 名：
																						</TD>
																						<TD height=27>
																							&nbsp;
																							<INPUT class=Style_upload id=bookname2 value="<%=book.getBname() %>"
																							name="book.bname">
																						</TD>
																					</TR>
																					<TR>
																						<TD height=27>
																							&nbsp;作 者：
																						</TD>
																						<TD width="25%" height=27>
																							&nbsp;
																							<INPUT class=Style_upload id=writer value="<%=book.getWriter()%>"
																							name="book.writer">
																						</TD>
																						<TD width="15%" height=27>
																							&nbsp;类别名称：
																						</TD>
																						<TD width="46%" height=27>
																							&nbsp;
																							<select name="book.cid">
																								<%
																									List<Catelog> cateloglist = (List<Catelog>) request.getAttribute("cateloglist");
																									for (Catelog catelog : cateloglist) {
																								%>
																								<option <%if(catelog.getCid()==book.getCid()){
																									out.print("selected");
																								}
																								%> value=<%=catelog.getCid()%>><%=catelog.getCname()%></option>
																								<%} %>
																							</select>
																						</TD>
																					</TR>
																					<TR>
																						<TD height=27>
																							&nbsp;出&nbsp;版&nbsp;社：
																						</TD>
																						<TD height=27>
																							&nbsp;
																							<INPUT class=Style_upload id=TPI value="<%=book.getPublish()%>"
																							name="book.publish">
																						</TD>
																						<TD height=27>
																							&nbsp;发行日期：
																						</TD>
																						<TD height=27>
																							&nbsp;
																							<INPUT type="date" class=Sytle_text id=pDate value="<%=book.getPdate()%>"
																							name="book.pdate">
																						</TD>
																					</TR>
																					<TR>
																						<TD height=41>
																							&nbsp;封面文件：
																						</TD>
																						<TD height=71 width="45%">
																							&nbsp;
																							<img type="text" id="preview" name="picture" class="input tips" style="width:55%;" src="../public/upload/<%=book.getImgpath()%>" value="" data-toggle="hover" data-place="right" data-image=""  />
																							<%=book.getImgpath()%>
																						</TD>
																							
<!-- 																						<td></td> -->
<!-- 																						<TD> -->
<!-- 																						</TD> -->
																					</TR>
																					<tr>
																						<td></td>
																						<td>
																						<input type="file" name="mfile" class=Style_upload >
																						</td>
																					</tr>
																					<TR>
																						<TD height=41>
																							&nbsp;价 格：
																						</TD>
																						<TD height=41>
																							&nbsp;
																							<INPUT class=Sytle_text id=price value="<%=book.getPrice()%>"
																							name="book.price">(元)
																						</TD>
																					</TR>
																					<TR>
																						<TD height=45>
																							&nbsp;是否推荐：
																						</TD>
																						<TD>
																							&nbsp;
																							<INPUT class=noborder type=radio value=1
																							<%
																							if(book.getIscommand()!=null){
																							if(book.getIscommand().equals("1")){
																								out.print("checked");
																							}}
																							%> name="book.iscommand">
																							是
																							<INPUT class=noborder type=radio value=0
																							<%
																							if(book.getIscommand()!=null){
																							if(book.getIscommand().equals("0")){
																								out.print("checked");
																							}}
																							%> name="book.iscommand">
																							否
																						</TD>
																						<TD>
																							&nbsp;是否新书：
																						</TD>
																						<TD>
																							<INPUT class=noborder type=radio value=1
																							<%
																							if(book.getIsnew()!=null){
																							if(book.getIsnew().equals("1")){
																								out.print("checked");
																							}}
																							%> name="book.isnew">
																							是
																							<INPUT class=noborder type=radio value=0
																							<%
																							if(book.getIsnew()!=null){
																							if(book.getIsnew().equals("0")){
																								out.print("checked");
																							}}
																							%> name="book.isnew">
																							否
																						</TD>
																					</TR>
																					<TR>
																						<TD height=103>
																							&nbsp;图书简介：
																						</TD>
																						<TD colSpan=3>
																							<SPAN class=style5>&nbsp; </SPAN>
																							<TEXTAREA class=textarea id=introduce
																								name="book.demo" rows=5 cols=60><%=book.getDemo()%></TEXTAREA>
																						</TD>
																					</TR>
																					<TR>
																						<TD align=middle colSpan=4 height=38>
																							<INPUT class=btn_grey type=submit value=保存 name=Button>
																							&nbsp;
																							<INPUT class=btn_grey type=reset value=重置 name=Submit2>
																							&nbsp;
																							<INPUT class=btn_grey
																								onclick=JScript:history.back() type=button
																								value=返回 name=Submit3>
																						</TD>
																					</TR>
																				</TBODY>
																			</TABLE>
																		</FORM>
																	</TD>
																</TR>
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
					</TD>
				</TR>
			</TBODY>
		</TABLE>
	</BODY>
</HTML>
