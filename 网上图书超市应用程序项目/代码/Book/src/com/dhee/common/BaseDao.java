package com.dhee.common;

import java.io.IOException;
import java.io.InputStream;

import org.apache.ibatis.io.Resources;
import org.apache.ibatis.session.SqlSessionFactory;
import org.apache.ibatis.session.SqlSessionFactoryBuilder;

public class BaseDao {
	public SqlSessionFactory getSqlSessionFactory() {
		// 读取配置文件
		InputStream in=null;
		try {
			in = Resources.getResourceAsStream("SqlMapConfig.xml");
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		// 创建会话工厂
		return new SqlSessionFactoryBuilder().build(in);
		
	}
}
