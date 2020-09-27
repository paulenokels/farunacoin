@extends('layouts.app')
@section('main')

		<!-- start intro -->
		<div id="intro" class="jarallax" data-speed="0.5" style="background-image: url(img/intro_img/1.jpg);">
			<div class="grid grid--container">
				<div class="row row--xs-middle">
					<div class="col col--lg-5 text--center">
						<h1 class="__title">Frequently Asked Questions</h1>
					</div>
				</div>
			</div>
		</div>
		<!-- end intro -->

		<!-- start main -->
		<main role="main">
			
			<!-- start section -->
			<section class="section">
				<div class="grid grid--container">
					<div class="section-heading section-heading--center  col-MB-60">
						<h2 class="__title">Popular Questions</h2>
					</div>

					<div class="row row--xs-middle">
						<div class="col col--md-10">
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
													When the coin reserve reaches $1 million (USD) Faruna coin becomes spendable by the general public
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
									<a class="custom-btn custom-btn--medium custom-btn--style-1" href="{{ url('register') }}">Join Now</a>
								</div>
							</div>
							<!-- end FAQ -->
						</div>
					</div>
				</div>
			</section>
			<!-- end section -->


		</main>
		<!-- end main -->
@endsection