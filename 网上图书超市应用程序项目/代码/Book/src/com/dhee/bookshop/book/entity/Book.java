package com.dhee.bookshop.book.entity;

import java.sql.Date;
import java.text.SimpleDateFormat;

public class Book {

	/* 图书id */
	private Integer bid;
	/* 图书名称 */
	private String bname;
	/* 图书分类id */
	private Integer cid;
	/*图书ISBN*/
	private String bookisbn;
	/*图书作者*/
	private String writer;
	/*图书出版社*/
	private String publish;
	/*图书出版日期*/
//	private String pdate;
	private Date pdate;
	/*图书封面*/
	private String imgpath;
	/*图书定价*/
	private Double price;
	/*是否推荐*/
	private String iscommand;
	/*是否新书*/
	private String isnew;
	/*图书简介*/
	private String demo;
	/**
	 * @return the bookisbn
	 */
	public String getBookisbn() {
		return bookisbn;
	}
	/**
	 * @param bookisbn the bookisbn to set
	 */
	public void setBookisbn(String bookisbn) {
		this.bookisbn = bookisbn;
	}
	/**
	 * @return the writer
	 */
	public String getWriter() {
		return writer;
	}
	/**
	 * @param writer the writer to set
	 */
	public void setWriter(String writer) {
		this.writer = writer;
	}
	/**
	 * @return the publish
	 */
	public String getPublish() {
		return publish;
	}
	/**
	 * @param publish the publish to set
	 */
	public void setPublish(String publish) {
		this.publish = publish;
	}
	
///**
//	 * @return the pdate
//	 */
//	public String getPdate() {
//		return pdate;
//	}
//	/**
//	 * @param pdate the pdate to set
//	 */
//	public void setPdate(String pdate) {
//		this.pdate = pdate;
//	}
	//	/**
//	 * @return the pdate
//	 */
	public Date getPdate() {
		return pdate;
	}
	/**
	 * @param pdate the pdate to set
	 */
	public void setPdate(Date pdate) {
		this.pdate = pdate;
	}
	public void setPdate(String strDate) {
		SimpleDateFormat format = new SimpleDateFormat("yyyy-MM-dd");
        java.util.Date d = null;
        try {
            d = format.parse(strDate);
        } catch (Exception e) {
            e.printStackTrace();
        }
        java.sql.Date pdate = new java.sql.Date(d.getTime());
		this.pdate = pdate;
	}
	/**
	 * @return the imgpath
	 */
	public String getImgpath() {
		return imgpath;
	}
	/**
	 * @param imgpath the imgpath to set
	 */
	public void setImgpath(String imgpath) {
		this.imgpath = imgpath;
	}
	/**
	 * @return the price
	 */
	public Double getPrice() {
		return price;
	}
	/**
	 * @param price the price to set
	 */
	public void setPrice(Double price) {
		this.price = price;
	}
//	public void setPrice(String sprice) {
//		Double price = null;
//		if(sprice.equals("null")){
//			price = 0.0;
//		}else {
//			price=Double.valueOf(sprice);
//		}
//		this.price = price;
//	}
	/**
	 * @return the iscommand
	 */
	public String getIscommand() {
		return iscommand;
	}
	/**
	 * @param iscommand the iscommand to set
	 */
	public void setIscommand(String iscommand) {
		this.iscommand = iscommand;
	}
	/**
	 * @return the isnew
	 */
	public String getIsnew() {
		return isnew;
	}
	/**
	 * @param isnew the isnew to set
	 */
	public void setIsnew(String isnew) {
		this.isnew = isnew;
	}
	/**
	 * @return the demo
	 */
	public String getDemo() {
		return demo;
	}
	/**
	 * @param demo the demo to set
	 */
	public void setDemo(String demo) {
		this.demo = demo;
	}
	/**
	 * @return the bid
	 */
	public Integer getBid() {
		return bid;
	}
	/**
	 * @param bid the bid to set
	 */
	public void setBid(Integer bid) {
		this.bid = bid;
	}
	/**
	 * @return the bname
	 */
	public String getBname() {
		return bname;
	}
	/**
	 * @param bname the bname to set
	 */
	public void setBname(String bname) {
		this.bname = bname;
	}
	/**
	 * @return the cid
	 */
	public Integer getCid() {
		return cid;
	}
	/**
	 * @param cid the cid to set
	 */
	public void setCid(Integer cid) {
		this.cid = cid;
	}
}
