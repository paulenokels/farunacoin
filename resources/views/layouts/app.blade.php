<!DOCTYPE html>
<html class="no-js" lang="en">

	
<!-- Mirrored from demo.artureanec.com/html/crypterium/index_2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 20 Sep 2020 18:18:52 GMT -->
<head>
		<title>Faruna Coin</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

		<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
		<meta name="viewport" content="user-scalable=no, width=device-width, height=device-height, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui" />

		<meta name="theme-color" content="#3F6EBF" />
		<meta name="msapplication-navbutton-color" content="#3F6EBF" />
		<meta name="apple-mobile-web-app-status-bar-style" content="#3F6EBF" />

		<!-- Favicons
		================================================== -->
		<link rel="shortcut icon" href="img/favicon.html">
		<link rel="apple-touch-icon" href="img/apple-touch-icon.html">
		<link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.html">
		<link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.html">

		<!-- CSS
		================================================== -->
		<link rel="stylesheet" href="{{ asset('css/style.min.css') }}" type="text/css">

		<!-- Load google font
		================================================== -->
		<script type="text/javascript">
			WebFontConfig = {
				google: { families: [ 'Open+Sans:300,400,500','Lato:900', 'Poppins:400', 'Catamaran:300,400,500,600,700'] }
			};
			(function() {
				var wf = document.createElement('script');
				wf.src = ('https:' == document.location.protocol ? 'https' : 'http') + 
				'://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js';
				wf.type = 'text/javascript';
				wf.async = 'true';
				var s = document.getElementsByTagName('script')[0];
				s.parentNode.insertBefore(wf, s);
			})();
		</script>

		<!-- Load other scripts
		================================================== -->
		<script type="text/javascript">
			var _html = document.documentElement,
				isTouch = (('ontouchstart' in _html) || (navigator.msMaxTouchPoints > 0) || (navigator.maxTouchPoints));

			_html.className = _html.className.replace("no-js","js");

			isTouch ? _html.classList.add("touch") : _html.classList.add("no-touch");
		</script>
		<script type="text/javascript" src="js/device.min.js"></script>
	</head>

	<body>
		<!-- start header -->
		<header id="top-bar" class="top-bar--light">
			<div id="top-bar__inner">
				<a id="top-bar__logo" class="site-logo" href="/">
					<img class="img-responsive" width="175" height="42" src="img/site_logo.png" alt="Faruna Coin" />
					<img class="img-responsive" width="175" height="42" src="img/site_logo_2.png" alt="Faruna Coin" />
				</a>

				<a id="top-bar__navigation-toggler" href="javascript:void(0);"><span></span></a>

				<div id="top-bar__navigation-wrap">
					<div>
						<nav id="top-bar__navigation" class="navigation" role="navigation">
							<ul>
								
								<li>
									<a href="{{ url('/') }}"><span>Home</span></a>
								</li>
								<li>
									<a href="{{ url('about') }}" target="_blank"><span>About Faruna Coin</span></a>
								</li>

								<li>
									<a href="{{ url('faq') }}"><span>FAQ’s</span></a>
								</li>

								<li>
									<a href="{{ url('support') }}"><span>Support</span></a>
								</li>
							</ul>
						</nav>

						<br class="hide--lg">

						<ul id="top-bar__subnavigation">
						@if(Auth::user())
						<li><a class="custom-btn custom-btn--small custom-btn--style-3" href="{{ url('dash') }}">My Account</a></li>
						@else
							<li><a class="custom-btn custom-btn--small custom-btn--style-3" href="{{ route('login') }}">Login</a></li>
							<li><a href="{{ route('register') }}">Sign up</a></li>
						@endif
						</ul>
					</div>
				</div>
			</div>
		</header>
		<!-- end header -->

	

		<!-- start main -->
        @yield('main')
		<!-- end main -->

		<!-- start footer -->
		<footer id="footer" class="text--center text--lg-left">
			<div class="grid grid--container">
				<div class="row">
					<div class="col col--xs-12">
						<div class="__item">
							<a class="site-logo" href="index.html">
								<img class="img-responsive lazy" width="175" height="42" src="img/blank.gif" data-src="img/site_logo.png" alt="demo" />
							</a>
						</div>
					</div>
				</div>

				<div class="row row--xs-middle">
					<div class="col col--sm-10 col--md-8 col--lg-5">
						<div class="__item">
							<address class="__text">
								<br>
							<a href="tel:+2348134086523">234 813 408 6523</a> <br>
								<a href="mailto:support@farunacoin.com">support@farunacoin.com</a>
							</address>

							<div class="social-btns">
								<a class="fontello-twitter" href="#"></a>
								<a class="fontello-facebook" href="#"></a>
								<a class="fontello-linkedin-squared" href="#"></a>
							</div>
						</div>
					</div>

					<div class="col col--sm-10 col--md-8 col--lg-7">
						<div class="__item">
							<nav id="footer__navigation" class="navigation">
								<div class="row row--xs-middle">
									<div class="col col--xs-auto col--md-3 col--lg-4">
										<ul class="__menu">
											<li><a href="/">Home</a></li>
											<li><a href="{{ url('dash') }}">Dashboard</a></li>
											<li><a href="{{ url('register') }}">Register</a></li>
											<li><a href="{{ url('login') }}">Login</a></li>

										</ul>
									</div>

									<div class="col col--xs-auto col--md-3 col--lg-4">
										<ul class="__menu">
											<li><a href="{{ url('dash/coin/purchase') }}">Purchase coins</a></li>
											<li><a href="{{ url('dash/data/purchase') }}">Purchase Data</a></li>

											<li><a href="{{ url('faq') }}">FAQ’s</a></li>
											<li><a href="{{ url('support') }}">Support</a></li>
										</ul>
									</div>

									<div class="col hide--md col-MB-20"></div>

									
								</div>
							</nav>
						</div>
					</div>
				</div>

				<div class="row row--xs-middle row--lg-between">
					<div class="col col--sm-10 col--md-8 col--lg-6">
						<div class="__item">
							<span class="__copy">© 2020, Site by <a class="__dev" href="http://fb.com/paulenokels" target="_blank">paulenokels</a></span>
						</div>
					</div>

					<div class="col col--sm-10 col--md-8 col--lg-6  text--lg-right">
						<div class="__item">
							<span class="__copy"><a href="#">Privacy Policy</a> | <a href="#">Sitemap</a></span>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- end footer -->

		<div id="btn-to-top-wrap">
			<a id="btn-to-top" class="circled" href="javascript:void(0);" data-visible-offset="800"></a>
		</div>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/jquery-2.2.4.min.js"><\/script>')</script>

		<script type="text/javascript" src="js/main.min.js"></script>
		<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
		<script>
			(function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
			function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
			e=o.createElement(i);r=o.getElementsByTagName(i)[0];
			e.src='https://www.google-analytics.com/analytics.js';
			r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
			ga('create','UA-XXXXX-X','auto');ga('send','pageview');
		</script>
	</body>

<!-- Mirrored from demo.artureanec.com/html/crypterium/index_2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 20 Sep 2020 18:18:59 GMT -->
</html>