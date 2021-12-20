package com.dhee.action;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpSession;

import org.apache.struts2.interceptor.ServletRequestAware;

import com.dhee.entity.UserEntity;
import com.dhee.service.UserService;
import com.opensymphony.xwork2.ActionSupport;

public class UserAction extends ActionSupport implements ServletRequestAware {

	private UserEntity userEntity;
	private UserService userService = new UserService();
	private HttpServletRequest request;
	private Integer times;

	public UserEntity getUserEntity() {
		return userEntity;
	}

	public void setUserEntity(UserEntity userEntity) {
		this.userEntity = userEntity;
	}

	public void setServletRequest(HttpServletRequest request) {
		this.request = request;
	}

	public String login() {
		HttpSession session = request.getSession();
		times = (Integer)session.getAttribute("times");
		UserEntity user = userService.login(userEntity);
//		System.out.println(userEntity.getUserName());
//		System.out.println(times);
		if (user == null) {
			if(times == null){
				times = 1;
			}else {
				
				times += 1;
				if(times == 5){
					userService.freeze(userEntity);
				}
				
			}
			
			session.setAttribute("loginError", times);
			return "error";
		}
		session.setAttribute("userInfo", user);
		if("0".equalsIgnoreCase(user.getStatus())){
			return "success";
		}
		times = 5;
		session.setAttribute("loginError", times);
		return "error";
	}

	public String logout() {
		HttpSession session = request.getSession();
		session.removeAttribute("userInfo");
		return "success";
	}

	public String registe() {
		int result = userService.registe(userEntity);
		if (result == 1) {
			return "success";
		}
		HttpSession session = request.getSession();
		session.setAttribute("regError", 1);
		return "error";
	}
}
