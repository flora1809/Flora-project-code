package com.dhee.action;

import java.io.IOException;
import java.net.MalformedURLException;
import java.util.List;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpSession;

import org.apache.struts2.interceptor.ServletRequestAware;

import com.dhee.entity.URLEntity;
import com.dhee.entity.UserEntity;
import com.dhee.service.SpiderService;
import com.opensymphony.xwork2.ActionSupport;

public class SpiderAction extends ActionSupport implements ServletRequestAware{

	// private String url;
	//
	// public String getUrl() {
	// return url;
	// }
	//
	// public void setUrl(String url) {
	// this.url = url;
	// }

	private URLEntity urlEntity;
	private SpiderService spiderService = new SpiderService();
	private HttpServletRequest request;

	public URLEntity getUrlEntity() {
		return urlEntity;
	}

	public void setUrlEntity(URLEntity urlEntity) {
		this.urlEntity = urlEntity;
	}

	public void setServletRequest(HttpServletRequest request) {
		this.request = request;
	}
	public String scan() throws MalformedURLException, IOException {
		HttpSession session = request.getSession();
		if(session.getAttribute("userInfo")!=null){
			UserEntity user = (UserEntity)session.getAttribute("userInfo");
			List<String> allUrl = spiderService.scan(urlEntity);
//			for (String string : allUrl) {
//				System.out.println(string);
//			}
			List<String> enableUrl = spiderService.checkUrl(allUrl,user);
			session.setAttribute("enableUrl", enableUrl);
		}
		return SUCCESS;
	}



}
