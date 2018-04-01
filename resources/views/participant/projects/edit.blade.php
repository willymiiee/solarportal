@extends('participant::layout_default')

@section('content')

	<section class="content">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<a href="{{ route('participant.project.index') }}" class="btn btn-warning">
					<i class="fa fa-list"></i>
					Daftar Project
				</a>
				<div class="box box-default box-solid">
					{!! Form::model($project, ['method' => 'PUT', 'url' => route('participant.project.update', $project->id), 'class' => 'form-horizontal', 'files' => true]) !!}
						@include('participant::projects._form')
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</section>

@stop
