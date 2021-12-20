function nextPage(p){
	location.href="Book/manage_catelog/catelogList?page="+(p+1);
}

function upPage(p){
	location.href="/Book/manage_catelog/catelogList?page="+(p-1);
}

function firstPage(){
	location.href="/Book/manage_catelog/catelogList?page=1";
}

function endPage(p){
	location.href="/Book/manage_catelog/catelogList?page="+p;
}


function delcatelog(i,n){

	if(confirm('是否删除该分类:'+n)){
		location.href="/Book/manage_catelog/catelogDel?cid="+i;
	}
	
}