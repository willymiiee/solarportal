@extends('participant::layout_default')

@section('content')

	<section class="content">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="box box-default box-solid">
					{!! Form::open(['method' => 'POST', 'url' => route('participant.project.store'), 'class' => 'form-horizontal', 'files' => true]) !!}
						@include('participant::projects._form')
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</section>

@stop
