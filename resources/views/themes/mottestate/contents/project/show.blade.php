@extends('themes::mottestate.layouts.default')

@section('styles')
	<link href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" rel="stylesheet">
@stop

@section('scripts')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>

	<script>
		// delegate calls to data-toggle="lightbox"
		$(document).on('click', '[data-toggle="lightbox"]', function(event) {
			event.preventDefault();
			return $(this).ekkoLightbox({
				onShown: function() {
					if (window.console) {
						return console.log('Checking our the events huh?');
					}
				},
				onNavigate: function(direction, itemIndex) {
					console.log('halo')
					if (window.console) {
						return console.log('Navigating '+direction+'. Current item: '+itemIndex);
					}
				}
			});
		});
	</script>
@stop

@section('breadcrumb')
	@if (optional(auth()->user())->type == 'A')
    	<section class="tl-inner-banner" style="padding: 0px; background-color: transparent;">
	    	<div class="alert alert-info text-center" style="margin: 0px;">
	    		You are view this page as ADMIN Mode
	    	</div>
    	</section>
    @endif

    <section class="tl-inner-banner">
        <div class="container">
        	<div class="left-holder" style="text-align: left;">
        		<h3>Kapasitas terpasang {{ $project['transform_installed_capacity'] }}</h3>
        		<span class="sub-title">{{ $project['province'] }}</span>
        	</div>
        </div>
    </section>
@stop

@section('content')
	<section class="tl-properties-section pd-tb-80">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="tl-properties-gallery">
						{{-- <div class="col-md-8 col-sm-8 col-xs-12">
							<a href="{{ getFromS3($project->image[0]) }}" data-toggle="lightbox" data-gallery="project-gallery">
								<figure class="properties-thumb">
									<img src="{{ getFromS3($project->image[0]) }}" style="height: auto;">
								</figure>
							</a>
						</div> --}}
						<div class="col-md-12">
							@if (count($project->image) > 0)
								@php
								$column = $isMobile ? 2 : 3;
								@endphp
								@foreach (array_chunk($project->image, $column) as $rows)
									<div class="row">
										@foreach ($rows as $img)
											<div class="{{ $isMobile ? 'col-xs-6' : 'col-xs-4' }}">
												<a href="{{ getFromS3($img) }}" data-toggle="lightbox" data-gallery="project-gallery" style="display: block; height: {{ $isMobile ? '100px' : '220px'}}; padding: 4px; overflow: hidden;">
													<figure class="properties-thumb">
														<img src="{{ getFromS3($img) }}" style="height: auto;">
													</figure>
												</a>
											</div>
										@endforeach
									</div>
								@endforeach
							@endif
						</div>
					</div>
				</div>
				<div class="col-md-8 col-sm-8 col-xs-12">
					<div class="tl-properties-info">
						<div class="top-holder">
							<div class="tl-text-holder">
								<h2>{{ $project->is_location_allow_public ? $project->location : $project->province }}</h2>
								<ul class="tl-meta-listed">
									<li>{{ $project->type_installation }}</li>
									<li>-</li>
									<li>{{ $project->type_connection }}</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-12">
					<aside class="tl-sidebar-outer">
						<!--Widget Start-->
						<div class="widget widget-agent">
							<h3>Info Perusahaan/Institusi</h3>
							<!--Agent Info Start-->
							<div class="agent-info">
								{{-- This means the company is not registered yet, because CREATED by customer --}}
								@if (!$company && $customer)
									<div class="alert alert-warning">
										<i class="fa fa-warning"></i> <small>Perusahaan ini masih belum resmi terdaftar di website ini</small>
									</div>
									<img src="{{ url('img/default-50x50.gif') }}" alt="{{ $customer->pivot->unregistered_company_name }}">
									<div class="text-holder">
										<strong>{{ $customer->pivot->unregistered_company_name }}</strong>
									</div>
								@else
									<img src="{{ $company['avatar_url'] ?: getImgAvatar($company['email']) }}" alt="{{ $company['name'] }}">
									<div class="text-holder">
										<strong>{{ $company->name }}</strong>
										<span>{{ $company->domicile }}</span>
										<ul class="ft-listed">
											@if (!empty($company['phone']))
											<li>
												<i aria-hidden="true" class="fa fa-phone"></i>
												<a href="tel:{{ $company['phone'] }}">{{ $company['phone'] }}</a>
											</li>
											@endif
											@if (!empty($company['phone_2']))
											<li>
												<i aria-hidden="true" class="fa fa-phone"></i>
												<a href="tel:{{ $company['phone_2'] }}">{{ $company['phone_2'] }}</a>
											</li>
											@endif
											<li style="word-wrap: break-word;">
												<i aria-hidden="true" class="fa fa-envelope-o"></i>
												<a href="mailto:david@realestate.com">{{ $company['email'] }}</a>
											</li>
										</ul>
									</div>
								@endif
							</div><!--Agent Info End-->
						</div><!--Widget Holder End-->
					</aside>
				</div>
			</div>
		</div>
	</section>
@stop
