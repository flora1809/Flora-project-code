<!--获取管理员加订单信息的界面-->
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>添加订单</title>  
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/jquery.js"></script>
    <script src="js/pintuer.js"></script>  
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 添加订单</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="order_action.php?a=add">
     
      <div class="form-group">
        <div class="label">
          <label>书名：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="bookname" value="" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>数量：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="number" value="" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>价格：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="price" value="" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group" style="display:none;">
        <div class="label">
          <label>用户名：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="subscribers" value="" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
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
          <label>地址：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="address" value="" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group" style="display:none">
        <div class="label">
          <label>日期：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="date" value="" />
          <div class="tips"></div>
        </div>
      </div>
     
     <div class="form-group">
       <div class="label">
         <label>状态：</label>
       </div>
       <div class="field" style="padding-top:8px;"> 
         未处理 <input name="state"  type="radio" value="0" />
         待支付 <input name="state"  type="radio" value="1" />
		 待收货 <input name="state"  type="radio" value="2" />
		 已支付 <input name="state"  type="radio" value="3" />
		 已关闭<input name="state"  type="radio" value="4" />
       </div>
     </div>
     
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
			 <a class="button bg-blue margin-left" id="cancel" href="order_browse.php">取消</a>
        </div>
      </div>
    </form>
  </div>
</div>
<?php //关闭数据库
mysqli_close($link);
?>
</body></html>