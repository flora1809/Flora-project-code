<!--用户信息展示以及管理操作的界面-->
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>用户列表</title>  
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/jquery.js"></script>
    <script src="js/pintuer.js"></script>  
</head>


<body>
	
	
<div class="panel admin-panel">
  <div class="panel-head"><strong class="icon-reorder"> 用户列表</strong></div>
  <div class="padding border-bottom">  
  <a class="button border-yellow" href="user_add.php" target="right"><span class="icon-plus-square-o"></span> 添加内容</a>
  </div> 
   
  <div class="padding border-bottom">
          <ul class="search"><!--查询部分-->
            <li>
    		 	<form method="post" action="user_search.php">
					查询方式：<select name="cid" class="input" style="width:200px; line-height:17px;">
					  <option value="0">请选择查询方式</option>
					  <option value="1">ID</option>
					  <option value="2">用户名</option>
					  <option value="3">真实姓名</option>
					  <option value="4">性别</option>
						 <option value="5">状态</option>
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
	  <th>ID</th> 
      <th>用户名</th>     
      <th>密码</th>  
      <th>真实姓名</th>     
      <th>电话</th>
	  <th>性别</th>
	  <th>状态</th>
	  <th>出生日期</th>
	  <th>操作</th>
    </tr>  
	 
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
	 $sql = "select * from users order by id";
	 $result = mysqli_query($link,$sql);
	 //5、解析并遍历输出结果
	 $row = mysqli_fetch_assoc($result);
	 do{
		 $sex = array(0 => '男',1 => '女');
		 $state = array(0 => '未审核',1 => '通过');
		 echo "<tr>";
		 echo "<th width='120'>{$row['id']}</th>";
		 echo "<th>{$row['name']}</th>";
		 echo "<th>{$row['password']}</th>";
		 echo "<th>{$row['realname']}</th>";
		 echo "<th>{$row['telphone']}</th>";
		 echo "<th>{$sex[$row['sex']]}</th>";
		 echo "<th>{$state[$row['state']]}</th>";
		 echo "<th width='120'>{$row['birthdate']}</th>";
		 echo "<td><div class='button-group'>";
		 echo "<a class='button border-main' href='user_alt.php?a={$row['id']}'><span class='icon-edit'></span> 修改</a>";
		 echo "<a class='button border-red' href='user_action.php?a=del&b={$row['id']}' onclick='return del(1)'><span class='icon-trash-o'></span> 删除</a> ";
		 echo "</div></td>";
		 echo "</tr>";
		 //var_dump($row);
	 }
	 while($row = mysqli_fetch_assoc($result));
	 
	   ?>
	 </tr>
  </table>
</div>

<script>
function del(id){
	if(confirm("您确定要删除吗?")){
		
	}
}
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