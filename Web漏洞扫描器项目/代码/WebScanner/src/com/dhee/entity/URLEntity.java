package com.dhee.entity;

public class URLEntity {

	private String id;
	private String url;
	private String UserId;
	private int status;
	private int sql;
	private int xss;

	public URLEntity() {
		super();
		// TODO Auto-generated constructor stub
	}

	public URLEntity(String url) {
		super();
		this.url = url;
	}

	public String getId() {
		return id;
	}

	public void setId(String id) {
		this.id = id;
	}

	public String getUrl() {
		return url;
	}

	public void setUrl(String url) {
		this.url = url;
	}

	/**
	 * @return the userId
	 */
	public String getUserId() {
		return UserId;
	}

	/**
	 * @param userId the userId to set
	 */
	public void setUserId(String userId) {
		UserId = userId;
	}

	public int getStatus() {
		return status;
	}

	public void setStatus(int status) {
		this.status = status;
	}

	public int getSql() {
		return sql;
	}

	public void setSql(int sql) {
		this.sql = sql;
	}

	public int getXss() {
		return xss;
	}

	public void setXss(int xss) {
		this.xss = xss;
	}

}
