@extends('participant::layout_default')

@section('content')

	<section class="content">
		<div>
			{{-- <h4>Statistik Keseluruhan</h4> --}}
			<div class="row">
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-aqua">
						<div class="inner">
							<h3>{{ auth()->user()->companies->count() }}</h3>
							<p>Perusahaan/Institusi</p>
						</div>
						<div class="icon">
							<i class="ion ion-briefcase"></i>
						</div>
						<a href="{{ route('participant.company.index') }}" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div> <!-- Company ./col -->
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-aqua">
						<div class="inner">
							<h3>0</h3>
							<p>Products</p>
						</div>
						<div class="icon">
							<i class="ion ion-cube"></i>
						</div>
						<a href="{{ url('participant/products') }}" class="small-box-footer">Coming soon <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div> <!-- Product ./col -->
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-aqua">
						<div class="inner">
							<h3>0</h3>
							<p>Customers</p>
						</div>
						<div class="icon">
							<i class="ion ion-ios-people"></i>
						</div>
						<a href="{{ url('participant/customers') }}" class="small-box-footer">Coming soon <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div> <!-- Customer ./col -->
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-aqua">
						<div class="inner">
							<h3>0</h3>
							<p>Hours</p>
						</div>
						<div class="icon">
							<i class="ion ion-navicon-round"></i>
						</div>
						<a href="{{ url('participant/hours') }}" class="small-box-footer">Coming soon <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div> <!-- Product ./col -->
			</div>
		</div>

		<hr/>

		<div class="row">
			<div class="col-lg-7">
				<!-- Hutang Pembelian -->
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">News Feed</h3>
					</div>
					<div class="box-body">
						<ul class="products-list product-list-in-box">
							@forelse ($article_latest as $al)
								<li class="item">
									<div class="product-img">
										<img src="{{ asset('img/boxed-bg.jpg') }}">
									</div>
									<div class="product-info">
										<a href="{{ url('/'. $al['slug']) }}" class="product-title" target="_blank">
											{{ $al['title'] }}
											{{-- <span class="label label-warning pull-right">$1800</span> --}}
										</a>
										<span class="product-description">
											{{ substr(strip_tags($al['content']), 0, 200) }}
										</span>
									</div>
								</li>
							@empty
								<li>
									<p>There is no feed at this moment.</p>
								</li>
							@endforelse
						</ul>
					</div>
					<div class="box-footer text-center">
						{{-- <a href="">View All Blog &raquo;</a> --}}
					</div>
				</div>
			</div>
			<div class="col-lg-5">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Pesan</h3>
					</div>
					<div class="box-body chat" id="chat-box">
						@forelse ($messages_latest as $msg)
							<div class="item" style="border-bottom: 1px solid #f5f5f5;">
								<img src="{{ getImgAvatar($msg['user']['email']) }}" alt="user image">

								<p class="message">
									<span class="name">
										<small class="text-muted pull-right">
											<i class="fa fa-clock-o"></i> {{ $msg['created_at']->format('H:i - M j, Y') }}
										</small>
										{{ $msg['user']['name'] }}
									</span>
									{{  $msg['message'] }}

									<span class="name text-muted clearfix" style="display: block; margin-top: 10px;">
										<a href="mailto:{{ $msg['user']['email'] }}" class="pull-left">
											<small><i class="fa fa-envelope"></i> {{ $msg['user']['email'] }}</small>
										</a>
										<small class="pull-right">
											<i class="fa fa-phone"></i> {{ $msg['user']['phone'] }}
										</small>
									</span>
								</p>
							</div>
						@empty
							<p class="text-muted text-center">Saat ini tidak ada pesan untuk Perusahaan/Institusi anda</p>
						@endforelse
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
