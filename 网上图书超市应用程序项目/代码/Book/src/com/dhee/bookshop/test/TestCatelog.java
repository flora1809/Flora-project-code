package com.dhee.bookshop.test;

import java.util.List;

import com.dhee.bookshop.book.entity.Book;
import com.dhee.bookshop.book.service.BookService;
import com.dhee.bookshop.book.service.BookServiceImpl;
import com.dhee.bookshop.catelog.entity.Catelog;
import com.dhee.bookshop.manager.catelog.service.CatelogServiceImpl;

public class TestCatelog {
public static void main(String[] args) {
	
	Catelog catelog=new Catelog();
	CatelogServiceImpl catelogServiceImpl=new CatelogServiceImpl();
	BookServiceImpl bookServiceImpl = new BookServiceImpl();
//	************************添加分类****************************
//	String cname="计算机";
//	
//	catelog.setCname(cname);
//	
//	String result = catelogServiceImpl.addCatelog(catelog);
//	System.out.println(result);
//	************************分类列表显示***************************
//	int page = 1;
//	List<Catelog> list = catelogServiceImpl.selAll(page);
//	for (Catelog cateloglist : list) {
//		System.out.println(cateloglist.getCid()+":"+cateloglist.getCname());
//	}
//	
//	int countPage = catelogServiceImpl.countCatelog();
//	System.out.println("当前页数【"+page+"/"+countPage+"】");
//	************************删除分类***************************
//	String cname="计算机";
//	
//	catelog.setCname(cname);
//	
//	String result = catelogServiceImpl.delCatelog(catelog);
//	System.out.println(result);
	
//	List<Catelog> cateloglist = catelogServiceImpl.selAll();
//	for (Catelog list : cateloglist) {
//		System.out.println(list.getCname());
//	}
	
//	catelog.setCname("计算机");
//	List<Book> booklist = bookServiceImpl.selCatelog(catelog);
//	for (Book book : booklist) {
//		System.out.println(book.getBname()+"   "+book.getPublish()+"   "+book.getPrice());
//	}
	
//	String catelogname = null;
//	Integer page = null;
//	for(int i=2;i<4;i++){
//	if (catelogname == null || catelogname.equals("全部图书")){
//		catelogname = "全部图书";
//		System.out.println(catelogname);
//		if (page == null) {
//			page = 1;
//		}
//		List<Book> booklist = bookServiceImpl.selAll(page);
//		for (Book book : booklist) {
//			System.out.println(book.getBname());
//		}
//	}
//	page=i;
//	System.out.println(page);
//	System.out.println();
//	}
	
}
}
