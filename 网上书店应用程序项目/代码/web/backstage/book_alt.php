<!--获取管理员修改书籍信息的界面-->
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>更改图书信息</title>  
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/jquery.js"></script>
    <script src="js/pintuer.js"></script>  
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head"><strong><span class="icon-pencil-square-o"></span>更改图书信息</strong></div>
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
	$sql = "select * from books where id = {$id}";//查询该id的书籍信息并显示在页面中
	$result = mysqli_query($link,$sql);
	//5、解析并遍历输出结果
	$row = mysqli_fetch_assoc($result);
	?>
    <form method="post" class="form-x" action="book_action.php?a=alt&b=<?php echo($id)?>&c=<?php echo($row['picture'])?>" enctype="multipart/form-data">
	<!--表单将书籍修改信息传递到book_action.php页面中-->
      <div class="form-group">
        <div class="label">
          <label>书名：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="bookname" value="<?php echo $row['bookname'];?>" />
          <div class="tips"></div>
        </div>
      </div>
	  
	  <div class="form-group">
	    <div class="label">
	      <label>作者：</label>
	    </div>
	    <div class="field">
	      <input type="text" class="input" name="writer" value="<?php echo $row['writer'];?>" />
	      <div class="tips"></div>
	    </div>
	  </div>
	  
	  <div class="form-group">
	    <div class="label">
	      <label>出版社：</label>
	    </div>
	    <div class="field">
	      <input type="text" class="input" name="chubanshe" value="<?php echo $row['chubanshe'];?>" />
	      <div class="tips"></div>
	    </div>
	  </div>
	  
	  <div class="form-group">
	    <div class="label">
	      <label>ISBN：</label>
	    </div>
	    <div class="field">
	      <input type="text" class="input" name="ISBN" value="<?php echo $row['ISBN'];?>" />
	      <div class="tips"></div>
	    </div>
	  </div>
	  
	  <div class="form-group">
	    <div class="label">
	      <label>价格：</label>
	    </div>
	    <div class="field">
	      <input type="text" class="input" name="price" value="<?php echo $row['price'];?>" />
	      <div class="tips"></div>
	    </div>
	  </div>
	  
      <div class="form-group">
        <div class="label">
          <label>图片：</label>
        </div>
        <div class="field">
          <img type="text" id="preview" name="picture" class="input tips" style="width:25%; float:left;" src="../public/book/<?php echo $row['picture']?>" value="" data-toggle="hover" data-place="right" data-image=""  />
          <input type="file"  multiple id="f" type="file" name="f" onchange="change()" class="button bg-blue margin-left" value="../public/book/<?php echo $row['picture']?>" >
        </div>
      </div>
	  
      <div class="form-group">
	    <div class="label">
	      <label>库存：</label>
	    </div>
	    <div class="field">
	      <input type="text" class="input" name="reserve" value="<?php echo $row['reserve'];?>" />
	      <div class="tips"></div>
	    </div>
	  </div>
	         
      <div class="form-group">
        <div class="label">
          <label>内容详情：</label>
        </div>
        <div class="field">
          <textarea name="details" class="input" style="height:120px;" value=""><?php echo $row['details'];?></textarea>
          <div class="tips"></div>
        </div>
      </div>
	  
	  <div class="form-group">
	    <div class="label">
	      <label>状态：</label>
	    </div>
	    <div class="field" style="padding-top:8px;"> 
	      未审核 <input name="state" <?php echo ($row['state'] == 0)?'checked':'';?> type="radio" value="0" />
	      在线销售 <input name="state" <?php echo ($row['state'] == 1)?'checked':'';?> type="radio" value="1" />
	      下架 <input name="state" <?php echo ($row['state'] == 2)?'checked':'';?> type="radio" value="2" /> 
	    </div>
	  </div>
	  
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
		  <a class="button bg-blue margin-left" id="cancel" href="book_browse.php">取消</a>
        </div>
      </div>
    </form>
  </div>
</div>
</body>
<script type="text/javascript">
function change() {
    var pic = document.getElementById("preview"),
        file = document.getElementById("f");
    //得到后缀名
    var ext=file.value.substring(file.value.lastIndexOf(".")+1).toLowerCase();
     // gif在IE浏览器暂时无法显示
     if(ext!='png'&&ext!='jpg'&&ext!='jpeg'){
         alert("图片的格式必须为png或者jpg或者jpeg格式！"); 
         return;
     }
     var isIE = navigator.userAgent.match(/MSIE/)!= null,
         isIE6 = navigator.userAgent.match(/MSIE 6.0/)!= null;
 
     if(isIE) {
        file.select();
        var reallocalpath = document.selection.createRange().text;
 
        // IE6浏览器设置img的src为本地路径可以直接显示图片
         if (isIE6) {
            pic.src = reallocalpath;
         }else {
            // 非IE6版本的IE由于安全问题直接设置img的src无法显示本地图片，但是可以通过滤镜来实现
             pic.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='image',src=\"" + reallocalpath + "\")";
             // 设置img的src为base64编码的透明图片 取消显示浏览器默认图片
             pic.src = 'data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==';
         }
     }else {
        html5Reader(file);
     }
}

function html5Reader(file){
     var file = file.files[0];
     var reader = new FileReader();
     reader.readAsDataURL(file);
     reader.onload = function(e){
         var pic = document.getElementById("preview");
         pic.src=this.result;
     }
 }
<?php //关闭数据库
mysqli_close($link);
?>
</script>
</html>