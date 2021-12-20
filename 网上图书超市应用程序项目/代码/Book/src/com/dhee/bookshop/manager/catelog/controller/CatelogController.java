package com.dhee.bookshop.manager.catelog.controller;

import java.util.List;

import javax.servlet.http.HttpServletRequest;

import org.apache.struts2.interceptor.ServletRequestAware;

import com.dhee.bookshop.catelog.entity.Catelog;
import com.dhee.bookshop.manager.catelog.service.CatelogServiceImpl;
import com.opensymphony.xwork2.ActionSupport;

public class CatelogController {
	private List<Catelog> list;
	private Catelog catelog;
	private int cid;
	private Integer page;
	private String result;
	/* 总页数 */
	private Integer countPage;

	
	/**
	 * @return the catelog
	 */
	public Catelog getCatelog() {
		return catelog;
	}

	/**
	 * @param catelog the catelog to set
	 */
	public void setCatelog(Catelog catelog) {
		this.catelog = catelog;
	}

	/**
	 * @return the cid
	 */
	public int getCid() {
		return cid;
	}

	/**
	 * @param cid the cid to set
	 */
	public void setCid(int cid) {
		this.cid = cid;
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

	public void setCountPage(Integer countPage) {
		this.countPage = countPage;
	}

	public Integer getCountPage() {
		return countPage;
	}

	public void setPage(Integer page) {
		this.page = page;
	}

	public Integer getPage() {
		return page;
	}

	public void setList(List<Catelog> list) {
		this.list = list;
	}

	public List<Catelog> getList() {
		return list;
	}

	
	// 分类列表显示
	public String catelogList() {
		if (page == null) {
			page = 1;
		}
		CatelogServiceImpl catelogServiceImpl = new CatelogServiceImpl();
		list = catelogServiceImpl.selAll(page);
		
		countPage=catelogServiceImpl.countCatelog();
		return "success";
	}
	
	public String catelogAdd() {
		CatelogServiceImpl catelogServiceImpl = new CatelogServiceImpl();
		result = catelogServiceImpl.addCatelog(catelog);
		return "success";
	}
	
	public String catelogDel() {
		CatelogServiceImpl catelogServiceImpl = new CatelogServiceImpl();
		catelog = new Catelog();
		catelog.setCid(cid);
		result = catelogServiceImpl.delCatelog(catelog);
		return "success";
	}
}
