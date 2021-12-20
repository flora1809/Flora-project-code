package com.dhee.dao;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

import com.dhee.entity.UserEntity;

public class UserDao extends DBConnection {

	public List<UserEntity> select() {
		List<UserEntity> list = new ArrayList<UserEntity>();
		Connection con = getConnection();
		PreparedStatement ps = null;
		ResultSet rs = null;
		try {
			ps = con.prepareStatement("SELECT * FROM MYUSER");
			rs = ps.executeQuery();
			while (rs.next()) {
				UserEntity user = new UserEntity();
				user.setId(rs.getString(1));
				user.setUserName(rs.getString(2));
				user.setPassword(rs.getString(3));
				user.setName(rs.getString(4));
				user.setSex(rs.getString(5));
				user.setStatus(rs.getString(6));
				list.add(user);
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

	public int insert(UserEntity userEntity) {
		Connection con = getConnection();
		PreparedStatement ps = null;
		int result = 0;
		try {
			ps = con.prepareStatement("INSERT INTO MYUSER VALUES (SYS_GUID(),?,?,?,?,?)");
			ps.setString(1, userEntity.getUserName());
			ps.setString(2, userEntity.getPassword());
			ps.setString(3, userEntity.getName());
			ps.setString(4, userEntity.getSex());
			ps.setString(5, "0");
			result = ps.executeUpdate();
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}finally {
			closeStatement(ps);
			closeConnection(con);
		}
		return result;
	}
	
	public int update(UserEntity userEntity) {
		Connection con = getConnection();
		PreparedStatement ps = null;
		int result = 0;
		try {
			ps = con.prepareStatement("UPDATE  MYUSER SET STATUS = ? WHERE USERNAME = ?");
			ps.setInt(1,1);
			ps.setString(2, userEntity.getUserName());
			result = ps.executeUpdate();
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}finally {
			closeStatement(ps);
			closeConnection(con);
		}
		return result;
	}
}
