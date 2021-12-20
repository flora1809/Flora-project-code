package com.dhee.tools;

import java.io.BufferedWriter;
import java.io.FileWriter;
import java.io.IOException;
import java.util.List;

import com.dhee.entity.URLEntity;

public class MyFile {
	
	public boolean output(List<URLEntity> list){
		BufferedWriter bw =null;
		try {
			bw = new BufferedWriter(new FileWriter("D:/Reports.txt"));
			bw.write("检测报告");
			bw.newLine();
			bw.write("检测内容如下:");
			bw.newLine();
			for (URLEntity urlEntity : list) {
				bw.write("该URL SQL注入结果为:"+urlEntity.getUrl());
				bw.newLine();
				bw.write("该URL SQL注入结果为:"+urlEntity.getSql());
				bw.write("该URL XSS漏洞结果为:"+urlEntity.getXss());
				bw.newLine();
			}
			bw.write("1:代表存在注入点，2:代表不存在注入点");
			bw.newLine();
			bw.write("本次共检测"+list.size()+"个URL地址。");
			bw.newLine();
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
			return false;
		}finally{
			if(bw != null ){
				try {
					bw.close();
				} catch (IOException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}
			}
		}
		return true;
	}

}
