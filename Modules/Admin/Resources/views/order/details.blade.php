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
    <div class="x-nav">
      <span class="layui-breadcrumb">
        <a href="">首页</a>
        <a href="">演示</a>
        <a>
          <cite>导航元素</cite></a>
      </span>
      <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    <div class="x-body">
      
        <h2>订单详情页</h2><br><br>
      <table class="x-admin">
        <div class="layui-form-item">
              <label for="L_email" class="layui-form-label">
                  商品编号：
              </label>
              <div class="layui-input-inline">
                  <input type="text" required="" disabled="" autocomplete="off" class="layui-input" value="<?php echo $res->order_no; ?>">
              </div>
          </div>
          <div class="layui-form-item">
              <label for="L_email" class="layui-form-label">
                  收货名称：
              </label>
              <div class="layui-input-inline">
                  <input type="text" required="" disabled="" autocomplete="off" class="layui-input" value="<?php echo $res->accept_name; ?>">
              </div>
          </div>
          <div class="layui-form-item">
              <label for="L_email" class="layui-form-label">
                  联系电话：
              </label>
              <div class="layui-input-inline">
                  <input type="text" required="" disabled="" autocomplete="off" class="layui-input" value="<?php echo $res->telphone; ?>">
              </div>
          </div>
          <div class="layui-form-item">
              <label for="L_email" class="layui-form-label">
                  用户留言：
              </label>
              <div class="layui-input-inline">
                  <input type="text" required="" disabled="" autocomplete="off" class="layui-input" value="<?php echo $res->postscript; ?>">
              </div>
          </div>
          <div class="layui-form-item">
              <label for="L_email" class="layui-form-label">
                  邮编：
              </label>
              <div class="layui-input-inline">
                  <input type="text" required="" disabled="" autocomplete="off" class="layui-input" value="<?php echo $res->postcode; ?>">
              </div>
          </div>
          <div class="layui-form-item">
              <label for="L_email" class="layui-form-label">
                  商品地址：
              </label>
              <div class="layui-input-inline">
                  <input type="text" required="" disabled="" autocomplete="off" class="layui-input" value="<?php echo $res->address; ?>">
              </div>
          </div>
          <div class="layui-form-item">
              <label for="L_email" class="layui-form-label">
                  应付金额：
              </label>
              <div class="layui-input-inline">
                  <input type="text" required="" disabled="" autocomplete="off" class="layui-input" value="<?php echo $res->payable_amount; ?>">
              </div>
          </div>
          <div class="layui-form-item">
              <label for="L_email" class="layui-form-label">
                  实付金额：
              </label>
              <div class="layui-input-inline">
                  <input type="text" required="" disabled="" autocomplete="off" class="layui-input" value="<?php echo $res->real_amount; ?>">
              </div>
          </div>
          <div class="layui-form-item">
              <label for="L_email" class="layui-form-label">
                  总运费：
              </label>
              <div class="layui-input-inline">
                  <input type="text" required="" disabled="" autocomplete="off" class="layui-input" value="<?php echo $res->payable_freight; ?>">
              </div>
          </div>
          <div class="layui-form-item">
              <label for="L_email" class="layui-form-label">
                  实付运费：
              </label>
              <div class="layui-input-inline">
                  <input type="text" required="" disabled="" autocomplete="off" class="layui-input" value="<?php echo $res->real_freight; ?>">
              </div>
          </div>
          <div class="layui-form-item">
              <label for="L_email" class="layui-form-label">
                  总金额：
              </label>
              <div class="layui-input-inline">
                  <input type="text" required="" disabled="" autocomplete="off" class="layui-input" value="<?php echo $res->order_amount; ?>">
              </div>
          </div>
          <div class="layui-form-item">
              <label for="L_email" class="layui-form-label">
                  下单时间：
              </label>
              <div class="layui-input-inline">
                  <input type="text" required="" disabled="" autocomplete="off" class="layui-input" value="<?php echo $res->create_time; ?>">
              </div>
          </div>
          <div class="layui-form-item">
              <label for="L_email" class="layui-form-label">
                  付款时间：
              </label>
              <div class="layui-input-inline">
                  <input type="text" required="" disabled="" autocomplete="off" class="layui-input" value="<?php echo $res->pay_time; ?>">
              </div>
          </div>
          <div class="layui-form-item">
              <label for="L_email" class="layui-form-label">
                  发货时间：
              </label>
              <div class="layui-input-inline">
                  <input type="text" required="" disabled="" autocomplete="off" class="layui-input" value="<?php echo $res->send_time; ?>">
              </div>
          </div>
          <a href="orderUserUpdate?id=<?php echo $res->id?>" style="margin-left: 300px;"><button class="layui-btn layui-btn layui-btn-xs"><i class="layui-icon">&#xe642;</i>用户信息编辑</button></a>
      </table>
  
    </div>
    <script>
      layui.use('laydate', function(){
        var laydate = layui.laydate;
        
        //执行一个laydate实例
        laydate.render({
          elem: '#start' //指定元素
        });

        //执行一个laydate实例
        laydate.render({
          elem: '#end' //指定元素
        });
      });

       /*用户-停用*/
      function member_stop(obj,id){
          layer.confirm('确认要停用吗？',function(index){

            var title = $(obj).attr('title');
            var id = $(obj).attr('id');
            $.ajax({
              url:'status',
              type:'post',
              data:{title:title,id:id},
              dataType:'json',
              success:function(e){
                console.log(e);
              }

            })
                if($(obj).attr('title')=='启用'){

                //发异步把用户状态进行更改
                $(obj).attr('title','停用')
                $(obj).find('i').html('&#xe62f;');

                $(obj).parents("tr").find(".td-status").find('span').addClass('layui-btn-disabled').html('已停用');
                layer.msg('已停用!',{icon: 5,time:1000});

              }else{
                $(obj).attr('title','启用')
                $(obj).find('i').html('&#xe601;');

                $(obj).parents("tr").find(".td-status").find('span').removeClass('layui-btn-disabled').html('已启用');
                layer.msg('已启用!',{icon: 5,time:1000});
              }
              
          });
      }

      /*用户-删除*/
      function member_del(obj,id){
          layer.confirm('确认要删除吗？',function(index){
              //发异步删除数据
              $(obj).parents("tr").remove();
              layer.msg('已删除!',{icon:1,time:1000});
          });
      }



      function delAll (argument) {

        var data = tableCheck.getData();
  
        layer.confirm('确认要删除吗？'+data,function(index){
            //捉到所有被选中的，发异步进行删除
            layer.msg('删除成功', {icon: 1});
            $(".layui-form-checked").not('.header').parents('tr').remove();
        });
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