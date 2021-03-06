<!DOCTYPE html>
<html class="x-admin-sm">
  <head>
    <meta charset="UTF-8">
    <title>欢迎页面-X-admin2.1</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <link rel="stylesheet" href="../css/font.css">
    <link rel="stylesheet" href="../css/xadmin.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="../lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="../js/xadmin.js"></script>
    <script type="text/javascript" src="../js/cookie.js"></script>
    <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
    <!--[if lt IE 9]>
      <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
      <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  
  <body>
    <div class="x-body">
        <form class="layui-form" action="statusUpdate" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
          <div class="layui-form-item">
              <label for="L_email" class="layui-form-label">
                  修改状态
              </label>
              <div class="layui-input-inline">
                  <input type="radio" name="status" required="" autocomplete="off" class="layui-input" title="待支付订单" value="1">
                  <input type="radio" name="status" required="" autocomplete="off" class="layui-input" title="待收货订单" value="2">
                  <input type="radio" name="status" required="" autocomplete="off" class="layui-input" title="带评论订单" value="3">

              </div>
          </div>
          <div class="layui-form-item">
              <label for="L_repass" class="layui-form-label">
              </label>
              <input type="submit" value="修改" class="layui-btn">
          </div>
      </form>
    </div>
  </body>

</html>