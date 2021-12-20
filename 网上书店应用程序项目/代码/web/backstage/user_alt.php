<!--获取管理员修改用户信息的界面-->
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>更改用户信息</title>  
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/jquery.js"></script>
    <script src="js/pintuer.js"></script>  
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head"><strong><span class="icon-pencil-square-o"></span>更改用户信息</strong></div>
  <div class="body-content">
	<?php
	$id = $_GET['a'];
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
	$sql = "select * from users where id = {$id}";
	$result = mysqli_query($link,$sql);
	//5、解析并遍历输出结果
	$row = mysqli_fetch_assoc($result);;
	?>
	 <form method="post" class="form-x" action="user_action.php?a=alt&b=<?php echo($id)?>">
		<!--表单将用户修改信息传递到user_action.php页面中-->
      <div class="form-group">
        <div class="label">
          <label>用户名：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="name" value="<?php echo $row['name'];?>" />
          <div class="tips"></div>
        </div>
      </div>
		
      <div class="form-group">
        <div class="label">
          <label>密码：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="password" value="<?php echo $row['password'];?>" />
          <div class="tips"></div>
        </div>
      </div>
		
      <div class="form-group">
        <div class="label">
          <label>真实姓名：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="realname" value="<?php echo $row['realname'];?>" />
          <div class="tips"></div>
        </div>
      </div>
	  
      <div class="form-group" >
        <div class="label">
          <label>电话：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="telphone" value="<?php echo $row['telphone'];?>" />
          <div class="tips"></div>
        </div>
      </div>
	  
      <div class="form-group">
        <div class="label">
          <label>性别：</label>
        </div>
        <div class="field" style="padding-top:8px;"> 
          男 <input name="sex" <?php echo ($row['sex'] == 0)?'checked':'';?>  type="radio" value="0" />
          女 <input name="sex" <?php echo ($row['sex'] == 1)?'checked':'';?>  type="radio" value="1" />
        </div>
      </div>
	  
	  <div class="form-group">
	    <div class="label">
	      <label>状态：</label>
	    </div>
	    <div class="field" style="padding-top:8px;"> 
	      未审核 <input name="state" <?php echo ($row['state'] == 0)?'checked':'';?>  type="radio" value="0" />
	      通过 <input name="state" <?php echo ($row['state'] == 1)?'checked':'';?>  type="radio" value="1" />
	    </div>
	  </div>
	  
      <div class="form-group">
        <div class="label">
          <label>出生日期：</label>
        </div>
        <div class="field">
          <input type="text" class="birth" name="birthdate" value="<?php echo $row['birthdate'];?>" />
          <div class="tips"></div>
        </div>
      </div>
      
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
		  <a class="button bg-blue margin-left" id="cancel" href="user_browse.php">取消</a>
        </div>
      </div>
    </form>
  </div>
</div>
<?php //关闭数据库
mysqli_close($link);
?>
</body>
</html>