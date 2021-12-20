package com.dhee.bookshop.manager.admin.service;

import java.util.List;

import org.apache.ibatis.session.SqlSession;

import com.dhee.bookshop.manager.admin.dao.AdminDao;
import com.dhee.bookshop.manager.admin.entity.Admin;
import com.dhee.common.BaseDao;

public class AdminServiceImpl extends BaseDao implements AdminService {

	SqlSession sqlSession = null;
	AdminDao adminDao = null;
	
	public  AdminServiceImpl() {
		sqlSession = getSqlSessionFactory().openSession();

		adminDao = sqlSession.getMapper(AdminDao.class);
	}
	
	@Override
	public String login(Admin admin) {
		// TODO Auto-generated method stub
		String result = null;
		List<Admin> list = adminDao.selectAll(admin);
		for (Admin adminEntity : list) {
			if (adminEntity.getUserName().equalsIgnoreCase(admin.getUserName()) && adminEntity.getPassword().equalsIgnoreCase(admin.getPassword())) {
				return "success";
			}
		}
		return "error";
	}

}
