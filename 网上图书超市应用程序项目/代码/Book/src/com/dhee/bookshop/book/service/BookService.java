package com.dhee.bookshop.book.service;

import java.util.List;

import com.dhee.bookshop.book.entity.Book;
import com.dhee.bookshop.catelog.entity.Catelog;

public interface BookService {
	/* 添加图书 */
	public String addBook(Book book);

	/* 删除图书 */
	public String delBook(Book book);
	
	/* 修改图书 */
	public String altBook(Book book);
	
	/*图书详情*/
	public Book detail(Book book);
	
	/*查询分类图书*/
	public List<Book> selCatelog(Catelog catelog);
	
	/* 图书列表 */
	public List<Book> selAll(int start);
	
	/*总页数*/
	public int countPage();
	
	/* 查询所有图书 */
	public List<Book> selAll();
	
}
