package com.dhee.dao;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;


import com.dhee.entity.URLEntity;
import com.dhee.entity.XssEntity;

public class XssDao extends DBConnection  {

	public List<XssEntity> select() {
		Connection con = getConnection();
		PreparedStatement ps = null;
		ResultSet rs = null;
		List<XssEntity> list = new ArrayList<XssEntity>();
		try {
			ps = con.prepareStatement("select * from MYXSS");
			rs = ps.executeQuery();
			while (rs.next()) {
				XssEntity xss = new XssEntity();
				xss.setId(rs.getString(1));
				xss.setXss(rs.getString(2));
				list.add(xss);
			}
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} finally {
			closeResultSet(rs);
			closeStatement(ps);
			closeConnection(con);
		}
		return list;
	}

	
	public void updateUrl(URLEntity urlEntity) {
		Connection con = getConnection();
		PreparedStatement ps = null;
		try {
			ps = con.prepareStatement("UPDATE  MYURL SET XSS= ? WHERE USERID = ? AND URL=?");
			ps.setInt(1, urlEntity.getXss());
			ps.setString(2, urlEntity.getUserId());
			ps.setString(3, urlEntity.getUrl());
			ps.executeUpdate();
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} finally {
			closeStatement(ps);
			closeConnection(con);
		}
	}
	
	public void insertUrl(URLEntity urlEntity) {
		Connection con = getConnection();
		PreparedStatement ps = null;
		try {
			ps = con
			.prepareStatement("INSERT INTO MYURL (ID,URL,USERID,SQL,XSS) VALUES (SYS_GUID(),?,?,3,?)");
			ps.setString(1, urlEntity.getUrl());
			ps.setString(2, urlEntity.getUserId());
			ps.setInt(3, urlEntity.getXss());
			ps.executeUpdate();
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} finally {
			closeStatement(ps);
			closeConnection(con);
		}
	}
}
