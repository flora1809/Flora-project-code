package com.dhee.service;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;
import java.net.URLConnection;
import java.util.ArrayList;
import java.util.List;

import javax.swing.text.html.HTMLEditorKit;

import com.dhee.dao.SpiderDao;
import com.dhee.dao.UrlDao;
import com.dhee.entity.URLEntity;
import com.dhee.entity.UserEntity;
import com.dhee.tools.MyHTMLEditorKit;
import com.dhee.tools.MyParser;
import com.dhee.tools.MyParserCallback;

import oracle.net.aso.e;

public class SpiderService {
	
	
	public List<String> scan(URLEntity urlEntity) {
		List<String> list = new ArrayList<String>();
		try {
			URL url = new URL(urlEntity.getUrl());
			URLConnection con = url.openConnection();
			InputStream is = con.getInputStream();
			InputStreamReader isr = new InputStreamReader(is);
			HTMLEditorKit.Parser parser = new MyHTMLEditorKit().getParser();
			MyParserCallback mpc = new MyParserCallback(urlEntity.getUrl());
			//MyParser mp = new MyParser(urlEntity.getUrl());
			parser.parse(isr, mpc, true);
			list = mpc.getUrlList();
		} catch (MalformedURLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return list;
	}
	
	public List<String> checkUrl(List<String> allUrl, UserEntity userEntity){
		List<String> enableUrl = new ArrayList<String>();
		for (String myUrl : allUrl) {
			try {
				System.out.println(myUrl);
				URL url = new URL(myUrl);
				HttpURLConnection con = (HttpURLConnection) url.openConnection();
				int statusCode = con.getResponseCode();
				System.out.println(statusCode);
				if (statusCode == 200) {
					enableUrl.add(myUrl);
				}
			} catch (MalformedURLException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			} catch (IOException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}

		}
		SpiderDao spiderDao = new SpiderDao();
		UrlDao urlDao = new UrlDao();
		
		List<URLEntity> urllist = urlDao.selectByUserId(userEntity);
		if (!urllist.isEmpty()) {
			List<String> insertUrllist = new ArrayList<String>();
			for (String insertUrl : enableUrl) {
				insertUrllist.add(insertUrl);
			}
			for (URLEntity urlEntity : urllist) {
				for (String insertUrl : enableUrl) {
					if (urlEntity.getUrl().equals(insertUrl)) {
						insertUrllist.remove(insertUrl);
					}
				}
			}
			spiderDao.insert(insertUrllist, userEntity);
		}else {
			spiderDao.insert(enableUrl, userEntity);
		}
		return enableUrl;
	}
	
public static void main(String[] args) throws MalformedURLException, IOException {
	SpiderService spider = new SpiderService();
	URLEntity urlList = new URLEntity();
	urlList.setUrl("http://localhost/pikachu/");
	List<String> url = spider.scan(urlList);
	for (String urlEntity : url) {
		System.out.println(urlEntity);
	}
}
	
	
	
}
