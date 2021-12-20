<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>用户注册</title>

  <!--导入CSS的全局样式-->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!--<link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
  <!--引入日期控制的CSS类库-->
  <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet"/>
  <!--引入表单校验插件CSS类库-->
  <link href="css/bootstrapValidator.min.css" rel="stylesheet"/>

  <style>
    body {
      background: url("img/userInfoList.jpg") no-repeat center; 
    }
  </style>

</head>
<body>
<div class="container" style="width: 500px; margin-top: 40px">
  <h2 style="text-align: center;">用户注册</h2>
  <form id="registerForm" action="action.php?a=add" method="post">
    <div class="form-group">
      <label for="username">用户名：</label>
      <input type="text" name="name" class="form-control" id="username" placeholder="请输入用户名"/>
    </div>

    <div class="form-group">
      <label for="password">密码：</label>
      <input type="password" name="password" class="form-control" id="password" placeholder="请输入密码"/>
    </div>

    <div class="form-group">
      <label for="name">请输入真实姓名：</label>
      <input type="text" name="realname" class="form-control" id="name" placeholder="请输入昵称"/>
    </div>

    <div class="form-group">
      <label for="telephone">手机号：</label>
      <input type="text" name="telphone" class="form-control" id="telephone" placeholder="请输入手机号"/>
    </div>

    <div class="form-group">
      <label>性别：</label>
      <label class="radio-inline">
      <input type="radio" name="sex" id="gender" checked="checked" value="0">男 
      </label>
      <label class="radio-inline">
       <input type="radio" name="sex" id="gender2" value="1">  女
      </label>
    </div>

    <div class="form-group">
      <label for="birthday">出生日期：</label>
      <input class="form_datetime form-control" name="birthdate" type="text" id="birthday" value="2019-11-14" size="16"
             readonly>
    </div>

    <hr/>
    <div class="form-group" style="text-align: center;">
      <button class="btn btn-lg btn-primary btn-block" name="submit_btn" type="submit" value="注册">用户注册</button>
    </div>
	<div>
	<a class="btn btn-lg btn-primary btn-block" type="button" value="返回" href="index.php">返回首页</a>
	</div>
  </form>

  <!-- 出错显示的信息框 -->
</div>

<!-- jQuery导入,为兼容低版本浏览器我们选择1.x.x版本 -->
<script src="js/jquery-2.1.0.min.js"></script>
<!-- 导入bootstrap的js文件 -->
<script src="js/bootstrap.min.js"></script>

<!--bootstrap-datetimepicker.zh-CN.js表示可以使用中文的语言显示日期时间-->
<script src="js/bootstrap-datetimepicker.min.js"></script>
<script src="js/bootstrap-datetimepicker.zh-CN.js"></script>

<!--引入表单校验插件-->
<script src="js/bootstrapValidator.min.js"></script>
<script src="js/zh_CN.js"></script>

<script type="text/javascript">
    $(".form_datetime").datetimepicker({
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
</script>

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
                        identical: {//相同
                            field: 'password',
                            message: '两次密码不一致'
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
                },
                repassword: {
                    message: '密码无效',
                    validators: {

                        identical: {//相同
                            field: 'password',
                            message: '两次密码不一致'
                        }
                    }
                },
                name: {
                    message: '姓名验证失败',
                    validators: {
                        notEmpty: {
                            message: '姓名不能为空'
                        },
       
                    }
                },
                email: {
                    validators: {
                        notEmpty: {
                            message: '邮箱不能为空'
                        },
                        emailAddress: {
                            message: '邮箱地址格式有误'
                        }
                    }
                },
                telephone: {
                    message: '手机号码验证失败',
                    validators: {
                        notEmpty: {
                            message: '手机号码不能为空'
                        },
                        stringLength: {
                            min: 11,
                            max: 11,
                            message: '手机号码长度必须为11位'
                        },
                        regexp: {
                            regexp: /^[0-9]+$/,
                            message: '用户名只能包含数字'
                        }
                    }
                }
            }
        })
        /*    .on('success.form.bv', function (e) {//点击提交之后
                e.preventDefault();
                $.post("/user/regist", $("#registerForm").serialize(), function (data) {
                    //处理服务器响应的数据  data  {flag:true,errorMsg:"注册失败"}
                    if (data.flag) {
                        location.href = "register_success.php";
                    } else {
                        $("#errorMsg").php(data.errorMsg);
                    }
                });
            });*/
    });

</script>

</body>
</html>