<?php

use Illuminate\Support\Facades\Cookie;

?>
<!DOCTYPE html>
<html>
<head>
<title>Home</title>
<link href="../fashion/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="../fashion/js/jquery.min.js"></script>
<!-- Custom Theme files -->
<!--theme-style-->
<link href="../fashion/css/style.css" rel="stylesheet" type="text/css" media="all" />	
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Fashion Mania Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- start menu -->
<link href="../fashion/css/memenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="../fashion/js/memenu.js"></script>
<script>$(document).ready(function(){$(".memenu").memenu();});</script>
<script src="../fashion/js/simpleCart.min.js"> </script>
<!-- slide -->
<script src="../fashion/js/responsiveslides.min.js"></script>
   <script>
    $(function () {
      $("#slider").responsiveSlides({
      	auto: true,
      	speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });

    $(document).on("click",".in-drop",function(){
    	alert("想改成中文？请用谷歌浏览器点右键翻译成中文")
    })
  </script>

</head>
<body>
<!--header-->
<div class="header">
	<div class="header-top">
		<div class="container">
		<div class="col-sm-4 world">
					<ul >
						<li>
						<select class="in-drop">
							  <option>English</option>
							  <option>Japanese</option>
							  <option>French</option>
							</select></li>
						<li><select class="in-drop1">
							  <option>Dollar</option>
							  <option>Euro</option>
							  <option>Yen</option>
							</select>
						</li>
					</ul>
				</div>
				<div class="col-sm-4 logo">
					<a href="index"><img src="../fashion/images/logo.png" alt=""></a>	
				</div>
		
			<div class="col-sm-4 header-left">	
				<?php if(request()->cookie('user')) { ?>
					<p class="log">
						<a href="login/login"  ><?php echo request()->cookie('user'); ?></a>
					</p>
				<?php }else{ ?>	
					<p class="log"><a href="login/login"  >Login</a>
						<span>or</span><a  href="login/signup"  >Signup</a>
					</p>
				<?php } ?>
					<div class="cart box_1">
						<a href="checkout">
						<h3> <div class="total">
							<span class="simpleCart_total"></span></div>
							<img src="../fashion/images/cart.png" alt=""/></h3>
						</a>
						<p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>

					</div>
					<div class="clearfix"> </div>
			</div>
				<div class="clearfix"> </div>
		</div>
		</div>
		<div class="container">
			<div class="head-top">
				<div class="col-sm-2 number">
					<span><i class="glyphicon glyphicon-phone"></i>085 596 234</span>
				</div>
		 <div class="col-sm-8 h_menu4">
				<ul class="memenu skyblue">
					  <li class=" grid"><a  href="index">Home</a></li>	
				      <li><a  href="products">Men</a>
				      	<div class="mepanel">
						<div class="row">
							<div class="col1">
								<div class="h_nav">
									<ul>
										
									</ul>	
								</div>							
							</div>
						  </div>
						</div>
					</li>
				<li><a  href="typo.html">Blog</a></li>				
				<li><a class="color6" href="contact.html">Conact</a></li>
			  </ul> 
			</div>
				<div class="col-sm-2 search">
					<form action="seach" method="get">
						<input type="text" name="name">
						<input type="submit" value="搜搜">
					</form>		
				</div>
		<div class="clearfix"> </div>
			<!---pop-up-box---->
					  <script type="text/javascript" src="../fashion/js/modernizr.custom.min.js"></script>    
					<link href="../fashion/css/popuo-box.css" rel="stylesheet" type="text/css" media="all"/>
					<script src="../fashion/js/jquery.magnific-popup.js" type="text/javascript"></script>
					<!---//pop-up-box---->
				<div id="small-dialog" class="mfp-hide">
				<div class="search-top">
						<div class="login">
							<input type="submit" value="">
							<input type="text" value="Type something..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">		
						</div>
						<p>	Shopping</p>
					</div>				
				</div>
				 <script>
						$(document).ready(function() {
						$('.popup-with-zoom-anim').magnificPopup({
							type: 'inline',
							fixedContentPos: false,
							fixedBgPos: true,
							overflowY: 'auto',
							closeBtnInside: true,
							preloader: false,
							midClick: true,
							removalDelay: 300,
							mainClass: 'my-mfp-zoom-in'
						});
																						
						});

				</script>			
	<!---->		
		</div>
	</div>
</div>
<!--banner-->
<div class="banner">
	<div class="col-sm-3 banner-mat">
		<img class="img-responsive"	src="../fashion/images/ba1.jpg" alt="">
	</div>
	<div class="col-sm-6 matter-banner">
	 	<div class="slider">
	    	<div class="callbacks_container">
	      		<ul class="rslides" id="slider">
	      			<li>
	          			<img src="https://img1.360buyimg.com/da/s590x470_jfs/t1/11213/36/7306/87193/5c53b774E5f54628a/726f7530db185409.jpg!q90!cc_590x470.webp" alt="" style="height: 395px;">
	       			</li>
	       			<li>
	          			<img src="https://img1.360buyimg.com/da/s590x470_jfs/t1/6559/12/158/78212/5bacdb0dE006dbebf/f1bf4338b8f963c1.jpg!q90!cc_590x470.webp" alt="" style="height: 395px;">
	       			</li>
	       			<li>
	          			<img src="https://imgcps.jd.com/ling/4458191/5bq35biI5YKF5paw5ZOB5LiK5biC/5L2O6IezOOaKmA/t-5bd95aa3cc7bff03421326fa/5c667a9d.jpg" alt="" style="height: 395px;">
	       			</li>
	      		</ul>
	 	 	</div>
		</div>
	</div>
	<div class="col-sm-3 banner-mat">
		<img class="img-responsive" src="../fashion/images/ba.jpg" alt="">
	</div>
	<div class="clearfix"> </div>
</div>
<!--//banner-->
<!--content-->
<div class="content">
	<div class="container">
		<div class="content-top">
			<h1>Recent Products</h1>
			<div class="content-top1">
				<?php foreach ($res1 as $k=>$v): ?>
					<div class="col-md-3 col-md2">
						<div class="col-md1 simpleCart_shelfItem">
							<a href="single?id=<?php echo $v->id ?>">
								<img class="img-responsive" src="<?php echo $v->img; ?>" alt="" style="width: 185px; height: 207px;" />
							</a>
							<h3><a href="single?id=<?php echo $v->id ?>" class="name"><?php echo $v->name; ?></a></h3>
							<div class="price">
									<h5 class="item_price"><?php echo "$".$v->sell_price; ?></h5>
									<a href="checkout_add?id=<?php echo $v->id ?>" class="item_add">Add To Cart</a>
									<div class="clearfix"> </div>
							</div>
						</div>
					</div>	
				<?php endforeach ?>
			<div class="clearfix"> </div>
			</div>	
		</div>
	</div>
</div>
<!--//content-->
<!--footer-->
<div class="footer">
	<div class="container">
		<div class="footer-top">
			<div class="col-md-4 top-footer1">
				<h2>Newsletter</h2>
					<form>
						<input type="text" value="" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='';}">
						<input type="submit" value="SUBSCRIBE">
					</form>
			</div>
			<div class="clearfix"> </div>	
		</div>	
	</div>
	<div class="footer-bottom">
		<div class="container">
				<div class="col-sm-3 footer-bottom-cate">
					<h6>Categories</h6>
					<ul>
						<li><a href="#">Curabitur sapien</a></li>
						<li><a href="#">Dignissim purus</a></li>
						<li><a href="#">Tempus pretium</a></li>
						<li><a href="#">Dignissim neque</a></li>
						<li><a href="#">Ornared id aliquet</a></li>
						
					</ul>
				</div>
				<div class="col-sm-3 footer-bottom-cate">
					<h6>Feature Projects</h6>
					<ul>
						<li><a href="#">Curabitur sapien</a></li>
						<li><a href="#">Dignissim purus</a></li>
						<li><a href="#">Tempus pretium</a></li>
						<li><a href="#">Dignissim neque</a></li>
						<li><a href="#">Ornared id aliquet</a></li>
						
					</ul>
				</div>
				<div class="col-sm-3 footer-bottom-cate">
					<h6>Top Brands</h6>
					<ul>
						<li><a href="#">Curabitur sapien</a></li>
						<li><a href="#">Dignissim purus</a></li>
						<li><a href="#">Tempus pretium</a></li>
						<li><a href="#">Dignissim neque</a></li>
						<li><a href="#">Ornared id aliquet</a></li>
						<li><a href="#">Ultrices id du</a></li>
						<li><a href="#">Commodo sit</a></li>
						
					</ul>
				</div>
				<div class="col-sm-3 footer-bottom-cate cate-bottom">
					<h6>Our Address</h6>
					<ul>
						<li>Aliquam metus  dui. </li>
						<li>orci, ornareidquet</li>
						<li> ut,DUI.</li>
						<li>nisi, dignissim</li>
						<li>gravida at.</li>
						<li class="phone">PH : 6985792466</li>
					</ul>
				</div>
				<div class="clearfix"> </div>
				<p class="footer-class">Copyright &copy; 2015.Company name All rights reserved.</p>
			</div>
	</div>
</div>

<!--//footer-->
</body>
</html>