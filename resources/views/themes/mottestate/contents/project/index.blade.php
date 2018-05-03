@extends('themes::mottestate.layouts.default')

@section('breadcrumb')
    <section class="tl-inner-banner">
        <div class="container">
            <h3>{{ $title }}</h3>
        </div>
    </section>
@stop

@section('content')
	<section class="tl-properties-section pd-tb-80">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="tl-filterable-holder tl-filterable-holder_v2">
						@if (!$projects->isEmpty())
							<div class="tl-filterlist">
								<a href="{{ route('project.index', ['sort' => 'latest']) }}" class="{{ request('sort') == 'latest' ? 'current' : '' }}">Latest</a>
								<a href="{{ route('project.index', ['sort' => 'oldest']) }}" class="{{ request('sort') == 'oldest' ? 'current' : '' }}">Oldest</a>
							</div>
						@endif

						<div class="tl-filterOuter row">
							@forelse ($projects as $pro)
								<div class="col-md-4 col-sm-6 col-xs-12 tl-item5">
									{{-- <a href="{{ route('project.show', $pro['id']) }}" class="tl-properties-item"> --}}
									<a href="#" class="tl-properties-item">
										<figure class="tl-properties-thumb">
											<img src="{{ getFromS3($pro['image'][0]) }}">
											<figcaption class="tl-caption">
												<div class="bottom-text" style="background-color: rgba(0,0,0,.3);">
													<h3>{{ $pro['transform_installed_capacity'] }}</h3>
													<span style="color: #fff;">{{ $pro['province'] }}</span>
												</div>
											</figcaption>
										</figure>
										<!--Text Holder Start-->
										<div class="tl-text-holder">
											<h4>
												{{-- Let ask PO what should to do about customers table --}}
												Customer: -
											</h4>
											<h4>
												EPC: {{ optional($pro['companies']->first())->name }}
											</h4>
										</div><!--Text Holder End-->
									</a>
								</div>
							@empty
								<p class="lead text-center">There is no Projects yet.</p>
							@endforelse

							<div class="text-center">
								{!! $projects->links() !!}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@stop
