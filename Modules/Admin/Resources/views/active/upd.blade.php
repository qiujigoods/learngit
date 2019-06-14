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
      <xblock style=" margin-top: 25px;">
      	<a href="active/index" style="margin-left: 20px; color: gray;"><i class="icon iconfont">&#xe697;</i>活动列表</a>
        
      </xblock>
    <div class="x-body">
        <form action="active/doUpd" method="post">
          <input type="hidden" name="id" value="<?php echo $res->id ?>">
          <div class="layui-form-item">
              <label for="name" class="layui-form-label">
                  <span class="x-red">*</span>活动名称
              </label>
              <div class="layui-input-inline">
                  <input type="text" onblur="nameSign()" id="name" placeholder="2到20位汉字组成" name="name" required="" lay-verify="name"
                  autocomplete="off" value="<?php echo $res->name?>" class="layui-input">
              </div>
              <div class="layui-form-mid layui-word-aux">
                  <span class="x-red" id="nameInfo">*</span>
              </div>
          </div>
          <div class="layui-form-item">
              <label for="start_time" class="layui-form-label">
                  <span class="x-red">*</span>开始时间
              </label>
              <div class="layui-input-inline">
                  <input type="datetime-local" onblur="start_timeSign()" id="start_time" name="start_time" required="" lay-verify="name" autocomplete="off" class="layui-input">
              </div>
              <div class="layui-form-mid layui-word-aux">
                  <span class="x-red" id="start_timeInfo">*</span>
              </div>
          </div>
          <div class="layui-form-item">
              <label for="end_time" class="layui-form-label">
                  <span class="x-red">*</span>结束时间
              </label>
              <div class="layui-input-inline">
                  <input type="datetime-local" onblur="end_timeSign()" id="end_time" name="end_time" required="" lay-verify="name"
                  autocomplete="off" class="layui-input">
              </div>
              <div class="layui-form-mid layui-word-aux">
                  <span class="x-red" id="end_timeInfo">*</span>
              </div>
          </div>
          <div class="layui-form-item">
              <label for="name" class="layui-form-label">
                  <span class="x-red">*</span>是否开启活动
              </label>
              <div class="layui-input-inline">
                  <input type="radio" id="name" name="status" required="" lay-verify="name"
                  autocomplete="off" value="1" style="margin-top: 12px;" checked="">开启
                  <input type="radio" id="name" name="status" required="" lay-verify="name"
                  autocomplete="off" value="0">关闭
              </div>
              <div class="layui-form-mid layui-word-aux">
                  <span class="x-red">*</span>
              </div>
          </div>
          <div class="layui-form-item layui-form-text">
              <label for="desc" class="layui-form-label">
                  活动描述
              </label>
              <div class="layui-input-block">
                  <textarea placeholder="请输入内容" onblur="descSign()" id="desc" name="desc" class="layui-textarea"><?php echo $res->desc?></textarea>
              </div>
          </div>
          <div class="layui-form-item">
              <label for="L_repass" class="layui-form-label">
              </label>
              <button  class="layui-btn" type="submit" lay-submit="">
                  修改
              </button>
          </div>
      </form>
    </div>
    
    <script>
        function nameSign(){
        	var name=document.getElementById('name').value;
			// alert(name)
			var nameInfo=document.getElementById('nameInfo');

			var uPattern = /^[\u4e00-\u9fa5]{2,20}$/;

			if(name=='' || name.length<1){
				nameInfo.innerHTML="<font color='red'>名称不能为空</font>";
				return false;
			}else if(!uPattern.test(name)){
				nameInfo.innerHTML="<font color='red'>2到20位汉字组成</font>";
				return false;
			}else{
				nameInfo.innerHTML="<font color='green'>√</font>";
				return true;
			}
        }
        function start_timeSign(){
        	var name=document.getElementById('start_time').value;
			// alert(name)
			var start_timeInfo=document.getElementById('start_timeInfo');

			if(name=='' || name.length<1){
				start_timeInfo.innerHTML="<font color='red'>请选择活动开始时间</font>";
				return false;
			}else{
				start_timeInfo.innerHTML="<font color='green'>√</font>";
				return true;
			}
        }
        function end_timeSign(){
        	var name=document.getElementById('name').value;
			// alert(name)
			var end_timeInfo=document.getElementById('end_timeInfo');

			if(name=='' || name.length<1){
				end_timeInfo.innerHTML="<font color='red'>请选择活动结束时间</font>";
				return false;
			}else{
				end_timeInfo.innerHTML="<font color='green'>√</font>";
				return true;
			}
        }
    </script>
    <script>var _hmt = _hmt || []; (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
      })();</script>
  </body>

</html>