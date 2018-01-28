@extends('themes::mottestate.layouts.default')

@section('content')

	<section class="tl-team-section pd-tb-80">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="tl-team-item tl-team-list-item">
						<div class="row">
							<div class="col-md-4 col-sm-12 col-xs-12">
								<figure class="tl-thumb">
									<img src="{{ $company['avatar_url'] ?: getImgAvatar($company['email']) }}" alt="{{ $company['name'] }}" alt="{{ $company['name'] }}">
								</figure>
							</div>
							<div class="col-md-8 col-sm-12 col-xs-12">
								<div class="tl-text-holder">
									<h3>{{ $company['name'] }}</h3>
									<span class="desination">{{ $company['domicile'] }}</span>
									<ul class="ft-listed">
										@if (!empty($company['phone']))
											<li>
												<i aria-hidden="true" class="fa fa-phone"></i>
												<a href="tel:1234533">{{ $company['phone'] }}</a>
											</li>
										@endif

										@if (!empty($company['phone_2']))
											<li>
												<i aria-hidden="true" class="fa fa-phone"></i>
												<a href="tel:1234533">{{ $company['phone_2'] }}</a>
											</li>
										@endif

										<li>
											<i aria-hidden="true" class="fa fa-envelope-o"></i>
											<a href="mailto:david@realestate.com">{{ $company['email'] }}</a>
										</li>
									</ul>
									<p>{{ $company['address'] }}</p>
								</div>
							</div>
						</div>
					</div>

					<div class="tl-team-info-holder">
						<h3>About</h3>
						{!! nl2br($company['description']) !!}
					</div>

					@if (count($company['services']) > 0)
					<div class="tl-listing-outer">
						<h3>Layanan</h3>

						@foreach ($company['services'] as $serv)
						<div class="tl-properties-item tl-properties-list-item">
							<div class="row">
								<div class="col-md-5 col-sm-12 col-xs-12">
									<figure class="tl-properties-thumb">
										<img src="{{ $serv['image_url'] ?: 'http://via.placeholder.com/290x260' }}" alt="{{ $serv['name'] }}">
									</figure>
								</div>
								<div class="col-md-7 col-sm-12 col-xs-12">
									<!--Text Holder Start-->
									<div class="tl-text-holder">
										<h3 class="price">{{ $serv['name'] }}</h3>
										<div style="padding:0px 20px 20px 0px;">{!! nl2br($serv['content']) !!}</div>
									</div><!--Text Holder End-->
								</div>
							</div>
						</div> <!-- end item services -->
						@endforeach
					</div>
					@endif
				</div>

				<div class="col-md-4 col-sm-4 col-xs-12">
					<!--Sidebar Outer Start-->
					<aside class="tl-sidebar-outer">
						<!--Widget Start-->
						<div class="widget widget-agent">
							<h3>Contact {{ $company['name'] }}</h3>
							<form method="get" class="agent-form-outer" onsubmit="alert('Kami sedang membangun Fitur ini'); return false;">
								<div class="inner-holder">
									<input type="text" placeholder="Your Name">
								</div>
								<div class="inner-holder">
									<input type="tel" placeholder="Phone">
								</div>
								<div class="inner-holder">
									<input type="email" placeholder="Email">
								</div>
								<div class="inner-holder">
									<textarea name="Message" placeholder="Message"></textarea>
								</div>
								<div class="inner-holder">
									<button class="btn-submit" type="submit">Contact Agent</button>
								</div>
							</form>
						</div><!--Widget Holder End-->
					</aside><!--Sidebar Outer End-->
				</div>

			</div>
		</div>
	</section>

	@endsection
