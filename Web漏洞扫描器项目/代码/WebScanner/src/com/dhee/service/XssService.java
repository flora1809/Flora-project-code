package com.dhee.service;

import java.io.IOException;
import java.net.MalformedURLException;
import java.net.URL;
import java.net.URLConnection;
import java.util.List;

import com.dhee.dao.UrlDao;
import com.dhee.dao.XssDao;
import com.dhee.entity.URLEntity;
import com.dhee.entity.XssEntity;

public class XssService {
	private XssDao xssDao = new XssDao();
	
	public boolean inject(URLEntity urlEntity) {
		String url = urlEntity.getUrl();
		if (url.indexOf("?") == -1) {
			return false;
		} else {
			if (url.substring(url.indexOf("?") + 1).length() == 0) {
				return false;
			}
		}
		// 读取注入的关键字
		List<XssEntity> list = xssDao.select();
		// 使用关键字进行注入
		for (XssEntity xssEntity: list) {
			//url += xssEntity.getXss();
			try {
				URL u = new URL(url);
				URLConnection uCon = u.openConnection();
				if (uCon.toString().indexOf(xssEntity.getXss()) != -1) {
					//System.out.println(uCon.toString().equals(url));
					return true;
				}
			} catch (MalformedURLException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			} catch (IOException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}

		}
		return false;
	}

	public void stockUrl(URLEntity urlEntity) {
		UrlDao urlDao = new UrlDao();
		List<URLEntity> list = urlDao.selectByUrl(urlEntity);
		if (list.size() != 0) {
			// url存在于用户的数据库表中，update
			xssDao.updateUrl(urlEntity);
		} else {
			// url不存在于用户的数据库表中，insert
			xssDao.insertUrl(urlEntity);
		}

	}
}
