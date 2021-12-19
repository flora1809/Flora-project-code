<!--书籍信息展示以及管理操作的界面-->
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>图书列表</title>  
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/jquery.js"></script>
    <script src="js/pintuer.js"></script>  
</head>
<body>

  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 图书列表</strong></div>
    <div class="padding border-bottom">  
    <a class="button border-yellow" href="order_add.php"><span class="icon-plus-square-o"></span> 添加内容</a>
	 </div>
	  <div class="padding border-bottom">
             <ul class="search"><!--查询部分-->
               <li>
       		  <form method="post" action="book_search.php">
       			查询方式：<select name="cid" class="input" style="width:200px; line-height:17px;">
       		    <option value="0">请选择查询方式</option>
       		    <option value="1">书籍名称</option>
       		    <option value="2">出版社</option>
       		    <option value="3">书籍作者</option>
       		    <option value="4">ISBN</option>
       			<option value="5">书籍修改日期</option>
       		  </select>
       		  <input type="text" placeholder="请输入搜索关键字" name="keywords" class="input" style="width:250px; line-height:17px;display:inline-block" />
       		  <button class="button border-main icon-search" type="submit"> 搜索</button>
       		  </form>
       		  </li>
       		</li>
             </ul>
        </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="120">ID</th>
        <th>书名</th>   
		<th>作者</th>	
        <th>出版社</th>
		<th>ISBN</th>
		<th>价格</th>
        <th>图片</th>
        <th>库存</th>
        <th width="25%">内容详情</th>
         <th width="120">修改时间</th>
		 <th>状态</th> 
        <th>操作</th>       
      </tr>      
        <tr>
		  <?php
		  //1、导入配置文件
		  require('../public/config.php');
		  //2、连接数据库并判断
		  $link = mysqli_connect(HOST,USER,PASS);
		  if (!$link) {  
		  	die('Could not connect to MySQL: ' . mysqli_error()); 
		  }
		  //3、选择数据库并设置字符集
		  mysqli_select_db($link,DBNAME);
		  mysqli_set_charset($link,'utf-8');
		  //4、定义sql语句
		  $sql = "select * from books order by id";//查询所有的书籍信息并显示在页面中
		  $result = mysqli_query($link,$sql);
		  //5、解析并遍历输出结果
		  $row = mysqli_fetch_assoc($result);
		  //var_dump($row);
		  //exit;
		  do{
			  $state = array('0' => '未审核','1' => '在线销售','2' => '下架');
			  echo "<tr>";
			  echo "<th width='120'>{$row['id']}</th>";
			  echo "<th>{$row['bookname']}</th>";
			  echo "<th>{$row['writer']}</th>";
			  echo "<th width='10%'>{$row['chubanshe']}</th>";
			  echo "<th>{$row['ISBN']}</th>";
			  echo "<th>{$row['price']}</th>";
			  echo "<th><img src='../public/book/{$row["picture"]}' alt='' width='120' height='50' /></th>";
			  echo "<th>{$row['reserve']}</th>";
			  echo "<th width='20%'>{$row['details']}</th>";
			  echo "<th width='9%'>{$row['addtime']}</th>";
			  echo "<th>{$state[$row['state']]}</th>";
			  echo "<td  width='20%'><div class='button-group'>";
			  echo "<a class='button border-main' href='book_alt.php?a={$row['id']}'><span class='icon-edit'></span> 修改</a>";
			  echo "<a class='button border-red' href='book_action.php?a=del&b={$row['id']}' onclick='return del(1)'><span class='icon-trash-o'></span> 删除</a> ";
			  echo "</div></td>";
			  echo "</tr>";
		  }
		  while($row = mysqli_fetch_assoc($result));
		  ?>
          
        </tr>
      <tr>
        <td colspan="8"><div class="pagelist"> <a href="">上一页</a> <span class="current">1</span><a href="">2</a><a href="">3</a><a href="">下一页</a><a href="">尾页</a> </div></td>
      </tr>
    </table>
  </div>

<script type="text/javascript">

function del(id){
	if(confirm("您确定要删除吗?")){
		
	}
}

$("#checkall").click(function(){ 
  $("input[name='id[]']").each(function(){
	  if (this.checked) {
		  this.checked = false;
	  }
	  else {
		  this.checked = true;
	  }
  });
})

function DelSelect(){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		var t=confirm("您确认要删除选中的内容吗？");
		if (t==false) return false; 		
	}
	else{
		alert("请选择您要删除的内容!");
		return false;
	}
}
<?php //关闭数据库
mysqli_close($link);
?>
</script>
</body></html>