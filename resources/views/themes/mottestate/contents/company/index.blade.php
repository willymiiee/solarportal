@extends('themes::mottestate.layouts.default')

@section('content')

	<section class="tl-team-section pd-tb-80">
		<div class="container">
			<div class="tl-team-inner-holder">
				@forelse ($companies as $comp)
					<div class="tl-team-item tl-team-list-item">
						<div class="row">
							<div class="col-md-2 col-sm-6 col-xs-12">
								<figure class="tl-thumb">
									<img src="{{ asset('img/male.png') }}" alt="">
								</figure>
							</div>
							<div class="col-md-4 col-sm-6 col-xs-12">
								<div class="tl-text-holder">
									<h3><a href="{{ route('company.show', $comp['slug']) }}">{{ $comp['name'] }}</a></h3>
									<span class="desination">{{ $comp['domicile'] }}</span>
									<ul class="ft-listed">
										<li>
											<i aria-hidden="true" class="fa fa-phone"></i>
											<a href="tel:1234533">{{ $comp['phone'] }}</a>
										</li>
										<li>
											<i aria-hidden="true" class="fa fa-envelope-o"></i>
											<a href="mailto:david@realestate.com">{{ $comp['email'] }}</a>
										</li>
									</ul>
									<p>{{ $comp['address'] }}</p>
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<!--Team Services Item Start-->
								<div class="tl-team-services-info">
									<strong>About</strong>
									{{ $comp['description'] }}
									<a href="{{ route('company.show', $comp['slug']) }}" class="btn-more">
										<i aria-hidden="true" class="fa fa-angle-right"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
				@empty
					<p class="lead text-center">There is no Companies yet.</p>
				@endforelse

				<div class="text-center">
					{!! $companies->links() !!}
				</div>
			</div>
		</div>
	</section>
@stop
