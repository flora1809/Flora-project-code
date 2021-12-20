package com.dhee.bookshop.book.service;

import java.io.File;
import java.util.List;

import org.apache.ibatis.session.SqlSession;
import org.apache.struts2.ServletActionContext;

import com.dhee.bookshop.book.dao.BookDao;
import com.dhee.bookshop.book.entity.Book;
import com.dhee.bookshop.catelog.entity.Catelog;
import com.dhee.bookshop.manager.catelog.dao.CatelogDao;
import com.dhee.common.BaseDao;

public class BookServiceImpl extends BaseDao implements BookService {

	SqlSession sqlSession = null;
	BookDao bookDao = null;
	CatelogDao catelogDao = null;
	public BookServiceImpl() {
		sqlSession = getSqlSessionFactory().openSession();
		bookDao = sqlSession.getMapper(BookDao.class);
		catelogDao = sqlSession.getMapper(CatelogDao.class);
	}
	
	@Override
	public String addBook(Book book) {
		// TODO Auto-generated method stub
		int i = bookDao.addBook(book);
		sqlSession.commit();
		if(i == 0){
			return "添加失败";
		}
		return "添加成功";
	}

	@Override
	public String delBook(Book book) {
		// TODO Auto-generated method stub
		int i = bookDao.delBook(book);
		String path = ServletActionContext.getServletContext().getRealPath("/manager/upload");
        String filepath = path+'/'+book.getImgpath();
        File dest = new File(filepath);
        dest.delete();
		sqlSession.commit();
		if(i == 0){
			return "删除失败";
		}
		return "删除成功";
	}

	@Override
	public String altBook(Book book) {
		// TODO Auto-generated method stub
		int i = bookDao.altBook(book);
		sqlSession.commit();
		if(i == 0){
			return "修改失败";
		}
		return "修改成功";
	}

	@Override
	public Book detail(Book book) {
		// TODO Auto-generated method stub
		return bookDao.detail(book);
	}

	@Override
	public List<Book> selCatelog(Catelog catelog) {
		// TODO Auto-generated method stub
		catelog.setCid(catelogDao.selByName(catelog).getCid());
		return bookDao.selByCID(catelog);
	}

	@Override
	public List<Book> selAll(int page) {
		// TODO Auto-generated method stub
		int start = (page - 1) * 5 + 1;

		return bookDao.selAllPage(start);
	}

	@Override
	public int countPage() {
		// TODO Auto-generated method stub
		int count = bookDao.countBook();
		if(count%5==0){
			return count/5;
		}else {
			return count/5+1;
		}
	}

	/* (non-Javadoc)
	 * @see com.dhee.bookshop.book.service.BookService#selAll()
	 */
	@Override
	public List<Book> selAll() {
		// TODO Auto-generated method stub
		return bookDao.selAll();
	}




}
