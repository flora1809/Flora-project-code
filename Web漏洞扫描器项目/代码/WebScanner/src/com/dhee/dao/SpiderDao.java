package com.dhee.dao;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.SQLException;
import java.util.List;

import com.dhee.entity.UserEntity;

public class SpiderDao extends DBConnection {

	public void insert(List<String> enableUrl, UserEntity user) {
		Connection con = getConnection();
		PreparedStatement ps = null;
		try {
			ps = con.prepareStatement("INSERT INTO MYURL (ID,URL,USERID,SQL,XSS) VALUES (SYS_GUID(),?,?,'3','3')");
			for (String url : enableUrl) {
				ps.setString(1, url);
				ps.setString(2, user.getId());
				ps.addBatch();
			}
			ps.executeBatch();
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} finally {
			closeStatement(ps);
			closeConnection(con);
		}

	}

}
