function nextPage(p){
	location.href="/Book/index/bookCatelog?page="+(p+1);
}

function upPage(p){
	location.href="/Book/index/bookCatelog?page="+(p-1);
}

function firstPage(){
	location.href="/Book/index/bookCatelog?page=1";
}

function endPage(p){
	location.href="/Book/index/bookCatelog?page="+p;
}

function catelog(c){
	location.href="/Book/index/bookCatelog?catelogname="+c;
}