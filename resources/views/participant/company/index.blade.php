@extends('participant::layout_default')

@section('content')

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<a href="{{ route('participant.company.create') }}" class="btn btn-warning">
					<i class="fa fa-plus"></i>
					Create
				</a>
				<div class="box box-default">
					<div class="box-header with-border">

					</div>
					<div class="box-body">
						@if ($companies->isEmpty())
							<p class="text-center text-muted lead">There is no company at this time. <a href="{{ route('participant.company.create') }}">Add New</a></p>
						@else
						<div class="table-responsive">
							<table class="table table-bordered table-hover">
								<thead>
									<th style="width: 40px;">No</th>
									<th>Nama</th>
									<th>Email</th>
									<th>Slug</th>
									<th> </th>
								</thead>
								<tbody>
									@php
									$no = $companies->firstItem();
									@endphp

									@foreach ($companies as $com)
									<tr>
										<td>{{ $no++ }}</td>
										<td>{{ $com['name'] }}</td>
										<td>{{ $com['email'] }}</td>
										<td>
											<a href="{{ route('company.show', $com['slug']) }}">
												{{ route('company.show', $com['slug']) }}
											</a>
										</td>
										<td>
											<a href="{{ route('participant.company.edit', $com['slug']) }}" class="btn btn-default btn-sm">
												<i class="fa fa-edit"></i>
												Edit
											</a>
											{{-- <a href="{{ route('participant.company.destroy', $com['slug']) }}" class="btn btn-danger btn-sm">
												<i class="fa fa-trash"></i>
												Delete
											</a> --}}
											<a href="{{ route('participant.company.destroy', $com['id']) }}"
											class="btn btn-danger btn-sm"
											data-method="delete"
											data-confirm="Are you sure?">
												<i class="fa fa-trash"></i>
												Delete
											</a>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>

						<div class="text-center">
							{!! $companies->links() !!}
						</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection
