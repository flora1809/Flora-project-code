package com.dhee.dao;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

import com.dhee.entity.InjectEntity;
import com.dhee.entity.URLEntity;

public class InjectDao extends DBConnection {

	public List<InjectEntity> select() {
		Connection con = getConnection();
		PreparedStatement ps = null;
		ResultSet rs = null;
		List<InjectEntity> list = new ArrayList<InjectEntity>();
		try {
			ps = con.prepareStatement("select * from MYSQLINJECT");
			rs = ps.executeQuery();
			while (rs.next()) {
				InjectEntity inject = new InjectEntity();
				inject.setId(rs.getString(1));
				inject.setSqlInject(rs.getString(2));
				list.add(inject);
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
			ps = con.prepareStatement("UPDATE  MYURL SET SQL= ? WHERE USERID = ? AND URL=?");
			ps.setInt(1, urlEntity.getSql());
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
			.prepareStatement("INSERT INTO MYURL (ID,URL,USERID,SQL,XSS) VALUES (SYS_GUID(),?,?,?,3)");
			ps.setString(1, urlEntity.getUrl());
			ps.setString(2, urlEntity.getUserId());
			ps.setInt(3, urlEntity.getSql());
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
