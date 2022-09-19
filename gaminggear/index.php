<?php
session_start();
include("include/connect.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<html xmlns:fb="http://ogp.me/ns/fb#">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title> HuyVy Store </title>
	<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
	<link rel="stylesheet" style="style/sheet" href="css/index.css">



	<link rel="stylesheet" style="style/sheet" href="slide/engine/style.css">
	<script type="text/javascript" src="slide/engine/wowslider.js"></script>
	<script type="text/javascript" src="slide/engine/wowslider.mod.js"></script>




	<script>
		(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s);
			js.id = id;
			js.src = "//connect.facebook.net/vi_VN/all.js#xfbml=1";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>


	<!-------------------------------------Slide tài trợ-------------------------------------->

	<script src="js/newsScrollerDefault-rightToleft-bottomTotop.js" type="text/javascript"></script>
	<script src="js/newsScrollerEdit-leftToright-topTobottom.js" type="text/javascript"></script>


	<!-------------------------------------zoom anh-------------------------------->
	<script type="text/javascript" src="js/zoom/cloud-zoom.1.0.2.js"></script>
	<link href="css/cloud-zoom.css" rel="stylesheet" type="text/css" />



	<!-------------------------------------Tabs-------------------------------->
	<script>
		// Wait until the DOM has loaded before querying the document

		$(document).ready(function() {

			$('ul.tabs').each(function() {

				// For each set of tabs, we want to keep track of

				// which tab is active and it's associated content

				var $active, $content, $links = $(this).find('a');

				// If the location.hash matches one of the links, use that as the active tab.

				// If no match is found, use the first link as the initial active tab.

				$active = $($links.filter('[href="' + location.hash + '"]')[0] || $links[0]);

				$active.addClass('active');

				$content = $($active.attr('href'));

				// Hide the remaining content

				$links.not($active).each(function() {

					$($(this).attr('href')).hide();

				});

				// Bind the click event handler

				$(this).on('click', 'a', function(e) {

					// Make the old tab inactive.

					$active.removeClass('active');

					$content.hide();

					// Update the variables with the new link and content

					$active = $(this);

					$content = $($(this).attr('href'));

					// Make the tab active.

					$active.addClass('active');

					$content.show();

					// Prevent the anchor's default click action

					e.preventDefault();

				});

			});

		});
	</script>

	<!-------------------------------------slide-------------------------------->
	<link rel="stylesheet" style="style/sheet" href="css/style1.css">
	<script language="javascript" type="text/javascript" src="js/jquery.easing.js"></script>
	<script language="javascript" type="text/javascript" src="js/script.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			var buttons = {
				previous: $('#lofslidecontent45 .lof-previous'),
				next: $('#lofslidecontent45 .lof-next')
			};

			$obj = $('#lofslidecontent45').lofJSidernews({
				interval: 4000,
				direction: 'opacitys',
				easing: 'easeInOutExpo',
				duration: 2000,
				auto: true,
				maxItemDisplay: 4,
				navPosition: 'horizontal', // horizontal
				navigatorHeight: 32,
				navigatorWidth: 80,
				mainWidth: 1000,
				buttons: buttons
			});
		});
	</script>
	<!-- Messenger Plugin chat Code -->
	<div id="fb-root"></div>

	<!-- Your Plugin chat code -->
	<div id="fb-customer-chat" class="fb-customerchat">
	</div>

	<script>
		var chatbox = document.getElementById('fb-customer-chat');
		chatbox.setAttribute("page_id", "106049235277334");
		chatbox.setAttribute("attribution", "biz_inbox");
	</script>

	<!-- Your SDK code -->
	<script>
		window.fbAsyncInit = function() {
			FB.init({
				xfbml: true,
				version: 'v13.0'
			});
		};

		(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s);
			js.id = id;
			js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>
</head>

<body>
	<div id="wapper">
		<div id="header">
			<div id="lg-header">
				<h1><a href="index.php">logo</a></h1>
			</div>
			<!-- End .bg-lg-header -->
			<div id="bg-header">
			</div><!-- End .bg-header -->
			<div id="menu-header">
				<?php include("home_include/menu_ngang.php"); ?>
				<!-- End .menu -->
			</div><!-- End .menu-header -->
		</div><!-- End .header -->
		<div id="content">
			<div id="lofslidecontent45" class="lof-slidecontent" style="width:1000px; height:350px;">
				<div class="preload">
					<div></div>
				</div>
				<div id="lof-main-outer">
					<ul class="lof-main-wapper">
						<li><img src="img/slide/b.png" width="1000" height="350"></li>
						<li><img src="img/slide/a.png" width="1000" height="350"></li>
						<li><img src="img/slide/c.png" width="1000" height="350"></li>
						<li><img src="img/slide/d.png" width="1000" height="350"></li>
						<li><img src="img/slide/e.png" width="1000" height="350"></li>
					</ul>
				</div>
				<div class="lof-navigator-wapper">

					<div onClick="return false" href="" class="lof-next">Next</div>
					<div class="lof-navigator-outer">
						<ul class="lof-navigator">
							<li><img src="img/slide/b.png" width="70" height="25" /></li>
							<li><img src="img/slide/a.png" width="70" height="25" /></li>
							<li><img src="img/slide/c.png" width="70" height="25" /></li>
							<li><img src="img/slide/d.png" width="70" height="25" /></li>
							<li><img src="img/slide/e.png" width="70" height="25" /></li>
						</ul>
					</div>
					<div onClick="return false" href="" class="lof-previous">Previous</div>
				</div>
			</div>
			<div id="main-content">
				<div id="left-content">
					<?php include("home_include/left_content.php"); ?>
				</div><!-- End .left-content -->

				<div id="center-content">

					<?php include("content_page.php"); ?>
					<!-------------------------------------------------------------------------------------------------------------------->


				</div><!-- End .center-content -->

				<div id="right-content">
					<?php include("home_include/right_content.php"); ?>
				</div><!-- End .right-content-->
			</div><!-- End .main-content -->
			<div id="doitac">
				<div id="center2">
					<div id="doitaccon">
						<h4>ĐỐI TÁC</h4>
						<div id="thanhdoc">
							<img src="img/thanhdoc.png">
						</div>
						<div class="boxeSlide" style="overflow:hidden;">
							<div class="sildeShow">
								<ul id="random">
									<li>
										<a href="#"><img src="img/razer.png" alt="Razer" title="Razer" /></a>
									</li>
									<li>
										<a href="#"><img src="img/pls.png" alt="Sony PlayStation" title="Sony PlayStation" /></a>
									</li>
									<li>
										<a href="#"><img src="img/xbox.png" alt="Microsoft Xbox" title="Microsoft Xbox" /></a>
									</li>
									<li>
										<a href="#"><img src="img/nintendo.png" alt="Nintendo" title="Nintendo" /></a>
									</li>
								</ul>
							</div>
							<!--End .sildeShow-->
						</div>
						<!--End .boxeSlide-->
					</div><!-- End .doitaccon -->
				</div><!-- End .center2 -->
			</div><!-- End .bottom-content -->
		</div><!-- End .content -->
		<div id="footer">
			<div id="menu-footer">
				<ul>
					<li><a href="index.php">TRANG CHỦ</a></li>
					<li><a href="index.php?content=gioithieu">GIỚI THIỆU</a></li>
					<li><a href="index.php?content=sanpham">SẢN PHẨM</a>
					<li><a href="index.php?content=phukien">GAMEMING GEAR</a></li>
					<li><a href="index.php?content=tintuc">TIN TỨC</a></li>
					<li><a href="index.php?content=hotro">HỖ TRỢ</a></li>
				</ul>
			</div><!-- End .menu-footer -->
			<div id="bg-footer">
				<div id="noidungfooter">
					<div id="lg-footer">
						<h3><a href="index.php">logo</a></h3>
					</div><!-- End .lg-footer -->
					<div id="noidung">
						<ul>
							<li><span id="tencongty">Công Ty TNHH HuyVyStore</span></li> <br>

							<li>Địa chỉ: Quận 3 - Hồ Chí Minh </li>
							<li>Điện thoại: 0917485774 - Hotline: 0918467885</li>
							<li>Email: huyhhuy@hotmail.com</li>
						</ul>
					</div><!-- End .noidung -->
					<div id="thanhngang">
						<img src="img/thanhngang-footer.png">
					</div><!-- End .thanhngang -->
					<div id="copyright">
					</div><!-- End .copyright -->
				</div><!-- End .noidungfooter -->
			</div><!-- End .bg-footer -->
		</div><!-- End .footer -->
	</div><!-- End .wapper -->
</body>

</html>