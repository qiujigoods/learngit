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
      <div class="layui-row">
        <h2>分类展示页</h2>
      </div>
      <blockquote class="layui-elem-quote">每个tr 上有两个属性 cate-id='1' 当前分类id fid='0' 父级id ,顶级分类为 0，有子分类的前面加收缩图标<i class="layui-icon x-show" status='true'>&#xe623;</i></blockquote>
<!--       <xblock>
        <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
        <span class="x-right" style="line-height:40px">共有数据：88 条</span>
      </xblock> -->
      <table class="layui-table layui-form">
        <thead>
          <tr>
            <th width="70">ID</th>
            <th width="150">分类名称</th>
            <th width="50">SEO关键词</th>
            <th width="50">SEO描述</th>
            <th width="50">SEO标题</th>
            <th width="100">首页是否显示</th>
            <th width="50">排序</th>
            <th width="250">操作</th>
        </thead>
        <tbody class="x-cate">

          <?php $__currentLoopData = $typeList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr cate-id='<?php echo e($v->id); ?>' fid='<?php echo e($v->parent_id); ?>' >
            <td><?php echo e($v->id); ?></td>
            <td>
              <?php echo e(str_repeat("|---",$v->level)); ?><?php echo e($v->name); ?>

              <i class="layui-icon x-show" status='true'>&#xe623;</i>
            </td>
            <td><?php echo e($v->keywords); ?></td>
            <td><?php echo e($v->descript); ?></td>
            <td><?php echo e($v->title); ?></td>
            <td><?php echo e($v->visibility); ?></td>
            <td><?php echo e($v->sort); ?></td>
            <td class="td-manage">
              <button class="layui-btn layui-btn layui-btn-xs"  onclick="x_admin_show('编辑','type/updFl?id=<?php echo e($v->id); ?>')" ><i class="layui-icon">&#xe642;</i>编辑</button>
              <a href="type/delFl?id=<?php echo e($v->id); ?>"><button class="layui-btn-danger layui-btn layui-btn-xs" href="" ><i class="layui-icon">&#xe640;</i>删除</button></a>
              <!-- <a href="type/delFl?id=<?php echo e($v->id); ?>">删除</a> -->
            </td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
    <style type="text/css">
      
    </style>
    <script>
      layui.use(['form'], function(){
        form = layui.form;
        
      });

      

      /*用户-删除*/
      // function member_del(obj,id){
      //     layer.confirm('确认要删除吗？',function(index){
      //         //发异步删除数据
      //         $(obj).parents("tr").remove();
      //         layer.msg('已删除!',{icon:1,time:1000});
      //     });
      // }



      // function delAll (argument) {

      //   var data = tableCheck.getData();
  
      //   layer.confirm('确认要删除吗？'+data,function(index){
      //       //捉到所有被选中的，发异步进行删除
      //       layer.msg('删除成功', {icon: 1});
      //       $(".layui-form-checked").not('.header').parents('tr').remove();
      //   });
      // }
    </script>
    <script>var _hmt = _hmt || []; (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
      })();</script>
  </body>

</html><?php /**PATH D:\laragon\www\shop\Modules\Admin\Providers/../Resources/views/type/index.blade.php ENDPATH**/ ?>