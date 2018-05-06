@extends('themes::mottestate.layouts.default')

@section('breadcrumb')
    <section class="tl-inner-banner">
        <div class="container">
        	<div class="left-holder">
        		<h3>{{ $project['transform_installed_capacity'] }}</h3>
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
						<div class="col-md-8 col-sm-8 col-xs-12">
							<figure class="properties-thumb">
								<img src="{{ getFromS3($project->image[0]) }}" style="height: auto;">
							</figure>
						</div>
						<div class="col-sm-4 col-sm-4 col-xs-12">
							@if (count($project->image) > 1)
								@foreach (collect($project->image)->slice(0,2) as $img)
									<figure class="properties-thumb">
										<img src="{{ getFromS3($img) }}" style="height: auto;">
									</figure>
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
					<h3>{{ $company->name }}</h3>
					<div class="row">
						<div class="col-md-4">
							<img src="{{ $company['avatar_url'] ?: getImgAvatar($company['email']) }}" alt="{{ $company['name'] }}" style="width: 100%;">
						</div>
						<div class="col-md-8">
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
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@stop
