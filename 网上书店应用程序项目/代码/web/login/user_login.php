<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>用户登录</title>

  <!-- 导入CSS的全局样式 -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!--引入表单校验插件CSS类库-->
  <link href="css/bootstrapValidator.min.css" rel="stylesheet"/>

  <style>
    body {
      background: url("img/userInfoList.jpg") no-repeat center;
	  
	 
    }
  </style>

</head>
<body>
<div class="container" style="width: 330px; margin-top: 130px">
  <h2 style="text-align: center;">用户登录</h2>
  <form id="loginForm" action="action.php?a=userlogin" method="post">

    <div class="form-group">
      <label for="username">用户名：</label>
      <input type="text" name="name" class="form-control" id="username" placeholder="请输入用户名"/>
    </div>

    <div class="form-group">
      <label for="password">密码：</label>
      <input type="password" name="password" class="form-control" id="password" placeholder="请输入密码"/>
    </div>
    <hr/>
    <div class="form-group" style="text-align: center;">
      <button class="btn btn-lg btn-primary btn-block" type="submit" value="登录">用户登录</button>
    </div>
	<div class="form-group" style="text-align: center;">
	  <a class="btn btn-lg btn-primary btn-block" type="button" value="返回" href="index.php">返回首页</a>
	</div>
  </form>

  <!-- 出错显示的信息框 -->
</div>

<!-- jQuery导入,为兼容低版本浏览器我们选择1.x.x版本 -->
<script src="js/jquery-2.1.0.min.js"></script>
<!-- 导入bootstrap的js文件 -->
<script src="js/bootstrap.min.js"></script>

<!--引入表单校验插件-->
<script src="js/bootstrapValidator.min.js"></script>
<script src="js/zh_CN.js"></script>

<script type="text/javascript">
    $(function () {
        $('form').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                username: {
                    message: '用户名验证失败',
                    validators: {
                        notEmpty: {
                            message: '用户名不能为空'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9_]+$/,
                            message: '用户名只能包含大写、小写、数字和下划线'
                        }
                    }
                },
                password: {
                    message: '密码无效',
                    validators: {
                        notEmpty: {
                            message: '密码不能为空'
                        },
                        stringLength: {
                            min: 6,
                            max: 30,
                            message: '密码长度必须在6到30之间'
                        },
                        different: {//不能和用户名相同
                            field: 'username',
                            message: '不能和用户名相同'
                        },
                        regexp: {//匹配规则
                            regexp: /^[a-zA-Z0-9_\.]+$/,
                            message: 'The username can only consist of alphabetical, number, dot and underscore'
                        }
                    }
                }
            }
        })
    });
</script>

</body>
</html>