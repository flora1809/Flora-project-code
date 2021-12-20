package com.dhee.service;

import java.util.List;

import com.dhee.dao.UserDao;
import com.dhee.entity.UserEntity;

public class UserService {

	private UserDao userDao = new UserDao();

	public UserEntity login(UserEntity userEntity) {
		List<UserEntity> list = userDao.select();
		for (UserEntity user : list) {
			if (user.getUserName().equalsIgnoreCase(
					userEntity.getUserName().trim())
					&& user.getPassword().equalsIgnoreCase(
							userEntity.getPassword().trim())) {
				return user;
			}
		}
		return null;
	}

	public int registe(UserEntity userEntity) {
		List<UserEntity> list = userDao.select();
		for (UserEntity user : list) {
			if (user.getUserName().equalsIgnoreCase(
					userEntity.getUserName().trim())) {
				return 0;
			}
		}
		return userDao.insert(userEntity);
	}
	
	public int freeze(UserEntity userEntity) {
		return userDao.update(userEntity);
	}

}