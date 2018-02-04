@extends('themes::mottestate.layouts.default')

@section('meta')
    <meta property="og:title" content="{{ $company->name }}" />
    <meta property="og:description" content="{{ substr($company->description, 0, 150) }}" />
    <meta property="og:image" content="{{ $company['avatar_url'] ?: getImgAvatar($company['email']) }}" />
    <meta property="og:image:width" content=600 />
	<meta property="og:image:height" content=400 />
@endsection

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

							@include('participant::partials.alert')

							{!! Form::open(['url' => route('company.sendMessage', $company['slug']), 'method' => 'POST', 'class' => 'agent-form-outer']) !!}
								<div class="inner-holder">
									{!! Form::text('name', null, ['placeholder' => 'Nama anda', 'required' => true]) !!}
								</div>
								<div class="inner-holder">
									{!! Form::text('phone', null, ['placeholder' => 'Nomor telefon anda', 'required' => true]) !!}
								</div>
								<div class="inner-holder">
									{!! Form::email('email', null, ['placeholder' => 'Alamat email anda', 'required' => true]) !!}
								</div>
								<div class="inner-holder">
									{!! Form::textarea('message', null, ['placeholder' => 'Tulis Pesan anda disini', 'required' => true, 'style' => 'height: 150px;']) !!}
								</div>
								<div class="inner-holder">
									<button class="btn-submit" type="submit">
										<i class="fa fa-send"></i>
										Send Message
									</button>
								</div>
							{!! Form::close() !!}
						</div><!--Widget Holder End-->
					</aside><!--Sidebar Outer End-->
				</div>

			</div>
		</div>
	</section>

	@endsection
