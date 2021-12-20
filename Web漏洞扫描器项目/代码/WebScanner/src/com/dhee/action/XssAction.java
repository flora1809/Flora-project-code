package com.dhee.action;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpSession;

import org.apache.struts2.interceptor.ServletRequestAware;

import com.dhee.entity.URLEntity;
import com.dhee.entity.UserEntity;
import com.dhee.service.XssService;
import com.opensymphony.xwork2.ActionSupport;

public class XssAction extends ActionSupport implements ServletRequestAware{
	private URLEntity urlEntity;
	private HttpServletRequest request;
	private XssService xssService = new XssService();
	
	public void setServletRequest(HttpServletRequest request) {
		this.request = request;
	}

	public URLEntity getUrlEntity() {
		return urlEntity;
	}

	public void setUrlEntity(URLEntity urlEntity) {
		this.urlEntity = urlEntity;
	}

	public String xss() {
		boolean  b= xssService.inject(urlEntity);
		HttpSession session = request.getSession();
		session.setAttribute("xss", b);
		UserEntity userEntity = (UserEntity) session.getAttribute("userInfo");
		if(b){
			urlEntity.setXss(1);;
		}else{
			urlEntity.setXss(2);;
		}
		urlEntity.setUserId(userEntity.getId());
		xssService.stockUrl(urlEntity);
		return "success";
	}
}
