<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>一元秒杀！还包邮！</title>
<style type="text/css">
*{margin:0; padding:0;}
body{font-family:"微软雅黑";}
.html{ overflow:auto}
.c{ clear:both;}
a{text-decoration: NONE; color:#000; font-size:16px;}
.bodybg{ background:url(../image/bg.jpg); width:100%;}
.banner{ background:url(../image/banner.jpg) no-repeat center; height:542px;}
.nav{ border:none;width:1000px;margin:0 auto;}
.probg{ background:#f4ad1e; width:1000px; margin:0 auto; text-align:center;}
.fl{ float:left; padding-left:9px; padding-top:9px;}
.onebg{ width:321px; height:321px; background:#FFF;}
.titlebg{ width:321px; height:33px; background:#FFF;}
.buybg{ background:url(../image/pricebg.jpg); width:321px; height:70px;} 
.foreprice{ font-size:17px; text-decoration:line-through; color:#FFF;float:left; padding-top:13px; padding-left:25px;}
.button{ width:96px;height:70px;float:right; padding:0;}
.ads{ width:1000px; height:326px; margin:0 auto;}
.sm{ background:#FFF; width:100%; margin:0 auto;}
.xize{ width:1000px; margin:0 auto; text-align:left; font-size:36px; font-weight:700; color:#9E051A;}
.shuoming{ width:1000px; margin:0 auto; text-align:left; font-size:20px;color:#9E051A; line-height:35px;}


</style>
</head>

<body>
	<div class="banner"></div>
    <div class="bodybg">
    		<div class="nav"><img src="../image/nav.jpg" width="1000" height="70"/></div>
            <div class="probg">            
             <!-- 单个商品循环-->
             @foreach ($data as $val)
            	<div class="fl">
            		<div class="onebg"  title="小熊全自动煮蛋器">
                	<a href="http://www.600280.com/item/194723.html" target="_blank"><img src="{{$val->img}}" width="321px;height:321px"/></a>
                	</div> 
                	<div class="titlebg"><a href="http://www.600280.com/item/66494.html" target="_blank">{{$val->goods_name}}</a></div>
                	<div class="buybg">
                		<div class="foreprice">{{$val->freez}}</div>
                   	 <div class="button"><a href="goodsKill?name={{$val->goods_name}}"><img src="../image/button.jpg"/></a></div>                	
                	</div>
                 </div>
                 @endforeach
              <!-- 单个商品循环结束-->
              <div>
              	<a href="#" target="_blank"><img src="../image/ads.jpg" /></a>
              </div>
              
              <div class="c"></div>                      
   		 </div> 
         <div class="sm">
         <br />
        	 <div class="xize">1元秒杀细则：</div>
         	<div class="shuoming">1.参与秒杀前，请详细阅读秒杀规则，凡参与1元秒杀活动的用户，均视为同意秒杀规则。<br />2.秒杀商品将于2014年7月7日08:00:00上线-2014年7月11日23:59:59结束，当天商品售罄时当天秒杀结束，活动期间每一个云中央注册会员每期仅限秒杀一个商品，秒杀多件成功者，并通过收货人及联系方式可判定为同一人的，则取消全部订单。<br />3.秒杀成功以支付成功为准，早秒早得；秒杀下单后30分钟内未付款者自动取消订单，请特别注意。<br />4.请确保秒杀填写的收货人信息真实有效，因联系方式填写错误导致未收到礼品的，由用户自行承担损失。<br />5.对于任何通过不正当手段参与秒杀者，不正当手段包括但不限于使用秒杀器或类似作弊软件，云中央网站有权依据自身技术判断，并在不事先通知的情况下取消其秒杀资格或者取消订单。
        	 </div>
         </div>
    </div>
</body>
</html>
