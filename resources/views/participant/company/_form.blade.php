<div class="box-body">
	<legend>1. Basic Information</legend>
	<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
		{!! Form::label('name', 'Nama Perusahaan/Institusi *', ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::text('name', null, ['class' => 'form-control', 'data-slug-target' => '#slug', 'autofocus' => true]) !!}
		</div>
	</div>
	<div class="form-group {{ $errors->has('slug') ? ' has-error' : '' }}">
		{!! Form::label('slug', 'Nama Singkat *', ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			<div class="input-group">
				<span class="input-group-addon">{{ str_finish(route('company.show', ''), '/') }}</span>
				{!! Form::text('slug', null, ['id' => 'slug', 'class' => 'form-control']) !!}
			</div>
			<span class="help-block">Nilai hanya boleh huruf, angka, dan strip.</span>
		</div>
	</div>
	<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
		{!! Form::label('email', 'Email *', ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::email('email', null, ['class' => 'form-control']) !!}
		</div>
	</div>
	<div class="form-group {{ $errors->has('avatar') ? ' has-error' : '' }}">
		{!! Form::label('avatar', 'Logo', ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			@if (@$company['avatar_url'])
				<p>
					<img src="{{ $company['avatar_url'] }}" style="width: 150px;">
				</p>
			@endif
			{!! Form::hidden('previous_avatar', @$company['avatar']) !!}
			{!! Form::file('avatar', ['class' => 'form-control', 'accept' => 'image/*']) !!}
			<span class="help-block">Max File: 2 MB</span>
		</div>
	</div>
	<div class="form-group {{ $errors->has('domicile') ? ' has-error' : '' }}">
		{!! Form::label('domicile', 'Domisili Utama *', ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::select('domicile', getMainDomicileDropdown('< Pilih Domisili Utama >'), null, ['class' => 'form-control']) !!}
		</div>
	</div>
	<div class="form-group">
		{!! Form::label('description', 'Penjelasan Singkat', ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => 7]) !!}
		</div>
	</div>
	<div class="form-group">
		{!! Form::label('categories', 'Kategori', ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			@foreach (array_chunk($categories, 2) as $row)
				<div class="row">
					@foreach ($row as $id => $cat)
						<div class="col-md-6">
							<label class="checkbox-inline">
								{!! Form::checkbox('categories[]', $cat['id'], null) !!} {{ $cat['name'] }}
							</label>
						</div>
					@endforeach
				</div>
			@endforeach
		</div>
	</div>
	<div class="form-group">
		{!! Form::label('address', 'Alamat', ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::textarea('address', null, ['class' => 'form-control', 'rows' => 3]) !!}
		</div>
	</div>
	<div class="form-group">
		{!! Form::label('phone', 'No Telepon #1', ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::text('phone', null, ['class' => 'form-control']) !!}
		</div>
	</div>
	<div class="form-group">
		{!! Form::label('phone_2', 'No Telepon #2', ['class' => 'col-sm-3 control-label']) !!}
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
