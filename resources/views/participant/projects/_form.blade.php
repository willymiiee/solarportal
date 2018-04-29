<div class="box-body">
	<legend>Detail Utama <b>*</b></legend>
	<div class="form-group {{ $errors->has('installed_capacity') ? ' has-error' : '' }}">
		{!! Form::label('installed_capacity', __('project.installed_capacity'), ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::number('installed_capacity', null, ['class' => 'form-control', 'required' => true]) !!}
		</div>
	</div>
	<div class="form-group {{ $errors->has('type_installation') ? ' has-error' : '' }}">
		{!! Form::label('type_installation', __('project.type_installation'), ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::select('type_installation', \App\Models\Project::DROPDOWN_TYPE_INSTALLATION, null, ['class' => 'form-control']) !!}
		</div>
	</div>
	<div class="form-group {{ $errors->has('type_connection') ? ' has-error' : '' }}">
		{!! Form::label('type_connection', __('project.type_connection'), ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::select('type_connection', \App\Models\Project::DROPDOWN_TYPE_CONNECTION, null, ['class' => 'form-control']) !!}
		</div>
	</div>
	<div class="form-group {{ $errors->has('location') ? ' has-error' : '' }}">
		{!! Form::label('location', __('project.location'), ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::text('location', null, ['class' => 'form-control', 'required' => true]) !!}
		</div>
	</div>
	<div class="form-group {{ $errors->has('is_location_allow_public') ? 'has-error' : '' }}">
		{!! Form::label('is_location_allow_public', __('project.is_location_allow_public'), ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			<div class="radio">
				<label>
					{!! Form::radio('is_location_allow_public', 1, old('is_location_allow_public', @$project['is_location_allow_public'] ?: true)) !!} Yes
				</label>
			</div>
			<div class="radio">
				<label>
					{!! Form::radio('is_location_allow_public', 0, old('is_location_allow_public', @$project['is_location_allow_public'])) !!} No
				</label>
			</div>
		</div>
	</div>
	<div class="form-group {{ $errors->has('province') ? ' has-error' : '' }}">
		{!! Form::label('province', '* Provinsi', ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::select('province', getMainDomicileDropdown('< Pilih Provinsi >'), null, ['class' => 'form-control']) !!}
		</div>
	</div>
	<div class="form-group {{ $errors->has('company_id') ? ' has-error' : '' }}">
		{!! Form::label('company_id', 'Perusahaan/Institusi', ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::select('company_id', $company_dropdown, null, ['class' => 'form-control']) !!}
		</div>
	</div>
	<div class="form-group {{ $errors->has('is_involved_installation') ? 'has-error' : '' }}">
		{!! Form::label('is_involved_installation', __('project.is_involved_installation'), ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			<div class="radio">
				<label>
					{!! Form::radio('is_involved_installation', 1, old('is_involved_installation', @$project['is_involved_installation'] ?: true)) !!} Yes
				</label>
			</div>
			<div class="radio">
				<label>
					{!! Form::radio('is_involved_installation', 0, old('is_involved_installation', @$project['is_involved_installation'])) !!} No
				</label>
			</div>
		</div>
	</div>
	<div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
		{!! Form::label('image', 'Upload Foto', ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{{-- @if (!empty($project))
				<a href="#" class="thumbnail"><img src="{{ getFromS3($project->image) }}"></a>
			@endif
			{!! Form::file('images[]', ['class' => 'form-control', 'multiple' => true]) !!} --}}

			<project current-value="{{ !empty($project) ? json_encode($project->getImageForEdit()) : '' }}"></project>

		</div>
	</div>


	<br/><br/>
	<legend>Informasi Pemasangan Panel Surya</legend>
	<div class="form-group {{ $errors->has('meta_data[infoPanel_brand]') ? ' has-error' : '' }}">
		{!! Form::label('meta_data[infoPanel_brand]', __('project.infoPanel_brand'), ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::text('meta_data[infoPanel_brand]', null, ['class' => 'form-control']) !!}
		</div>
	</div>
	<div class="form-group {{ $errors->has('meta_data[infoPanel_capacity]') ? ' has-error' : '' }}">
		{!! Form::label('meta_data[infoPanel_capacity]', __('project.infoPanel_capacity'), ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::number('meta_data[infoPanel_capacity]', null, ['class' => 'form-control']) !!}
		</div>
	</div>
	<div class="form-group {{ $errors->has('meta_data[infoPanel_amount]') ? ' has-error' : '' }}">
		{!! Form::label('meta_data[infoPanel_amount]', __('project.infoPanel_amount'), ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::number('meta_data[infoPanel_amount]', null, ['class' => 'form-control']) !!}
		</div>
	</div>


	<br/><br/>
	<legend>Inverter</legend>
	<div class="form-group {{ $errors->has('meta_data[inverter_brand]') ? ' has-error' : '' }}">
		{!! Form::label('meta_data[inverter_brand]', __('project.inverter_brand'), ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::text('meta_data[inverter_brand]', null, ['class' => 'form-control']) !!}
		</div>
	</div>
    <div class="form-group {{ $errors->has('meta_data[inverter_type]') ? ' has-error' : '' }}">
		{!! Form::label('meta_data[inverter_type]', __('project.inverter_type'), ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::text('meta_data[inverter_type]', null, ['class' => 'form-control']) !!}
		</div>
	</div>
    <div class="form-group {{ $errors->has('meta_data[inverter_capacity]') ? ' has-error' : '' }}">
		{!! Form::label('meta_data[inverter_capacity]', __('project.inverter_capacity'), ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::number('meta_data[inverter_capacity]', null, ['class' => 'form-control']) !!}
		</div>
	</div>


	<br/><br/>
	<legend>Solar Charge Controller</legend>
	<div class="form-group {{ $errors->has('meta_data[solarCharge_brand]') ? ' has-error' : '' }}">
		{!! Form::label('meta_data[solarCharge_brand]', __('project.solarCharge_brand'), ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::text('meta_data[solarCharge_brand]', null, ['class' => 'form-control']) !!}
		</div>
	</div>
    <div class="form-group {{ $errors->has('meta_data[solarCharge_type]') ? ' has-error' : '' }}">
		{!! Form::label('meta_data[solarCharge_type]', __('project.solarCharge_type'), ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::text('meta_data[solarCharge_type]', null, ['class' => 'form-control']) !!}
		</div>
	</div>


	<br/><br/>
	<legend>Battery</legend>
	<div class="form-group {{ $errors->has('meta_data[battery_brand]') ? ' has-error' : '' }}">
		{!! Form::label('meta_data[battery_brand]', __('project.battery_brand'), ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::text('meta_data[battery_brand]', null, ['class' => 'form-control']) !!}
		</div>
	</div>
    <div class="form-group {{ $errors->has('meta_data[battery_capacity]') ? ' has-error' : '' }}">
		{!! Form::label('meta_data[battery_capacity]', __('project.battery_capacity'), ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::number('meta_data[battery_capacity]', null, ['class' => 'form-control']) !!}
		</div>
	</div>
    <div class="form-group {{ $errors->has('meta_data[battery_amount]') ? ' has-error' : '' }}">
		{!! Form::label('meta_data[battery_amount]', __('project.battery_amount'), ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::number('meta_data[battery_amount]', null, ['class' => 'form-control']) !!}
		</div>
	</div>


	<br/><br/>
	<legend>Pemasangam Meter Exim</legend>
	<div class="form-group {{ $errors->has('meta_data[meterExim_waiting_time]') ? ' has-error' : '' }}">
		{!! Form::label('meta_data[meterExim_waiting_time]', __('project.meterExim_waiting_time'), ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::text('meta_data[meterExim_waiting_time]', null, ['class' => 'form-control']) !!}
		</div>
	</div>
	<div class="form-group {{ $errors->has('meta_data[meterExim_pln_rayon]') ? ' has-error' : '' }}">
		{!! Form::label('meta_data[meterExim_pln_rayon]', __('project.meterExim_pln_rayon'), ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::text('meta_data[meterExim_pln_rayon]', null, ['class' => 'form-control']) !!}
		</div>
	</div>
	<div class="form-group {{ $errors->has('meta_data[meterExim_experience_pln]') ? ' has-error' : '' }}">
		{!! Form::label('meta_data[meterExim_experience_pln]', __('project.meterExim_experience_pln'), ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::textarea('meta_data[meterExim_experience_pln]', null, ['class' => 'form-control']) !!}
		</div>
	</div>


	<br/><br/>
	<legend>Other</legend>
	<div class="form-group {{ $errors->has('meta_data[other_info]') ? ' has-error' : '' }}">
		{!! Form::label('meta_data[other_info]', __('project.other_info'), ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::textarea('meta_data[other_info]', null, ['class' => 'form-control']) !!}
		</div>
	</div>
</div>

<div class="box-footer text-center">
	<button type="submit" class="btn btn-warning btn-lg">
		<i class="fa fa-save"></i> Submit
	</button>
</div>
