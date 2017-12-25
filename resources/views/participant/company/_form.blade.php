<div class="box-body">
	<legend>1. Basic Information</legend>
	<div class="form-group">
		{!! Form::label('name', 'Name', ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::text('name', null, ['class' => 'form-control', 'autofocus' => true]) !!}
		</div>
	</div>
	<div class="form-group">
		{!! Form::label('slug', 'Slug', ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			<div class="input-group">
				<span class="input-group-addon">{{ str_finish(route('company.show', ''), '/') }}</span>
				{!! Form::text('slug', null, ['class' => 'form-control']) !!}
			</div>
		</div>
	</div>
	<div class="form-group">
		{!! Form::label('email', 'Email', ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::email('email', null, ['class' => 'form-control']) !!}
		</div>
	</div>
	<div class="form-group">
		{!! Form::label('domicile', 'Domicile', ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::select('domicile', getMainDomicileDropdown('< Select Domicile >'), null, ['class' => 'form-control']) !!}
		</div>
	</div>
	<div class="form-group">
		{!! Form::label('description', 'About', ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => 5]) !!}
		</div>
	</div>
	<div class="form-group">
		{!! Form::label('address', 'Address', ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::textarea('address', null, ['class' => 'form-control', 'rows' => 3]) !!}
		</div>
	</div>
	<div class="form-group">
		{!! Form::label('phone', 'Phone 1', ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::text('phone', null, ['class' => 'form-control']) !!}
		</div>
	</div>
	<div class="form-group">
		{!! Form::label('phone_2', 'Phone 2', ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::text('phone_2', null, ['class' => 'form-control']) !!}
		</div>
	</div>
	<div class="form-group">
		{!! Form::label('website', 'Website', ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::text('website', null, ['class' => 'form-control']) !!}
		</div>
	</div>

	<p>&nbsp;</p>

	<services current-value="{{ !empty(old('services')) ? json_encode(old('services')) : @$company['services'] }}"></services>

	<p>&nbsp;</p>
</div>
<div class="box-footer text-center">
	<button type="submit" class="btn btn-primary btn-lg">
		<i class="fa fa-save"></i> Save
	</button>
	&nbsp;&nbsp;
	<a href="{{ route('participant.company.index') }}" class="btn btn-default">
		<i class="fa fa-undo"></i> Cancel
	</a>
</div> <!-- /.box-footer -->
