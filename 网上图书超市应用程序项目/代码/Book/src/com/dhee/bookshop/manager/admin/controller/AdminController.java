package com.dhee.bookshop.manager.admin.controller;

import com.dhee.bookshop.manager.admin.entity.Admin;
import com.dhee.bookshop.manager.admin.service.AdminServiceImpl;

public class AdminController {
	private Admin admin;
	private String result;

	/**
	 * @return the admin
	 */
	public Admin getAdmin() {
		return admin;
	}

	/**
	 * @param admin the admin to set
	 */
	public void setAdmin(Admin admin) {
		this.admin = admin;
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
	public String loginreflection() {
		result = "success";
		return result;
	}

	public String login() {
		AdminServiceImpl adminServiceImpl = new AdminServiceImpl();
		result = adminServiceImpl.login(admin);
		return result;
	}
}
