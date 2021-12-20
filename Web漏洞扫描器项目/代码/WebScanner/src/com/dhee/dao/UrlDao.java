package com.dhee.dao;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

import com.dhee.entity.URLEntity;
import com.dhee.entity.UserEntity;

public class UrlDao extends DBConnection {

	public List<URLEntity> selectByUserId(UserEntity userEntity) {
		Connection con = getConnection();
		PreparedStatement ps = null;
		ResultSet rs = null;
		List<URLEntity> list = new ArrayList<URLEntity>();

		try {
			ps = con.prepareStatement("SELECT * FROM MYURL WHERE USERID = ?");
			ps.setString(1, userEntity.getId());
			rs = ps.executeQuery();
			while (rs.next()) {
				URLEntity url = new URLEntity();
				url.setId(rs.getString(1));
				url.setUrl(rs.getString(2));
				url.setUserId(rs.getString(3));
				url.setSql(rs.getInt(4));
				url.setXss(rs.getInt(5));
				list.add(url);
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
	
	public void delUrl(String urlId){
		Connection con = getConnection();
		PreparedStatement ps = null;
		try {
			ps = con.prepareStatement("DELETE MYURL WHERE ID = ?");
			ps.setString(1, urlId);
			ps.executeUpdate();
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} finally {
			closeStatement(ps);
			closeConnection(con);
		}
	}
	
	public List<URLEntity> selectURL(UserEntity userEntity){
		Connection con = getConnection();
		PreparedStatement ps = null;
		ResultSet rs = null;
		List<URLEntity> list = new ArrayList<URLEntity>();

		try {
			ps = con.prepareStatement("SELECT * FROM MYURL WHERE USERID = ? AND NOT ( SQL ='3' OR XSS = '3')");
			ps.setString(1, userEntity.getId());
			rs = ps.executeQuery();
			while (rs.next()) {
				URLEntity url = new URLEntity();
				url.setId(rs.getString(1));
				url.setUrl(rs.getString(2));
				url.setUserId(rs.getString(3));
				url.setSql(rs.getInt(4));
				url.setXss(rs.getInt(5));
				list.add(url);
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
	
	public List<URLEntity> selectByUrl(URLEntity urlEntity) {
		Connection con = getConnection();
		PreparedStatement ps = null;
		ResultSet rs = null;
		List<URLEntity> list = new ArrayList<URLEntity>();
		try {
			ps = con.prepareStatement("SELECT * FROM MYURL WHERE USERID = ? AND URL=?");
			ps.setString(1, urlEntity.getUserId());
			ps.setString(2, urlEntity.getUrl());
			rs = ps.executeQuery();
			while (rs.next()) {
				URLEntity url = new URLEntity();
				url.setId(rs.getString(1));
				url.setUrl(rs.getString(2));
				url.setUserId(rs.getString(3));
				url.setSql(rs.getInt(4));
				list.add(url);
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


}
