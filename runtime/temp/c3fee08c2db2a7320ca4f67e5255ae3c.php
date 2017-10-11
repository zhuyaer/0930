<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:97:"C:\php\server\Apache24\htdocs\twothink\public/../application/home/view/default/article\index.html";i:1507472587;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
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
                <p class="navbar-text"><a href="<?php echo url('index/index'); ?>" class="navbar-link">首页</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="<?php echo url('fuwu/index'); ?>" class="navbar-link">服务</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="<?php echo url('faxian/index'); ?>" class="navbar-link">发现</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="<?php echo url('my/index'); ?>" class="navbar-link">我的</a></p>
            </div>
        </div>
    </nav>
    <!--导航结束-->

    <div class="container-fluid" id="list">

        <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <div class="row noticeList">
            <a href="<?php echo url('article/detail?id='.$vo['id']); ?>">
                <div class="col-xs-2">
                    <img class="noticeImg" src="__ROOT__<?php echo get_cover_path($vo['cover_id']); ?>" />
                </div>
                <div class="col-xs-10">
                    <p class="title"><?php echo $vo['title']; ?></p>
                    <p class="intro"><?php echo $vo['description']; ?></p>
                    <p class="info">浏览: <?php echo $vo['view']; ?> <span class="pull-right"><?php echo date('Y-m-d H:i',$list['create_time']); ?></span> </p>
                </div>
            </a>
        </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
    <div class="text-center">
        <input type="hidden" id="category_id" value="<?php echo $category_id; ?>">
        <button type="button" class="btn btn-info ajax-page">获取更多~~~</button>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="__STATIC__/jquery-1.11.2.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="__STATIC__/bootstrap/js/bootstrap.min.js"></script>

<script type="application/javascript">
    var inner_url = "/index.php/home/article/detail";
    var p = 1;
    $(function () {
        $('.ajax-page').click(function () {
            p=p+1;
            var category_id = $('#category_id').val();
            var url = 'lists?category='+category_id+'&page='+p;
            $.getJSON(url,function (result) {
                var data = result.data;
                console.debug(data);
                if(!data.length){
                    $('.ajax-page').html("没有跟多数据了！！").removeClass('ajax-page')
                }else{
                    var html="";
                    $(data).each(function (i,v) {

                        html += '<div class="row noticeList">\
                    <a class="detail_view" data-id="'+v.id+'"  href="'+inner_url+'/id/'+v.id+'.html">\
                        <div class="col-xs-2">\
                            <img class="img-rounded img-responsive" src="'+v.path+'" />\
                        </div>\
                        <div class="col-xs-10">\
                            <p class="title">'+v.title+'</p>\
                            <p class="intro">'+v.description+'</p>\
                            <p class="info">浏览:<span class="view"> '+v.view+'</span> <span class="pull-right">'+new Date(parseInt(v.create_time) * 1000).toLocaleString().replace(/年|月/g, "-").replace(/日/g, " ")+'</span> </p>\
                        </div>\
                    </a>\
                </div>';
                    })
                    $('#list').append(html);
                }
            })
        })
    });
</script>

</body>
</html>