@extends('themes::mottestate.layouts.default')

@section('breadcrumb')
    <section class="tl-inner-banner">
        <div class="container">
            <h3>{{ $title }}</h3>
            <form action="{{ route('company.index') }}" class="tl-breadcrumb-listed">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search companies">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </section>
@stop

@section('content')

	<section class="tl-team-section pd-tb-80">
		<div class="container">
			<div class="tl-team-inner-holder">
				@forelse ($companies as $comp)
					<div class="tl-team-item tl-team-list-item">
						<div class="row">
							<div class="col-md-2 col-sm-6 col-xs-12">
								<figure class="tl-thumb">
									<img src="{{ $comp['avatar_url'] ?: getImgAvatar($comp['email']) }}" alt="{{ $comp['name'] }}" style="object-fit: contain">
								</figure>
							</div>
							<div class="col-md-4 col-sm-6 col-xs-12">
								<div class="tl-text-holder">
									<h3><a href="{{ route('company.show', $comp['slug']) }}">{{ $comp['name'] }}</a></h3>
									<span class="desination">{{ $comp['domicile'] }}</span>
									<ul class="ft-listed">
										@if (!empty($comp['phone']))
											<li>
												<i aria-hidden="true" class="fa fa-phone"></i>
												<a href="tel:1234533">{{ $comp['phone'] }}</a>
											</li>
										@endif

										@if (!empty($comp['phone_2']))
											<li>
												<i aria-hidden="true" class="fa fa-phone"></i>
												<a href="tel:1234533">{{ $comp['phone_2'] }}</a>
											</li>
										@endif

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
								<div class="tl-team-services-info" style="min-height: 200px;">
									<strong>About</strong>
									{!! substr(nl2br(strip_tags($comp['description'])), 0, 350) !!}
									@if (strlen($comp['description']) > 350) ... @endif

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
