<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title> - 联系人</title>
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="shortcut icon" href="favicon.ico"> <link href="/coupon/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/coupon/css/font-awesome.css?v=4.4.0" rel="stylesheet">

    <link href="/coupon/css/animate.css" rel="stylesheet">
    <link href="/coupon/css/style.css?v=4.1.0" rel="stylesheet">

</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <?php foreach ($data as $k => $v): ?>
                <div class="col-sm-4">
                    <div class="contact-box">
                        <a href="profile.html">
                            <div class="col-sm-4">
                                <div class="text-center">
                                    <img alt="image" class="img-circle m-t-xs img-responsive" src="/coupon/img/a2.jpg">
                                    <div class="m-t-xs font-bold">{{$v->discount}}优惠券</div>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <h3><strong></strong></h3>
                                <p style="color:red"><a href="join?id={{$v->id}}&user_id=2">领取优惠券</a></p>
                                <p>{{$v->desc}}</p>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>

    <!-- 全局js -->
    <script src="/coupon/js/jquery.min.js?v=2.1.4"></script>
    <script src="/coupon/js/bootstrap.min.js?v=3.3.6"></script>



    <!-- 自定义js -->
    <script src="/coupon/js/content.js?v=1.0.0"></script>



    <script>
        $(document).ready(function () {
            $('.contact-box').each(function () {
                animationHover(this, 'pulse');
            });
        });
    </script>

    
    

</body>

</html>
