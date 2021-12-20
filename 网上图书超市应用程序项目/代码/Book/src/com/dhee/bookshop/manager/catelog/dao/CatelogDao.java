package com.dhee.bookshop.manager.catelog.dao;

import java.util.List;

import org.apache.ibatis.annotations.Param;

import com.dhee.bookshop.book.entity.Book;
import com.dhee.bookshop.catelog.entity.Catelog;

public interface CatelogDao {
	/* 添加分类 */
	public int addCatelog(Catelog catelog);
	/* 删除分类 */
	public int delCatelog(Catelog catelog);
	/* 分类全部列表 */
	public List<Catelog> selAll();
	/* 分类列表 */
	public List<Catelog> selAllPage(@Param("start") int start);
	/* 分类名查询 */
	public Catelog selByName(Catelog catelog);
	/* 分类ID查询 */
	public Catelog selID(Catelog catelog);
	/*统计分类记录个数*/
	public int countCatelog();

}
