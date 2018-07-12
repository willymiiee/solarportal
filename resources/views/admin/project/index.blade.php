@extends('layouts.admin')

@section('header')
<h1>
    Project
    <small>You can choose which project should be shown in public page</small>
</h1>
@endsection

@section('content')
	<div class="row">
    	<div class="col-xs-12">
			<div class="box">
	            <div class="box-body">
	            	<div class="table-responsive">
	            		<table class="table table-bordered table-hover">
	            			<thead>
	            				<th style="width: 40px;">No</th>
	            				<th>Perusahaan/Institusi</th>
	            				<th>Project Detail</th>
	            				<th>Visibility</th>
	            				<th style="width: 180px;"> </th>
	            			</thead>
	            			<tbody>
	            				@php
								$no = $projects->firstItem();
								@endphp

								@foreach ($projects as $pr)
								<tr>
									<td>{{ $no++ }}</td>
									<td>
										@if (!$pr->companies->first() && $customer = $pr->customers->first())
											{{ $customer->pivot->unregistered_company_name }}
											<br/><br/>
											<span style="display: block;">Customer: <b>{{ $customer->name }}</b></span>
											<i style="display: block;">(Unregistered Company)</i>
										@else
											{{ $pr->companies->first()->name }}
										@endif
									</td>
									<td>
										<ul style="margin: 0px; padding-left: 13px;">
											<li>
												<i>{{ __('project.installed_capacity') }}:</i> <br/>
												<b>{{ $pr->installed_capacity }}</b>
											</li>
											<li>
												<i>{{ __('project.type_installation') }}:</i> <br/>
												<b>{{ $pr->type_installation }}</b>
											</li>
											<li>
												<i>{{ __('project.type_connection') }}:</i> <br/>
												<b>{{ $pr->type_connection }}</b>
											</li>
											<li>
												<i>Provinsi:</i> <br/>
												<b>{{ $pr->province }}</b>
											</li>
										</ul>
									</td>
									<td>
										@if ($pr->is_shown)
											<span class="label label-success">visible</span>
										@else
											<span class="label label-default">hidden</span>
										@endif
									</td>
									<td>
										<div class="btn-group">
											<button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												Action <span class="caret"></span>
											</button>
											<ul class="dropdown-menu">
												<li>
													<a href="{{ route('admin.projects.putVisibility', [$pr->id, 'visible']) }}">
														<i class="fa fa-eye"></i> Set as "Visible"
													</a>
												</li>
												<li role="separator" class="divider"></li>
												<li>
													<a href="{{ route('admin.projects.putVisibility', [$pr->id, 'hidden']) }}">
														<i class="fa fa-ban"></i> Set as "Hidden"
													</a>
												</li>
											</ul>
										</div>
										<a href="{{ route('project.show', $pr->id) }}" class="btn btn-default btn-sm" target="_blank">
											<i class="fa fa-search-plus"></i> Preview
										</a>
									</td>
								</tr>
								@endforeach
	            			</tbody>
            			</table>
        			</div>
	            </div>
            </div>
    	</div>
	</div>

@endsection