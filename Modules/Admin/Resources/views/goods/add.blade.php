<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../sku/css/sku_style.css" />
<title>jQuery并夕夕商品发布动态生成SKU</title>

<script type="text/javascript" src="../sku/js/jquery.min.js"></script>
<script type="text/javascript" src="../sku/js/createSkuTable.js"></script>
<script type="text/javascript" src="../sku/js/customSku.js"></script>
<script type="text/javascript" src="../sku/plugins/layer/layer.js"></script>

</head>
<body><script src="../sku/demos/googlegg.js"></script>

<div class="demo-title"><h2>jQuery并夕夕商品发布动态生成SKU</h2></div>
	<ul class="SKU_TYPE"><h4>请输入商品名称<em> ↓ ↓ ↓</em></h4></ul>
	<ul class="SKU_TYPE">
		<li><input type="text" class="title" /></li>
	</ul>
	<div class="clear"></div>
	<ul class="SKU_TYPE"><h4>请输入商品市场价格<em> ↓ ↓ ↓</em></h4></ul>
	<ul class="SKU_TYPE">
		<li><input type="text" class="market_price" /></li>
	</ul>
	<div class="clear"></div>
	<ul class="SKU_TYPE"><h4>请输入商品成本价格<em> ↓ ↓ ↓</em></h4></ul>
	<ul class="SKU_TYPE">
		<li><input type="text" class="cost_price" /></li>
	</ul>
	<div class="clear"></div>
	<ul class="SKU_TYPE"><h4>请输入商品上架时间<em> ↓ ↓ ↓</em></h4></ul>
	<ul class="SKU_TYPE">
		<li><input type="date" class="up_time" /></li>
	</ul>
	<div class="clear"></div>
	<ul class="SKU_TYPE"><h4>请输入商品下架时间<em> ↓ ↓ ↓</em></h4></ul>
	<ul class="SKU_TYPE">
		<li><input type="date" class="down_time" /></li>
	</ul>
	<div class="clear"></div>
	<ul class="SKU_TYPE"><h4>请输入商品单位<em> ↓ ↓ ↓</em></h4></ul>
	<ul class="SKU_TYPE">
		<li> <select class="unit" ><option value="">请选择</option><option value="件">件</option><option value="个">个</option><option value="箱">箱</option></select> </li>
	</ul>
	<div class="clear"></div>
	<ul class="SKU_TYPE"><h4>请输入SEO关键词<em> ↓ ↓ ↓</em></h4></ul>
	<ul class="SKU_TYPE">
		<li> <input type="text" class="keywords" /> </li>
	</ul>
	<div class="clear"></div>
	<ul class="SKU_TYPE"><h4>请输入商品产品搜索词<em> ↓ ↓ ↓</em></h4></ul>
	<ul class="SKU_TYPE">
		<li> <input type="text" class="search_words" /> </li>
	</ul>
	<div class="clear"></div>
	<ul class="SKU_TYPE"><h4>请输入商品运费<em> ↓ ↓ ↓</em></h4></ul>
	<ul class="SKU_TYPE">
		<li> <select class="is_delivery_fee" ><option value="">请选择</option><option value="0">免运费</option><option value="1">收运费</option></select> </li>
	</ul>
	<div class="clear"></div>
	<ul class="SKU_TYPE"><h4>请输入SEO描述<em> ↓ ↓ ↓</em></h4></ul>
	<ul class="SKU_TYPE">
		<li> <textarea class="description" cols="30" rows="10"></textarea> </li>
	</ul>
	<div class="clear"></div>
	<ul class="SKU_TYPE"><h4>请输入商品描述<em> ↓ ↓ ↓</em></h4></ul>
	<ul class="SKU_TYPE">
		<li> <textarea class="content" cols="30" rows="10"></textarea> </li>
	</ul>
	<div class="clear"></div>
	<ul class="SKU_TYPE"><h4>请选择商品分类<em> ↓ ↓ ↓</em></h4></ul>
	<div class="clear"></div>
	<ul class="SKU_TYPE">
		<select class="select" ="" id="">
			<li><option value="">请选择分类</option></li>
			<?php foreach ($res as $key => $v) : ?>
				<li><option value="<?php echo $v->id; ?>"><?php echo $v->name; ?></option></li>
			<?php endforeach  ?> 
		</select>
	</ul>
	<div class="clear"></div>

<script>
	$(document).on('change','.select',function () {
		var obj = $(this);
		var id = $(this).val();
		var sum = 1;
		$.get("sel",
			{id:id},
		function(data) {
			obj.nextAll().remove();
			var data = jQuery.parseJSON(data);
			var sel = "<select class='sel'>";
			if (data =='') {
				return false;
			};
			$(data).each(function(k,v) {
				if (sum==1) {
					sel+= "<option>请选择</option>"
					sum = sum+1;
				}
				sel+= "<option value="+v.id+">"+v.name+"</option>"
			})
			sel+="</select>";
			obj.after(sel);
		})
	})
</script>

<script>
	$(document).on('change','.sel',function  () {
		var obj = $(this);
		var id = $(this).val();

		$.get("selval",
			{id:id},
		function(data) {
			obj.nextAll().remove();
			var sel = "<table>";
			if (data =='') {
				return false;
			};
			$(data[0]).each(function (k,v) {
				$(data[1]).each(function (i,j) {
					if ( v.attr_id == j.id) {
						sel+= "<ul class='SKU_TYPE'>";
						sel+= "<li is_required='0' propid='3' class='sel' value='"+j.name+"' sku-type-name='"+j.name+"'>"+j.name+"：</li>";
						sel+= "</ul>";
						sel+= "<ul>";
						$(data[2]).each(function (u,n) {
							if ( j.id == n.attribute_id) {
								sel+= "<li><label><input type='checkbox' class='sku_value' propvalid='"+n.id+"' value='"+n.attribute_value+"' />"+n.attribute_value+"</label></li>";
							}
						})
						sel+= "</ul>";
						sel+= "<div class='clear'></div>";
					}
				})
			})
			sel+= "<div class='clear'></div>";
			sel+= "<ul>";
			sel+= "<button class='cloneSku'>添加自定义sku属性</button>";
			sel+= "</ul>";
			sel+= "<ul>";
			sel+= "<ul>";
			sel+= "<button class='add' >添加商品</button>";
			sel+= "</ul>";
			sel+= "</ul>";
			sel+= "</table>";
			obj.after(sel);
		})
	})
</script>

<script>
	$(document).on('click','.add',function () {

		var title = $('.title').val();
		var sel = $('.sel').val();
		var market_price = $('.market_price').val();
		var cost_price = $('.cost_price').val();
		var up_time = $('.up_time').val();
		var down_time = $('.down_time').val();
		var keywords = $('.keywords').val();
		var unit = $('.unit').val();
		var search_words = $('.search_words').val();
		var description = $('.description').val();
		var content = $('.content').val();
		var is_delivery_fee = $('.is_delivery_fee').val();

		getAlreadySetSkuVals();
		console.log([alreadySetSkuVals]);
		var data = alreadySetSkuVals;
		$.get("add_sku",
			{title:title,sel:sel,data:data,market_price:market_price,cost_price:cost_price,up_time:up_time,down_time:down_time,keywords:keywords,unit:unit,search_words:search_words,description:description,content:content,is_delivery_fee:is_delivery_fee},
		function(data) {
			alert(添加成功);
		})
	})


</script>

<!-- <ul class="SKU_TYPE">
	<li is_required='1' propid='1' sku-type-name="存储"><em>*</em>存储：</li>
</ul>
<ul>
	<li><label><input type="checkbox" class="sku_value" propvalid='11' value="16G" />16G</label></li>
	<li><label><input type="checkbox" class="sku_value" propvalid='12' value="32G" />32G</label></li>
	<li><label><input type="checkbox" class="sku_value" propvalid='13' value="64G" />64G</label></li>
	<li><label><input type="checkbox" class="sku_value" propvalid='14' value="128G" />128G</label></li>
	<li><label><input type="checkbox" class="sku_value" propvalid='15' value="256G" />256G</label></li>
</ul>
<div class="clear"></div>
<ul class="SKU_TYPE">
	<li is_required='1' propid='2' sku-type-name="版本"><em>*</em>版本：</li>
</ul>
<ul>
	<li><label><input type="checkbox" class="sku_value" propvalid='21' value="中国大陆版" />中国大陆版</label></li>
	<li><label><input type="checkbox" class="sku_value" propvalid='22' value="港版" />港版</label></li>
	<li><label><input type="checkbox" class="sku_value" propvalid='23' value="韩版" />韩版</label></li>
	<li><label><input type="checkbox" class="sku_value" propvalid='24' value="美版" />美版</label></li>
	<li><label><input type="checkbox" class="sku_value" propvalid='25' value="日版" />日版</label></li>
</ul>
<div class="clear"></div>
			
<ul class="SKU_TYPE">
	<li is_required='0' propid='3' sku-type-name="颜色">颜色：</li>
</ul>
<ul>
	<li><label><input type="checkbox" class="sku_value" propvalid='31' value="土豪金" />土豪金</label></li>
	<li><label><input type="checkbox" class="sku_value" propvalid='32' value="银白色" />银白色</label></li>
	<li><label><input type="checkbox" class="sku_value" propvalid='33' value="深空灰" />深空灰</label></li>
	<li><label><input type="checkbox" class="sku_value" propvalid='34' value="黑色" />黑色</label></li>
	<li><label><input type="checkbox" class="sku_value" propvalid='33' value="玫瑰金" />玫瑰金</label></li>
</ul>
<div class="clear"></div>
<ul class="SKU_TYPE">
	<li is_required='1' propid='4' sku-type-name="类型"><em>*</em>类型：</li>
</ul>
<ul>
	<li><label><input type="checkbox" class="sku_value" propvalid='41' value="儿童" />儿童</label></li>
	<li><label><input type="checkbox" class="sku_value" propvalid='42' value="成人" />成人</label></li>
</ul> -->
<!-- <div class="clear"></div>
<button class="cloneSku">添加自定义sku属性</button> -->

<!--sku模板,用于克隆,生成自定义sku-->
<div id="skuCloneModel" style="display: none;">
	<div class="clear"></div>
	<ul class="SKU_TYPE">
		<li is_required='0' propid='' sku-type-name="">
			<a href="javascript:void(0);" class="delCusSkuType">移除</a>
			<input type="text" class="cusSkuTypeInput" />：
		</li>
	</ul>
	<ul>
		<li>
			<input type="checkbox" class="model_sku_val" propvalid='' value="" />
			<input type="text" class="cusSkuValInput" />
		</li>
		<button class="cloneSkuVal">添加自定义属性值</button>
	</ul>
	<div class="clear"></div>
</div>
<!--单个sku值克隆模板-->
<li style="display: none;" id="onlySkuValCloneModel">
	<input type="checkbox" class="model_sku_val" propvalid='' value="" />
	<input type="text" class="cusSkuValInput" />
	<a href="javascript:void(0);" class="delCusSkuVal">删除</a>
</li>
<div class="clear"></div>
<div id="skuTable"></div>
<script type="text/javascript" src="../sku/js/getSetSkuVals.js"></script>

<div style="text-align:center;margin:50px 0; font:normal 14px/24px 'MicroSoft YaHei';">
</div>
</body>
</html>

