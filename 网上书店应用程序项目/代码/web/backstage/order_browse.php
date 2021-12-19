<!--订单信息展示以及管理操作的界面-->
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>订单列表</title>  
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/jquery.js"></script>
    <script src="js/pintuer.js"></script>  
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head"><strong class="icon-reorder"> 订单列表</strong></div>
  <div class="padding border-bottom">  
  <a class="button border-yellow" href="order_add.php"><span class="icon-plus-square-o"></span> 添加内容</a>
  </div> 
  
  <div class="padding border-bottom">
          <ul class="search"><!--查询部分-->
            <li>
    		 <form method="post" action="order_search.php">
				查询方式：<select name="cid" class="input" style="width:200px; line-height:17px;">
    		   <option value="0">请选择查询方式</option>
    		   <option value="1">书名</option>
    		   <option value="2">用户名</option>
    		 	 <option value="3">状态</option>
    		 </select>
    		 	<input type="text"  name="keywords" class="input" style="width:250px; line-height:17px;display:inline-block" />
    		 	<button class="button border-main icon-search" type="submit"> 搜索</button>
    		 	</form>
  
    		  </li>
    		</li>
          </ul>
     </div>
	  
  <table class="table table-hover text-center">
    <tr>
      <th width="5%">ID</th>     
      <th>书名</th>  
      <th>数量</th>     
      <th>价格</th>
	  <th>用户名</th>
	  <th>电话</th>
	  <th>地址</th>
	  <th>日期</th>
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
	$sql = "select * from orders order by id";
	$result = mysqli_query($link,$sql);
	//5、解析并遍历输出结果
	$row = mysqli_fetch_assoc($result);
	do{
				  $state = array(0 => '未处理',1 => '待支付',2 => '待收货',3 => '已支付',4 => '已关闭');
				  echo "<tr>";
				  echo "<th width='120'>{$row['id']}</th>";
				  echo "<th>{$row['bookname']}</th>";
				  echo "<th>{$row['number']}</th>";
				  echo "<th>{$row['price']}</th>";
				  echo "<th>{$row['subscribers']}</th>";
				  echo "<th>{$row['telphone']}</th>";
				  echo "<th>{$row["address"]}</th>";
				  echo "<th>{$row['date']}</th>";
				  echo "<th>{$state[$row['state']]}</th>";
				  echo "<td><div class='button-group'>";
				  echo "<a class='button border-main' href='order_alt.php?a={$row['id']}'><span class='icon-edit'></span> 修改</a>";
				  echo "<a class='button border-red' href='order_action.php?a=del&b={$row['id']}' onclick='return del(1)'><span class='icon-trash-o'></span> 删除</a> ";
				  echo "</div></td>";
				  echo "</tr>";
	}
	while($row = mysqli_fetch_assoc($result));
	?>
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
</body>
</html>