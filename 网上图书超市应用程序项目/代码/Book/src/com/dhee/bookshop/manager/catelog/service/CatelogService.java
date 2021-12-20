package com.dhee.bookshop.manager.catelog.service;

import java.util.List;

import com.dhee.bookshop.catelog.entity.Catelog;

public interface CatelogService {
	/* 添加分类 */
	public String addCatelog(Catelog catelog);

	/* 删除分类 */
	public String delCatelog(Catelog catelog);
	
	/* 分类列表 */
	public List<Catelog> selAll();

	/* 分类列表 */
	public List<Catelog> selAll(int start);
	
	/*统计分类记录个数*/
	public int countCatelog();
}
