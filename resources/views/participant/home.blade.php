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
							<h3>3</h3>
							<p>Companies</p>
						</div>
						<div class="icon">
							<i class="ion ion-briefcase"></i>
						</div>
						<a href="#" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div> <!-- Company ./col -->
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-aqua">
						<div class="inner">
							<h3>47</h3>
							<p>Products</p>
						</div>
						<div class="icon">
							<i class="ion ion-cube"></i>
						</div>
						<a href="#" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div> <!-- Product ./col -->
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-aqua">
						<div class="inner">
							<h3>112</h3>
							<p>Customers</p>
						</div>
						<div class="icon">
							<i class="ion ion-ios-people"></i>
						</div>
						<a href="#" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div> <!-- Customer ./col -->
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-aqua">
						<div class="inner">
							<h3>12k</h3>
							<p>Others</p>
						</div>
						<div class="icon">
							<i class="ion ion-navicon-round"></i>
						</div>
						<a href="#" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
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
						<h3 class="box-title">Top Products</h3>
					</div>
					<div class="box-body">
						<div class="table-responsive">
							<table class="table table-striped table-hover no-margin">
								<thead>
									<tr>
										<th>No</th>
										<th>Name</th>
										<th>Description</th>
									</tr>
								</thead>
								<tbody>
									@for ($i = 0; $i < 5; $i++)
										<tr>
											<td>{{ $i }}</td>
											<td>Hello world</td>
											<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
										</tr>
									@endfor
								</tbody>
							</table>
						</div>
					</div>
					<div class="box-footer text-center">
						<a href="">View All Products &raquo;</a>
					</div>
				</div>
			</div>
			<div class="col-lg-5">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Recently Customers</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<ul class="products-list product-list-in-box">
							@for ($i = 0; $i < 4; $i++)
								<li class="item">
									<div class="product-img">
										<img src="{{ asset('img/male.png') }}" alt="User Image">
									</div>
									<div class="product-info">
										<a href="javascript:void(0)" class="product-title">
											Wayne Rooney
											{{-- <span class="label label-warning pull-right">$1800</span> --}}
										</a>
										<span class="product-description">
											Jl Simo sentosa 60181 Surabaya, Indonesia
										</span>
									</div>
								</li>
							@endfor
						</ul>
					</div>
					<!-- /.box-body -->
					<div class="box-footer text-center">
						<a href="javascript:void(0)" class="uppercase">View All Customers &raquo;</a>
					</div>
					<!-- /.box-footer -->
				</div>
			</div>
		</div>
	</section>
@endsection
