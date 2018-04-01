@extends('participant::layout_default')

@section('content')

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<a href="{{ route('participant.project.create') }}" class="btn btn-warning">
					<i class="fa fa-plus"></i>
					Create
				</a>
				<div class="box box-default">
					<div class="box-header with-border"> </div>
					<div class="box-body">
						@if ($projects->isEmpty())
							<p class="text-center text-muted lead">Saat ini tidak ada Project. <a href="{{ route('participant.project.create') }}">Tambahkan di sini</a></p>
						@else
						<div class="table-responsive">
							<table class="table table-bordered table-hover">
								<thead>
									<th style="width: 40px;">No</th>
									<th>Perusahaan/Institusi</th>
									<th>Kapasitas Terpasang</th>
									<th>Jenis Pemasangan</th>
									<th>Location</th>
									<th style="width: 150px;"> </th>
								</thead>
								<tbody>
									@php
									$no = $projects->firstItem();
									@endphp

									@foreach ($projects as $pr)
									<tr>
										<td>{{ $no++ }}</td>
										<td>{{ $pr->companies->first()->name }}</td>
										<td>{{ $pr['installed_capacity'] }}</td>
										<td>{{ $pr['type_installation'] }}</td>
										<td><small>{{ $pr['location'] }}</small></td>
										<td>
											<a href="{{ route('participant.project.edit', $pr->id) }}" class="btn btn-default btn-sm">
												<i class="fa fa-pencil"></i> Edit
											</a>
											<a href="{{ route('participant.project.destroy', $pr->id) }}" class="btn btn-danger btn-sm" data-method="DELETE" data-confirm="Are you sure?">
												<i class="fa fa-trash"></i> Hapus
											</a>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>

						<div class="text-center">
							{!! $projects->links() !!}
						</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</section>

@stop