@if (isset($errors) && count($errors) > 0)
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>

		<h4><strong>Whops!</strong> something went wrong!</h4>
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</div>
@elseif(session('message'))
	<div class="alert alert-{{ session('message.type') }}">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		{!! session('message.message') !!}
	</div>
@endif
