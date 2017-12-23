@extends('participant::layout_default')

@section('content')

	<section class="content">
		<div class="row">
			<div class="col-md-10">
				<div class="box box-default box-solid">
					{!! Form::open(['method' => 'POST', 'url' => route('participant.company.store'), 'class' => 'form-horizontal', 'files' => true]) !!}
						@include('participant::company._form')
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</section>

@endsection
