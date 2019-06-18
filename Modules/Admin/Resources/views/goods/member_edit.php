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
        <form action="goods_up" method="post" enctype="multipart/form-data">

          <div class="layui-form-item">
              <label class="layui-form-label">
                  商品名称
              </label>
              <div class="layui-input-inline">
                  <input type="text" name="name" class="layui-input" value="<?php echo $res->name ?>" >
                  <input type="hidden" name="id" value="<?php echo $res->id ?>">
              </div>
          </div>

          <div class="layui-form-item">
              <label class="layui-form-label">
                  商品市场价格
              </label>
              <div class="layui-input-inline">
                  <input type="text" name="market_price" class="layui-input" value="<?php echo $res->market_price ?>" >
              </div>
          </div>
          
          <div class="layui-form-item">
              <label class="layui-form-label">
                  商品成本价格
              </label>
              <div class="layui-input-inline">
                  <input type="text" name="cost_price" class="layui-input" value="<?php echo $res->cost_price ?>" >
              </div>
          </div>

          <div class="layui-form-item">
              <label class="layui-form-label">
                  商品上架时间
              </label>
              <div class="layui-input-inline">
                  <input type="date" name="up_time" class="layui-input" value="<?php echo $res->up_time ?>" >
              </div>
          </div>

          <div class="layui-form-item">
              <label class="layui-form-label">
                  商品下架时间
              </label>
              <div class="layui-input-inline">
                  <input type="date" name="down_time" class="layui-input" value="<?php echo $res->down_time ?>" >
              </div>
          </div>

          <div class="layui-form-item">
              <label class="layui-form-label">
                  商品图片
              </label>
              <div class="layui-input-inline">
                  <input type="file" name="img" class="layui-input">
              </div>
          </div>

          <div class="layui-form-item">
              <label class="layui-form-label">
                  商品描述
              </label>
              <div class="layui-input-inline">
                  <textarea name="content" > <?php echo $res->content ?> </textarea>
              </div>
          </div>
  
          <div class="layui-form-item">
              <label for="L_repass" class="layui-form-label">
              </label>
              <input type="submit" class="layui-btn" value="编辑">
          </div>
      </form>
    </div>
    <script>
      layui.use(['form','layer'], function(){
          $ = layui.jquery;
        var form = layui.form
        ,layer = layui.layer;
      
        //自定义验证规则
        form.verify({
          nikename: function(value){
            if(value.length < 5){
              return '昵称至少得5个字符啊';
            }
          }
          ,pass: [/(.+){6,12}$/, '密码必须6到12位']
          ,repass: function(value){
              if($('#L_pass').val()!=$('#L_repass').val()){
                  return '两次密码不一致';
              }
          }
        });

        //监听提交
        form.on('submit(add)', function(data){
          console.log(data);
          //发异步，把数据提交给php
          layer.alert("增加成功", {icon: 6},function () {
              // 获得frame索引
              var index = parent.layer.getFrameIndex(window.name);
              //关闭当前frame
              parent.layer.close(index);
          });
          return false;
        });
        
        
      });
  </script>
    <script>var _hmt = _hmt || []; (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
      })();</script>
  </body>

</html>