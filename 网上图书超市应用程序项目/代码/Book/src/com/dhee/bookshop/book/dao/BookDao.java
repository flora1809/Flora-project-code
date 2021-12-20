package com.dhee.bookshop.book.dao;

import java.util.List;

import org.apache.ibatis.annotations.Param;

import com.dhee.bookshop.book.entity.Book;
import com.dhee.bookshop.catelog.entity.Catelog;

public interface BookDao {
	/* 添加图书 */
	public int addBook(Book book);
	/* 删除图书 */
	public int delBook(Book book);
	/* 修改图书 */
	public int altBook(Book book);
	/*图书详情*/
	public Book detail(Book book);
	/* 图书列表 */
	public List<Book> selAllPage(@Param("start") int start);
	/*查询所有图书*/
	public List<Book> selAll();
	/* 图书名称查询 */
	public List<Book> selByCID(Catelog catelog);
//	/* 图书名称查询 */
//	public Book selByBname(Book book);
	/*统计图书记录个数*/
	public int countBook();

}
