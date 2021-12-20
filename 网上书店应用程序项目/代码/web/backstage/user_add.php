<!--获取管理员添加用户信息的界面-->
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>添加用户</title>  
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/jquery.js"></script>
    <script src="js/pintuer.js"></script>  
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 添加用户</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="user_action.php?a=add">

      <div class="form-group">
        <div class="label">
          <label>用户名：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="name" value="" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>密码：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="password" value="" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>真实姓名：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="realname" value="" />
          <div class="tips"></div>
        </div>
      </div>
	  
      <div class="form-group" >
        <div class="label">
          <label>电话：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="telphone" value="" />
          <div class="tips"></div>
        </div>
      </div>
	  
      <div class="form-group">
        <div class="label">
          <label>性别：</label>
        </div>
        <div class="field" style="padding-top:8px;"> 
          男 <input name="sex"  type="radio" value="0" />
          女 <input name="sex"  type="radio" value="1" />
        </div>
      </div>
	  
	  <div class="form-group">
	    <div class="label">
	      <label>状态：</label>
	    </div>
	    <div class="field" style="padding-top:8px;"> 
	      未审核 <input name="state"  type="radio" value="0" />
	      通过 <input name="state"  type="radio" value="1" />
	    </div>
	  </div>
	  
      <div class="form-group">
        <div class="label">
          <label>出生日期：</label>
        </div>
        <div class="field">
          <input type="text" class="birth" name="birthdate" value="" />
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

<script type="text/javascript">
    $(".birth").datetimepicker({
        format: "yyyy-mm-dd",
        autoclose: true,
        todayBtn: true,
        todayHighlight: true,
        showMeridian: true,
        pickerPosition: "bottom-left",
        language: 'zh-CN',//中文，需要引用zh-CN.js包
        startView: 2,//月视图
        minView: 2//日期时间选择器所能够提供的最精确的时间选择视图
    });
	<?php //关闭数据库
	mysqli_close($link);
	?>
</script>
</body>
</html>