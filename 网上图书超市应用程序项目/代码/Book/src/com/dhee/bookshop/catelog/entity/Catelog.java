package com.dhee.bookshop.catelog.entity;

/**
 * 
 * @author Administrator 
 * 图书分类实体类
 */
public class Catelog {
	/* 图书分类id */
	private Integer cid;
	/* 图书分类名称 */
	private String cname;

	public Catelog() {
		// TODO Auto-generated constructor stub
	}

	public Catelog(Integer cid, String cname) {
		super();
		this.cid = cid;
		this.cname = cname;
	}

	public Integer getCid() {
		return cid;
	}

	public String getCname() {
		return cname;
	}

	public void setCid(Integer cid) {
		this.cid = cid;
	}

	public void setCname(String cname) {
		this.cname = cname;
	}

	@Override
	public String toString() {
		return "Catelog [cid=" + cid + ", cname=" + cname + "]";
	}

}
