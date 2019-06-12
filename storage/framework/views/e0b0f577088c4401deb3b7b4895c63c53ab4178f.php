<!DOCTYPE html>
<html class="x-admin-sm">
  
  <head>
    <meta charset="UTF-8">
    <title>欢迎页面-X-admin2.1</title>
    <base href="../">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <link rel="stylesheet" href="./css/font.css">
    <link rel="stylesheet" href="./css/xadmin.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="./lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="./js/xadmin.js"></script>
    <script type="text/javascript" src="./js/cookie.js"></script>
    <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
    <!--[if lt IE 9]>
      <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
      <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  
  <body>
    <div class="x-body">
        <form action="type/doUpdate" method="post">
          <input type="hidden" name="id" value="<?php echo $res->id ?>">
          <div class="layui-form-item">
              <label for="name" class="layui-form-label">
                  <span class="x-red">*</span>分类名称
              </label>
              <div class="layui-input-inline">
                  <input type="text" id="name" name="name" required="" lay-verify="required"
                  autocomplete="off" value="<?php echo $res->name?>" class="layui-input">
              </div>
              <div class="layui-form-mid layui-word-aux">
                  <span class="x-red">*</span>请输入您要修改的分类名称
              </div>
          </div>
          <div class="layui-form-item">
              <label for="keywords" class="layui-form-label">
                  <span class="x-red">*</span>SEO关键词
              </label>
              <div class="layui-input-inline">
                  <input type="text" value="<?php echo $res->keywords?>" id="keywords" name="keywords" required="" lay-verify="phone"
                  autocomplete="off" class="layui-input">
              </div>
              <div class="layui-form-mid layui-word-aux">
                  <span class="x-red">*</span>请输入SEO关键词
              </div>
          </div>
          <div class="layui-form-item">
              <label for="descript" class="layui-form-label">
                  <span class="x-red">*</span>SEO描述
              </label>
              <div class="layui-input-inline">
                  <input type="text" value="<?php echo $res->descript?>" id="descript" name="descript" required="" lay-verify="email"
                  autocomplete="off" class="layui-input">
              </div>
              <div class="layui-form-mid layui-word-aux">
                  <span class="x-red">*</span>请输入分类的SEO描述
              </div>
          </div>
          <div class="layui-form-item">
              <label for="title" class="layui-form-label">
                  <span class="x-red">*</span>SEO标题
              </label>
              <div class="layui-input-inline">
                  <input type="text" value="<?php echo $res->title?>" id="title" name="title" required="" lay-verify="email"
                  autocomplete="off" class="layui-input">
              </div>
              <div class="layui-form-mid layui-word-aux">
                  <span class="x-red">*</span>请输入分类的SEO标题
              </div>
          </div>
          <div class="layui-form-item">
              <label class="layui-form-label"><span class="x-red">*</span>是否显示分类</label>
              <div class="layui-input-block">
                <input type="radio" name="visibility" lay-skin="primary" title="显示" value="1" style="margin-top: 12px;">显示
                <input type="radio" name="visibility" lay-skin="primary" title="不显示" value="0">不显示
              </div>
          </div>
          <div class="layui-form-item">
              <label for="sort" class="layui-form-label">
                  <span class="x-red">*</span>排序
              </label>
              <div class="layui-input-inline">
                  <input type="text" value="<?php echo $res->sort?>" id="sort" name="sort" required="" lay-verify="sort"
                  autocomplete="off" class="layui-input">
              </div>
              <div class="layui-form-mid layui-word-aux">
                  6到16个字符
              </div>
          </div>
          <div class="layui-form-item">
              <label for="L_repass" class="layui-form-label">
              </label>
              <!-- <button class="layui-btn layui-btn layui-btn-xs" type="text">修改</button> -->
              <!-- <input type="submit" value="xiugai"> -->
              <button  class="layui-btn" type="submit" lay-filter="add" lay-submit="">
                  修改
              </button>
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
            layer.alert("修改成功", {icon: 6},function () {
                // 获得frame索引
                var index = parent.layer.getFrameIndex(window.name);
                //关闭当前frame
                parent.layer.close(index);
            });
            // return false;
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

</html><?php /**PATH D:\laragon\www\shop\Modules\Admin\Providers/../Resources/views/type/update.blade.php ENDPATH**/ ?>