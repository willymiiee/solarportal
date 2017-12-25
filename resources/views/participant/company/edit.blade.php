@extends('participant::layout_default')

@section('content')

	<section class="content">
		<div class="row">
			<div class="col-md-10">
				<div class="box box-default box-solid">
					{!! Form::model($company, ['method' => 'PUT', 'url' => route('participant.company.update', $company['id']), 'class' => 'form-horizontal', 'files' => true]) !!}
						@include('participant::company._form')
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</section>

@endsection
