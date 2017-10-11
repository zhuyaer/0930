<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:98:"C:\php\server\Apache24\htdocs\twothink\public/../application/home/view/default/login\register.html";i:1506698532;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>在线报修</title>

    <!-- Bootstrap -->
    <!--../public/static/static/bootstrap/css/bootstrap.min.css-->
    <link href="__STATIC__/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="__STATIC__/css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .main{margin-bottom: 60px;}
        .indexLabel{padding: 10px 0; margin: 10px 0 0; color: #fff;}
    </style>
</head>
<body>
<div class="main">
    <!--导航部分-->
    <nav class="navbar navbar-default navbar-fixed-bottom">
        <div class="container-fluid text-center">
            <div class="col-xs-3">
                <p class="navbar-text"><a href="indexs.html" class="navbar-link">首页</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="#" class="navbar-link">服务</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="#" class="navbar-link">发现</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="#" class="navbar-link">我的</a></p>
            </div>
        </div>
    </nav>
    <!--导航结束-->

    <div class="container-fluid">
        <h3>用户注册</h3>
        <form method="post" action="<?php echo url('login/register'); ?>">
            <div class="form-group">
                <label>用户名:</label>
                <input type="text" name="username" class="form-control" />
            </div>
            <div class="form-group">
                <label>密码(必填):</label>
                <input type="password" name="password" class="form-control" />
            </div>
            <div class="form-group">
                <label>请再次输入密码(必填):</label>
                <input type="password" name="repassword" class="form-control" />
            </div>
            <div class="form-group">
                <label>邮箱:</label>
                <input type="email" name="email" class="form-control" />
            </div>
            <div class="form-group">
                <label>验证码:</label>
                <?php echo captcha_img(); ?>
                <input type="text" name="verify" class="form-control" />
            </div>
            <!--<div class="form-group">-->
                <!--<div><a href="#"><span class="glyphicon glyphicon-plus onlineUpImg"></span></a></div>-->
                <!--<label>图片(最多上传5张,可不上传):</label>-->
            <!--</div>-->
            <div class="form-group">
                <button class="btn btn-primary onlineBtn">注册</button>
            </div>
        </form>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="__STATIC__/jquery-1.11.2.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="__STATIC__/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>