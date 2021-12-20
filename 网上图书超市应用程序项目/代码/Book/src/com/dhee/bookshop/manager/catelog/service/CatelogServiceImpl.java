package com.dhee.bookshop.manager.catelog.service;

import java.util.List;

import org.apache.ibatis.session.SqlSession;

import com.dhee.bookshop.book.dao.BookDao;
import com.dhee.bookshop.book.entity.Book;
import com.dhee.bookshop.catelog.entity.Catelog;
import com.dhee.bookshop.manager.catelog.dao.CatelogDao;
import com.dhee.common.BaseDao;

public class CatelogServiceImpl extends BaseDao implements CatelogService {

	SqlSession sqlSession = null;
	CatelogDao catelogDao = null;
	public CatelogServiceImpl() {
		sqlSession = getSqlSessionFactory().openSession();

		catelogDao = sqlSession.getMapper(CatelogDao.class);
	}
	
	@Override
	public String addCatelog(Catelog catelog) {
		// TODO Auto-generated method stub
		// 1.判断分类名称是否存在

		Catelog c = catelogDao.selByName(catelog);

		// 分类名称不存在
		if (c == null) {
			// 添加分类名称
			int i = catelogDao.addCatelog(catelog);
			sqlSession.commit();
			if (i > 0) {
				return "添加成功";
			} else {
				return "添加失败";
			}
		} else {
			return "分类名称已存在";
		}

	}

	@Override
	public String delCatelog(Catelog catelog) {
		// TODO Auto-generated method stub
		BookDao bookDao = sqlSession.getMapper(BookDao.class);
		List<Book> b = bookDao.selByCID(catelog);
		// 图书名称不存在
		if (b.isEmpty()) {
			// 
			int i = catelogDao.delCatelog(catelog);
			sqlSession.commit();
			if (i > 0) {
				return "删除成功";
			} else {
				return "删除失败";
			}
		} else {
			return "该分类存在图书无法删除";
		}

	}

	
	@Override
	public List<Catelog> selAll() {
		// TODO Auto-generated method stub
		return catelogDao.selAll();
	}

	@Override
	public List<Catelog> selAll(int page) {
		// TODO Auto-generated method stub
		int start = (page-1)*5+1;
		
		return catelogDao.selAllPage(start);
	}

	@Override
	public int countCatelog() {
		// TODO Auto-generated method stub
		int count = catelogDao.countCatelog();
		if(count%5==0){
			return count/5;
		}else {
			return count/5+1;
		}
	}

}
