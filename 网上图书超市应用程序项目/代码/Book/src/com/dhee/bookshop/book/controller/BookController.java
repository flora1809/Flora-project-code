package com.dhee.bookshop.book.controller;

import java.util.List;

import javax.servlet.http.HttpServletRequest;

import org.apache.struts2.ServletActionContext;
import org.apache.struts2.interceptor.ServletRequestAware;

import com.dhee.bookshop.book.entity.Book;
import com.dhee.bookshop.book.service.BookService;
import com.dhee.bookshop.book.service.BookServiceImpl;
import com.dhee.bookshop.catelog.entity.Catelog;
import com.dhee.bookshop.manager.catelog.service.CatelogServiceImpl;
import com.opensymphony.xwork2.ActionSupport;

public class BookController extends ActionSupport implements ServletRequestAware  {

	private List<Catelog> cateloglist;
	private List<Book> booklist;
	private Integer page;
	/* 总页数 */
	private Integer countPage;
	private String catelogname;
	private String result;
	private HttpServletRequest request;
	
	/**
	 * @return the cateloglist
	 */
	public List<Catelog> getCateloglist() {
		return cateloglist;
	}
	/**
	 * @param cateloglist the cateloglist to set
	 */
	public void setCateloglist(List<Catelog> cateloglist) {
		this.cateloglist = cateloglist;
	}
	/**
	 * @return the booklist
	 */
	public List<Book> getBooklist() {
		return booklist;
	}
	/**
	 * @param booklist the booklist to set
	 */
	public void setBooklist(List<Book> booklist) {
		this.booklist = booklist;
	}
	/**
	 * @return the page
	 */
	public Integer getPage() {
		return page;
	}
	/**
	 * @param page the page to set
	 */
	public void setPage(Integer page) {
		this.page = page;
	}
	/**
	 * @return the countPage
	 */
	public Integer getCountPage() {
		return countPage;
	}
	/**
	 * @param countPage the countPage to set
	 */
	public void setCountPage(Integer countPage) {
		this.countPage = countPage;
	}
		/**
	 * @return the catelogname
	 */
	public String getcatelogname() {
		return catelogname;
	}
	/**
	 * @param catelogname the catelogname to set
	 */
	public void setcatelogname(String catelogname) {
		this.catelogname = catelogname;
	}
	/* (non-Javadoc)
	 * @see org.apache.struts2.interceptor.ServletRequestAware#setServletRequest(javax.servlet.http.HttpServletRequest)
	 */
	
	/**
	 * @return the result
	 */
	public String getResult() {
		return result;
	}
	/**
	 * @param result the result to set
	 */
	public void setResult(String result) {
		this.result = result;
	}
	@Override
	public void setServletRequest(HttpServletRequest request) {
		// TODO Auto-generated method stub
		this.request = request;
	}
	
	
		// 分类列表显示
		public String bookCatelog() {
			CatelogServiceImpl catelogServiceImpl = new CatelogServiceImpl();
			BookServiceImpl bookServiceImpl = new BookServiceImpl();
			request=ServletActionContext.getRequest();
			catelogname = (String)request.getParameter("catelogname");
			cateloglist = catelogServiceImpl.selAll();
			if (catelogname == null || catelogname.equals("全部图书")) {
				catelogname = "全部图书";
				request.setAttribute("catelogname", catelogname);
				if (page == null) {
					page = 1;
				}
				booklist = bookServiceImpl.selAll(page);
				countPage=bookServiceImpl.countPage();
			}
			else {
				Catelog catelog = new Catelog();
				catelog.setCname(catelogname);
				booklist = bookServiceImpl.selCatelog(catelog);
				if(booklist.size() == 0){
					Book book = new Book();
					book.setBname("暂无图书");
					book.setPublish("");
					booklist.add(book);
				}
				countPage=1;
				page=1;
				catelogname = catelog.getCname();
				request.setAttribute("catelogname", catelogname);
			}
			return "success";

		}
		// 图书管理显示
		public String book() {
			BookServiceImpl bookServiceImpl = new BookServiceImpl();
			if (page == null) {
				page = 1;
			}
			booklist = bookServiceImpl.selAll(page);
			countPage = bookServiceImpl.countPage();
			return "success";
		}
		//图书商城首页
		public String index() {
			BookServiceImpl bookServiceImpl = new BookServiceImpl();
			booklist = bookServiceImpl.selAll();
			return "success";
		}

}
