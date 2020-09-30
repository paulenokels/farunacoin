@extends('layouts.app')
@section('main')
	<!-- start start screen -->
	<div id="start-screen" class="start-screen--light start-screen--style-2">
			<div class="start-screen__static-bg jarallax" data-speed="0.3" style="background-image: url(img/bg_3.jpg);">

				<div class="start-screen__content">
					<div class="start-screen__content__inner">
						<div class="grid grid--container">
							<div class="row row--xs-center">
								<div class="col col--md-7">
									<h1 class="__title">Faruna Coin</h1>

									<div class="row">
										<div class="col col--lg-11 col--xl-9">
											<div class="col-MB-25">
											Faruna Coin is a digital asset that grows in value by the number of reserve and can be spendable and exchanged for cash. Faruna coin has a great future were members or non-members can buy cheaper data and pay bills such as NEPA bills, Gotv, Dstv and StarTime subscriptions.
											</div>

											<div class="row row--xs-center">
												<!-- <div class="col col--xs-auto">
													<a class="custom-btn custom-btn--medium custom-btn--style-2" style="margin-top: 20px;" href="white_pappers.pdf" target="_blank">Get White Papper</a>
												</div> -->

												<div class="col col--xs-auto">
													<a class="btn-play" href="#" style="margin-top: 20px;"><i></i>Video Presentation</a>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="col hide--md col-MB-40"></div>

								<div class="col col--md-5 col--xl-4 col--xl-offset-1">
									<div class="sales">
										<h3 class="__title">Purchase Coins</h3>

										<p>1 coin = 1 USD (N380) </p>

										<div class='countdown js-countdown' data-date="2020-05-12"></div>

										<!-- start progress -->
										<div class="progress progress--small">
											<div class="progress__inner">
												<div class="__bar __bar--animate" style="width: 2%"></div>

												<span class="__label" style="left: 2%"><strong>$20</strong></span>

												<span class="__max-val" style="line-height: 19px;"><strong>50K MIN</strong></span>
											</div>

											<span class="soft-cap">SOFT CAP</span>

											<span class="note fl-r" style="padding-top: 8px">Total raised: $20</span>
										</div>
										<!-- end progress -->

										<p class="note">Fixed exchange rate</p>

										<p>
											<a class="custom-btn custom-btn--style-5 wide buy-btn" href="{{ url('dash/coin/purchase') }}">Buy Tokens</a>
										</p>

										<img class="img-responsive" src="img/Payement.png" alt="demo" />
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

			<span class="scroll-discover hide show--md">scroll down <b></b></span>

		</div>
		<!-- end start screen -->
<main role="main">
			<!-- start section -->
			<section class="section section--no-pt section--no-pb">
				<div class="grid">
					<div class="row">
						<!-- edit this widget

							https://www.cryptocompare.com/dev/widget/wizard/?type=12&theme=1&custom=%257B%2522General%2522%253A%257B%2522background%2522%253A%2522%2523000%2522%252C%2522priceText%2522%253A%2522%2523fff%2522%252C%2522enableMarquee%2522%253Atrue%257D%252C%2522Currency%2522%253A%257B%2522color%2522%253A%2522%2523fff%2522%257D%257D&fsyms=BTC,ETH,XMR&tsyms=CNY,GOLD,KRW,USD,EUR
						-->

						<script type="text/javascript">
							baseUrl = "https://widgets.cryptocompare.com/";
							var scripts = document.getElementsByTagName("script");
							var embedder = scripts[scripts.length - 1];
							var cccTheme = {
									"General": {
										"background": "#2a2d3c",
										"priceText": "#fff",
										"enableMarquee": true
									},
									"Currency": {
										"color": "#fff"
									}
							};
							(function() {
								var appName = encodeURIComponent(window.location.hostname);
								if (appName == "") {
									appName = "local";
								}
								var s = document.createElement("script");
								s.type = "text/javascript";
								s.async = true;
								var theUrl = baseUrl + 'serve/v3/coin/header?fsyms=BTC,ETH,XMR&tsyms=CNY,GOLD,KRW,USD,EUR';
								s.src = theUrl + (theUrl.indexOf("?") >= 0 ? "&" : "?") + "app=" + appName;
								embedder.parentNode.appendChild(s);
							})();
						</script>

						<style type="text/css">#marquee-inner { padding: 30px 0; }</style>
					</div>
				</div>
			</section>
			<!-- end section -->

			<!-- start section -->
			<section class="section">
				<div class="grid grid--container">
					<div data-aos="fade-up" data-aos-offset="100">
						<div class="section-heading section-heading--center  col-MB-60">
							<h5 class="__subtitle">Our mission</h5>

							<h2 class="__title">A global digital coin that Works for You!</h2>
						</div>

						<div class="row row--xs-middle">
							<div class="col col--lg-8">
								<p class="text--center">
									<img class="lazy" src="img/blank.gif" data-src="img/ico/ico_logo.png" width="43" height="48" alt="demo" />
								</p>

							</div>
						</div>
					</div>

					<!-- start video -->
					<div class="video-container" data-aos="fade-up">
						<img class="img-responsive center-block lazy" src="img/blank.gif" data-src="img/video_bg.png" alt="demo" />

						<div class="__video" style="max-width: 770px;">
							<div class="__wrp">
								<div class="embed-responsive">
									<div class="__bg embed-responsive-item lazy" data-src="img/faruna_marvelous.jpeg">
										<div class="__btn_wrp">
											<a class="__play-btn  circled" data-fancybox href="https://youtu.be/4p5aFCwvTzI"></a>

											<span class="__desc">Video Presentation</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- end video -->
				</div>
			</section>
			<!-- end section -->

			<!-- start section -->
			<section class="section jarallax" data-speed="0.5">
				<img class="jarallax-img" src="img/bg_6.jpg" alt="demo" />

				<div class="grid grid--container">
					<div class="section-heading section-heading--center section-heading--white  col-MB-60">
						<h5 class="__subtitle">Our special way</h5>

						<h2 class="__title">Faruna coin Road Map</h2>
					</div>

					<!-- start timeline -->
					<div class="timeline timeline--style-1 timeline--light-color">
						<div class="row row--xs-middle row--no-gutters">
							<div class="col col--xs-10">
								<div class="row row--xs-middle row--xs-center row--no-gutters" style="min-width: 750px;">
									<div class="__item __item--active">
										<i class="__point"></i>

										<span class="__text __text--first">August 2020</span>
										<h5 class="__text __text--second"> Coin<br>Release</h5>
									</div>

									<span class="__line __line--active"></span>

									<div class="__item __item--active">
										<i class="__point"></i>

										<span class="__text __text--first">September 2020</span>
										<h5 class="__text __text--second">Mining Activity</h5>
									</div>

									<span class="__line __line--active"></span>

									<div class="__item __item--active">
										<i class="__point"></i>

										<span class="__text __text--first">September 2020</span>
										<h5 class="__text __text--second">Data<br>Purchase</h5>
									</div>

									

									<span class="__line"></span>

									<div class="__item">
										<i class="__point"></i>

										<span class="__text __text--first">$50,000</span>
										<h5 class="__text __text--second">Coin spendable <br>by Miners</h5>
									</div>

									<span class="__line"></span>

									<div class="__item">
										<i class="__point"></i>

										<span class="__text __text--first">$1 Million</span>
										<h5 class="__text __text--second">Public<br>Exchange</h5>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- end timeline -->
				</div>
			</section>
			<!-- end section -->

			<!-- start section -->
			<section class="section">
				<div class="grid grid--container">
					<div class="section-heading section-heading--center  col-MB-60">
						<h5 class="__subtitle">MINING OPPORTUNITY</h5>

						<h2 class="__title">Enjoy the benefits of being a Miner!</h2>
					</div>

					<!-- start feature -->
					<div class="feature feature--style-2  text--center">
						<div class="__inner">
							<div class="row">
								<!-- start item -->
								<div class="col col--lg-4">
									<div class="__item" data-aos="zoom-in" data-aos-delay="100">
										<div class="__content">
											<i class="__ico">
												<img class="img-responsive lazy" src="img/blank.gif" data-src="img/feature_img/1_1.png" width="34" height="60" alt="demo" />
											</i>

											<h3 class="__title">Daily Coin Bonus</h3>

											<p>Receiver FAC daily for 90 days.</p>
										</div>
									</div>
								</div>
								<!-- end item -->

								<!-- start item -->
								<div class="col col--lg-4">
									<div class="__item" data-aos="zoom-in" data-aos-delay="200">
										<div class="__content">
											<i class="__ico">
												<img class="img-responsive lazy" src="img/blank.gif" data-src="img/feature_img/2_1.png" width="46" height="60px" alt="demo" />
											</i>

											<h3 class="__title">First-to-cash-out</h3>

											<p>After the reserve gets to $50,000, Miners will be the first to start cashing out</p>
										</div>
									</div>
								</div>
								<!-- end item -->

								<!-- start item -->
								<div class="col col--lg-4">
									<div class="__item" data-aos="zoom-in" data-aos-delay="300">
										<div class="__content">
											<i class="__ico">
												<img class="img-responsive lazy" src="img/blank.gif" data-src="img/feature_img/3_1.png" width="46" height="60" alt="demo" />
											</i>

											<h3 class="__title">Shopping</h3>

											<p>Be the first to start shopping with Faruna coin once the reserve reaches the soft cap of $50,000.</p>
										</div>
									</div>
								</div>
								<!-- end item -->
							</div>
						</div>
					</div>
					<!-- end feature -->
				</div>
			</section>
			<!-- end section -->

			<!-- start section -->
			<section class="section section--no-pb section--light-blue-bg section--custom-03">
				<style type="text/css">
					.section--custom-03
					{
						background-image: url(img/sectoin_bg_1.png);
						background-position: right 20% bottom;
						background-repeat: no-repeat;
					}
				</style>

				<div class="grid">
					<div class="row row--lg-reverse row--md-center">
						<div class="col col--lg-5 col--lg-offset-1">
							<div class="content-grid" style="margin-right: auto;max-width: 470px;">
								<div data-aos="fade-up">
									<div class="section-heading  col-MB-30">
										<h5 class="__subtitle">FAC Dashboard</h5>

										<h2 class="__title">Manage your tokens and services in one place</h2>
									</div>

									<p class="col-MB-35">
										Pay bills, buy airtime, send and receive FAC all from one place
									</p>

									<p>
										<a class="custom-btn custom-btn--medium custom-btn--style-2" href="{{ url('dash') }}">Take me there</a>
									</p>
								</div>
							</div>
						</div>

						<div class="col hide--lg col-MB-40"></div>

						<div class="col col--lg-6 col--no-gutters">
							<img class="img-responsive" src="img/wallet.png" alt="demo" />
						</div>
					</div>
				</div>
			</section>
			<!-- end section -->

		

			
			<!-- start section -->
			<section class="section">
				<div class="grid grid--container">
					<div class="section-heading section-heading--center  col-MB-60">

						<h2 class="__title">Coin information</h2>
					</div>

					<div class="row row--md-between">
						<div class="col col--md-5 col--lg-4">
							<div class="list-with-ico">
								<!-- start item -->
								<div class="list__item" data-aos="fade-right" data-aos-offset="50">
									<div class="b-table">
										<div class="cell v-middle">
											<i class="ico fontello-avatar"></i>
										</div>

										<div class="cell v-middle">
											<h5>Name: Faruna Coin (FAC)</h5>
										</div>
									</div>
								</div>
								<!-- end item -->

								<!-- start item -->
								<div class="list__item" data-aos="fade-right" data-aos-offset="50">
									<div class="b-table">
										<div class="cell v-middle">
											<i class="ico fontello-layer"></i>
										</div>

										<div class="cell v-middle">
											<h5>Platform : ERC55</h5>
										</div>
									</div>
								</div>
								<!-- end item -->

								<!-- start item -->
								<div class="list__item" data-aos="fade-right" data-aos-offset="50">
									<div class="b-table">
										<div class="cell v-middle">
											<i class="ico fontello-settings"></i>
										</div>

										<div class="cell v-middle">
											<h5>Role : Digital e-commerce token</h5>
										</div>
									</div>
								</div>
								<!-- end item -->

								

								<!-- start item -->
								<div class="list__item" data-aos="fade-right" data-aos-offset="50">
									<div class="b-table">
										<div class="cell v-middle">
											<i class="ico fontello-attachment"></i>
										</div>

										<div class="cell v-middle">
											<h5>FAC Reserve : $20 USD</h5>
										</div>
									</div>
								</div>
								<!-- end item -->

								<!-- start item -->
								<div class="list__item" data-aos="fade-right" data-aos-offset="50">
									<div class="b-table">
										<div class="cell v-middle">
											<i class="ico fontello-tag"></i>
										</div>

										<div class="cell v-middle">
											<h5>Coin price : 1 USD / 380 NGN</h5>
										</div>
									</div>
								</div>
								<!-- end item -->
							</div>
						</div>

						<div class="col hide--md col-MB-40"></div>

						<div class="col col--md-7">
							<div data-aos="fade-up">
								<h3>We truly believe in the "tokenization" of the economy, that is why we created a token to use our service.</h3>

								<p>
									Once the reserve grows to one million dollars($1,000,000), then Faruna coin becomes spendable generally by the public.
								</p>

								<p>
									<a class="custom-btn custom-btn--medium custom-btn--style-1" href="{{ url('dash/coin/purchase') }}">Buy tokens</a>
								</p>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- end section -->

			

			<!-- start section -->
			<section class="section">
				<div class="grid grid--container">
					<div class="section-heading section-heading--center  col-MB-60">
						<h5 class="__subtitle">FAQ</h5>

						<h2 class="__title">Have any questions?</h2>
					</div>

					<div class="row row--xs-middle">
						<div class="col col--lg-10">
							<!-- start FAQ -->
							<div class="faq">
								<div class="accordion-container">
									<!-- start item -->
									<div class="accordion-item">
										<div class="accordion-toggler">
											<h4 class="__title h5">Can I mine Faruna Coin?</h4>

											<i class="circled"></i>
										</div>

										<article>
											<div class="__inner">
												<p>
													Yes you can. Mining Faruna coin is easy, you just need to purchase a mining licence and you will be credited with 0.3 FAC daily.
												</p>
											</div>
										</article>
									</div>
									<!-- end item -->

									<!-- start item -->
									<div class="accordion-item">
										<div class="accordion-toggler">
											<h4 class="__title h5">How many mining licences can I purchase?</h4>

											<i class="circled"></i>
										</div>

										<article>
											<div class="__inner">
												<p>
													There is no limit to the number of mining licences you can purchase.
												</p>

											
											</div>
										</article>
									</div>
									<!-- end item -->

									<!-- start item -->
									<div class="accordion-item">
										<div class="accordion-toggler">
											<h4 class="__title h5">Can I trade FAC at an exchange?</h4>

											<i class="circled"></i>
										</div>

										<article>
											<div class="__inner">
												<p>
													When the coin reserve reaches $1 million (USD), Faruna coin becomes spendable by the general public
												</p>

											
											</div>
										</article>
									</div>
									<!-- end item -->

									<!-- start item -->
									<div class="accordion-item">
										<div class="accordion-toggler">
											<h4 class="__title h5">What is the difference between Faruna Coin and other coins?</h4>

											<i class="circled"></i>
										</div>

										<article>
											<div class="__inner">
												<p>
													Faruna coin is an e-commerce coin which can be used to shop, pay bills, buy airtime and data
												</p>

											
											</div>
										</article>
									</div>
									<!-- end item -->

								

									<!-- start item -->
									<div class="accordion-item">
										<div class="accordion-toggler">
											<h4 class="__title h5">Can foreigners take part in the crowdsale?</h4>

											<i class="circled"></i>
										</div>

										<article>
											<div class="__inner">
												<p>
													Yes. Anyone can take part in the crowdsale
												</p>

											
											</div>
										</article>
									</div>
									<!-- end item -->
								</div>

								<div class="text--center">
									<a class="custom-btn custom-btn--medium custom-btn--style-1" href="{{ url('faq') }}">Show more</a>
								</div>
							</div>
							<!-- end FAQ -->
						</div>
					</div>
				</div>
			</section>
			<!-- end section -->

		
		
		
		

			<!-- start section 
			<section class="section jarallax" data-speed="0.5">
				<img class="jarallax-img" src="img/bg_.jpg" alt="demo" />

				<div class="pattern" style="background-color: rgba(0, 0, 0, 0.53);"></div>

				<div class="grid grid--container">
					<div class="section-heading section-heading--center section-heading--white  col-MB-60">
						<h2 class="__title">Subscribe Newsletter</h2>
					</div>

					<div class="center-block" style="max-width: 510px">
						<form class="form--horizontal" action="#">
							<div class="b-table">
								<div class="cell v-middle">
									<div class="input-wrp">
										<input class="textfield" type="text" value="" placeholder="E-mail" />
									</div>
								</div>

								<div class="cell v-middle">
									<button class="custom-btn custom-btn--medium custom-btn--style-2" type="submit" role="button">Subscribe</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</section>
			<!-- end section -->
		</main>
@endsection