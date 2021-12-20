package com.dhee.bookshop.book.controller;

import java.io.File;
import java.io.IOException;
import java.sql.Date;
import java.text.SimpleDateFormat;
import java.util.List;

import javax.servlet.http.HttpServletRequest;

import org.apache.commons.io.FileUtils;
import org.apache.struts2.ServletActionContext;
import org.apache.struts2.interceptor.ServletRequestAware;

import com.dhee.bookshop.book.entity.Book;
import com.dhee.bookshop.book.service.BookServiceImpl;
import com.dhee.bookshop.catelog.entity.Catelog;
import com.dhee.bookshop.manager.catelog.service.CatelogServiceImpl;
import com.opensymphony.xwork2.ActionSupport;

public class BookOperationController extends ActionSupport implements ServletRequestAware   {

	private Book book;
	private int bid;
	private File mfile;//定义一个File ,变量名要与jsp中的input标签的name一致
    private String mfileFileName;//上传文件的名称
	private List<Catelog> cateloglist;
	private HttpServletRequest request;
	private String result;
	/**
	 * @return the book
	 */
	public Book getBook() {
		return book;
	}
	/**
	 * @param book the book to set
	 */
	public void setBook(Book book) {
		this.book = book;
	}
	
	/**
	 * @return the bid
	 */
	public int getBid() {
		return bid;
	}
	/**
	 * @param bid the bid to set
	 */
	public void setBid(int bid) {
		this.bid = bid;
	}
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
	/* (non-Javadoc)
	 * @see org.apache.struts2.interceptor.ServletRequestAware#setServletRequest(javax.servlet.http.HttpServletRequest)
	 */
	@Override
	public void setServletRequest(HttpServletRequest request) {
		// TODO Auto-generated method stub
		this.request = request;
	}
	/**
	 * @return the mfile
	 */
	public File getMfile() {
		return mfile;
	}
	/**
	 * @param mfile the mfile to set
	 */
	public void setMfile(File mfile) {
		this.mfile = mfile;
	}
	
	/**
	 * @return the mfileFileName
	 */
	public String getMfileFileName() {
		return mfileFileName;
	}
	/**
	 * @param mfileFileName the mfileFileName to set
	 */
	public void setMfileFileName(String mfileFileName) {
		this.mfileFileName = mfileFileName;
	}

	public void uploadFile(){
        try {
            //在WebContent下新建一个upload的文件夹,获取其在服务器的绝对磁盘路径
            String path = ServletActionContext.getServletContext().getRealPath("/public/upload");
            String filepath = path+'/'+this.getMfileFileName();
            
            //创建一个服务器端的文件
            File dest = new File(filepath);
 
            //完成文件上传的操作
            FileUtils.copyFile(mfile,dest);
 
        } catch (IOException e) {
            e.printStackTrace();
        }
    }

	
	
	
	
	
	public String addreflection() {
		CatelogServiceImpl catelogServiceImpl = new CatelogServiceImpl();
		cateloglist = catelogServiceImpl.selAll();
		return "success";
	}
	
	public String addbook() {
		BookServiceImpl bookServiceImpl = new BookServiceImpl();
		if(book.getPrice()==null){
			book.setPrice(0.0);
		}
		if(mfile != null){
			uploadFile();
		}
		book.setImgpath(getMfileFileName());
		result = bookServiceImpl.addBook(book);
		return "success";
	}
	
	public String delbook() {
		book = new Book();
		book.setBid(bid);
		BookServiceImpl bookServiceImpl = new BookServiceImpl();
		result = bookServiceImpl.delBook(book);
		return "success";
	}
	
	public String altreflection() {
		book = new Book();
		book.setBid(bid);
		CatelogServiceImpl catelogServiceImpl = new CatelogServiceImpl();
		cateloglist = catelogServiceImpl.selAll();
		BookServiceImpl bookServiceImpl = new BookServiceImpl();
		book = bookServiceImpl.detail(book);
		return "success";
	}
	
	public String altbook() {
		BookServiceImpl bookServiceImpl = new BookServiceImpl();
		book.setBid(bid);
		if(this.getMfile()!=null){
			if(mfile.exists()){
				uploadFile();
				book.setImgpath(getMfileFileName());
			}else {
				result = "照片不存在，请重新修改";
				return "success";
			}
		}else {
			book.setImgpath(bookServiceImpl.detail(book).getImgpath());
		}
		result = bookServiceImpl.altBook(book);
		return "success";
	}
	
	public String bookdetail() {
		book = new Book();
		book.setBid(bid);
		BookServiceImpl bookServiceImpl = new BookServiceImpl();
		book = bookServiceImpl.detail(book);
		return "success";
	}
	
	
}
