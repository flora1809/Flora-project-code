package com.dhee.bookshop.manager.admin.dao;

import java.util.List;

import com.dhee.bookshop.manager.admin.entity.Admin;

public interface AdminDao {
	/*查询所有用户信息，用于用户登录*/
	public List<Admin> selectAll(Admin admin);
}
