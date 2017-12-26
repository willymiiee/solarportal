@extends('themes::mottestate.layouts.default')

@section('content')

	<section class="tl-team-section pd-tb-80">
		<div class="container">
			<div class="tl-team-inner-holder">
				@for ($i = 0; $i < 5; $i++)
					<div class="tl-team-item tl-team-list-item">
						<div class="row">
							<div class="col-md-2 col-sm-6 col-xs-12">
								<figure class="tl-thumb">
									<img src="{{ asset('img/male.png') }}" alt="">
								</figure>
							</div>
							<div class="col-md-4 col-sm-6 col-xs-12">
								<div class="tl-text-holder">
									<h3><a href="team-detail.html">David Shwimmer</a></h3>
									<span class="desination">Buyer's Agent</span>
									<ul class="ft-listed">
										<li>
											<i aria-hidden="true" class="fa fa-phone"></i>
											<a href="tel:1234533">+1 212-431-2100</a>
										</li>
										<li>
											<i aria-hidden="true" class="fa fa-envelope-o"></i>
											<a href="mailto:david@realestate.com"> david@realestate.com</a>
										</li>
									</ul>
									<p>288 Sold Homes</p>
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<!--Team Services Item Start-->
								<div class="tl-team-services-info">
									<strong>Latest Customers Review</strong>
									<p>“Aenean sollicitudin, lorem quis bibum auctor elit consequat isps umsagit iseh elit. Duised odio amet nibhaul putate cursus a sit amet mauris. Morbi accumsan ipsum velit mam netell elit.” </p>
									<a class="btn-more" href="team-detail.html">
										<i aria-hidden="true" class="fa fa-angle-right"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
				@endfor
			</div>
		</div>
	</section>

	{{-- Call to Action --}}
	<section class="tl-call-to-action-section">
		<div class="container">
			<div class="row">
				<div class="col-md-9 col-sm-9 col-xs-12">
					<h3><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> <b>So did you feel excited too?</b> Let collaboration with us.</h3>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-12">
					<a href="#" class="tl-btn-style1">Join as Participant</a>
				</div>
			</div>
		</div>
	</section>

@stop
