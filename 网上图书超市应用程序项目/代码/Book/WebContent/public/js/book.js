function nextPage(p){
	location.href="/Book/book/book?page="+(p+1);
}

function upPage(p){
	location.href="/Book/book/book?page="+(p-1);
}

function firstPage(){
	location.href="/Book/book/book?page=1";
}

function endPage(p){
	location.href="/Book/book/book?page="+p;
}

function addbook(){
	location.href="/Book/book/addreflection";
}


function delbook(i,n){

	if(confirm('是否删除该书:'+n)){
		location.href="/Book/book/delbook?bid="+i;
	}
	
}

function altbook(i){
	location.href="/Book/book/altreflection?bid="+i;
}

function bookdetail(i){
	location.href="/Book/book/bookdetail?bid="+i;
}
