package com.dhee.tools;

import java.util.ArrayList;
import java.util.List;

import javax.swing.text.MutableAttributeSet;
import javax.swing.text.html.HTML;
import javax.swing.text.html.HTML.Tag;
import javax.swing.text.html.HTMLEditorKit.ParserCallback;

import com.dhee.entity.URLEntity;

public class MyParserCallback extends ParserCallback {

	private List<String> urlList = new ArrayList<String>();
	private String url;
	
	public MyParserCallback(String url) {
		this.url = url;
	}
	public List<String> getUrlList() {
		return urlList;
	}

	@Override
	public void handleSimpleTag(Tag t, MutableAttributeSet a, int pos) {
		if (t == HTML.Tag.A || t == HTML.Tag.LINK) {
			String href = (String) a.getAttribute(HTML.Attribute.HREF);
			if (href == null) {
				return;
			}
			urlList.add(href);
		}
		if (t == HTML.Tag.FORM) {
			String action = (String) a.getAttribute(HTML.Attribute.ACTION);
			if (action == null) {
				return;
			}
			urlList.add(url+'/'+action);
		}
		

	}

	@Override
	public void handleStartTag(Tag t, MutableAttributeSet a, int pos) {
		handleSimpleTag(t, a, pos);
	}

}
