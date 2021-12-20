package com.dhee.service;

import java.io.IOException;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;
import java.net.URLConnection;
import java.util.List;

import com.dhee.dao.InjectDao;
import com.dhee.dao.UrlDao;
import com.dhee.entity.InjectEntity;
import com.dhee.entity.URLEntity;
import com.dhee.entity.UserEntity;
import com.sun.xml.internal.ws.util.StringUtils;

public class InjectService {
	private InjectDao injectDao = new InjectDao();

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
		List<InjectEntity> list = injectDao.select();
		// 使用关键字进行注入
		for (InjectEntity injectEntity : list) {
			//url += injectEntity.getSqlInject();
			try {
				System.out.println(url);
				url = urlEntity.getUrl().substring(0,(urlEntity.getUrl().indexOf("=")+1));
//				url += injectEntity.getSqlInject();
				url += "%27";
				url += urlEntity.getUrl().substring((urlEntity.getUrl().indexOf("&")));
				URL u = new URL(url);
				System.out.println(u);
//				URLConnection con = u.openConnection();
				HttpURLConnection con = (HttpURLConnection) u.openConnection();
				int statusCode = con.getResponseCode();
//				if (statusCode == 200) {
//					
//				}
				System.out.println(statusCode);
				if (con.toString().indexOf(injectEntity.getSqlInject()) != -1) {
//					System.out.println(uCon.toString());
					return true;
				}
			} catch (MalformedURLException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			} catch (IOException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}

			//url = urlEntity.getUrl();
		}
		return false;
	}

	public void stockUrl(URLEntity urlEntity) {
		UrlDao urlDao = new UrlDao();
		List<URLEntity> list = urlDao.selectByUrl(urlEntity);
		if (list.size() != 0) {
			// url存在于用户的数据库表中，update
			injectDao.updateUrl(urlEntity);
		} else {
			// url不存在于用户的数据库表中，insert
			injectDao.insertUrl(urlEntity);
		}

	}

}
