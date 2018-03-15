<div class="box-body">
	<legend>Detail Utama <b>*</b></legend>
	<div class="form-group {{ $errors->has('installed_capacity') ? ' has-error' : '' }}">
		{!! Form::label('installed_capacity', 'Kapasitas Terpasang (dalam Wp atau Watt Peak)', ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::text('installed_capacity', null, ['class' => 'form-control']) !!}
		</div>
	</div>
	<div class="form-group {{ $errors->has('type_installation') ? ' has-error' : '' }}">
		{!! Form::label('type_installation', 'Jenis Pemasangan', ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::select('type_installation', \App\Models\Project::DROPDOWN_TYPE_INSTALLATION, null, ['class' => 'form-control']) !!}
		</div>
	</div>
	<div class="form-group {{ $errors->has('type_connection') ? ' has-error' : '' }}">
		{!! Form::label('type_connection', 'Jenis Koneksi', ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::select('type_connection', \App\Models\Project::DROPDOWN_TYPE_CONNECTION, null, ['class' => 'form-control']) !!}
		</div>
	</div>
	<div class="form-group {{ $errors->has('location') ? ' has-error' : '' }}">
		{!! Form::label('location', 'Lokasi', ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::text('location', null, ['class' => 'form-control']) !!}
		</div>
	</div>
	<div class="form-group">
		{!! Form::label('is_location_allow_public', 'Anda mengijinkan lokasi menjadi informasi publik?', ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			<div class="checkbox">
				<label>
					{!! Form::checkbox('is_location_allow_public', 1, null) !!} Yes
				</label>
			</div>
		</div>
	</div>
	<div class="form-group {{ $errors->has('province') ? ' has-error' : '' }}">
		{!! Form::label('province', 'Provinsi', ['class' => 'col-sm-3 control-label']) !!}
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
	<div class="form-group">
		{!! Form::label('is_involved_installation', 'Perusahaan saya terlibat dalam pemasangan', ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			<div class="checkbox">
				<label>
					{!! Form::checkbox('is_involved_installation', 1, null) !!} Yes
				</label>
			</div>
		</div>
	</div>
	<div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
		{!! Form::label('image', 'Upload Foto', ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::file('image', ['class' => 'form-control']) !!}
		</div>
	</div>


	<br/><br/>
	<legend>Informasi Pemasangan Panel Surya</legend>
	<div class="form-group {{ $errors->has('meta[infoPanel_brand]') ? ' has-error' : '' }}">
		{!! Form::label('meta[infoPanel_brand]', 'Merek', ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::text('meta[infoPanel_brand]', null, ['class' => 'form-control']) !!}
		</div>
	</div>
	<div class="form-group {{ $errors->has('meta[infoPanel_capacity]') ? ' has-error' : '' }}">
		{!! Form::label('meta[infoPanel_capacity]', 'Kapasitas tiap Panel', ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::number('meta[infoPanel_capacity]', null, ['class' => 'form-control']) !!}
		</div>
	</div>
	<div class="form-group {{ $errors->has('meta[infoPanel_amount]') ? ' has-error' : '' }}">
		{!! Form::label('meta[infoPanel_amount]', 'Jumlah', ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::number('meta[infoPanel_amount]', null, ['class' => 'form-control']) !!}
		</div>
	</div>


	<br/><br/>
	<legend>Inverter</legend>
	<div class="form-group {{ $errors->has('meta[inverter_brand]') ? ' has-error' : '' }}">
		{!! Form::label('meta[inverter_brand]', 'Merek', ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::text('meta[inverter_brand]', null, ['class' => 'form-control']) !!}
		</div>
	</div>
    <div class="form-group {{ $errors->has('meta[inverter_type]') ? ' has-error' : '' }}">
		{!! Form::label('meta[inverter_type]', 'Tipe', ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::text('meta[inverter_type]', null, ['class' => 'form-control']) !!}
		</div>
	</div>
    <div class="form-group {{ $errors->has('meta[inverter_capacity]') ? ' has-error' : '' }}">
		{!! Form::label('meta[inverter_capacity]', 'Kapasitas', ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::number('meta[inverter_capacity]', null, ['class' => 'form-control']) !!}
		</div>
	</div>


	<br/><br/>
	<legend>Solar Charge Controller</legend>
	<div class="form-group {{ $errors->has('meta[solarCharge_brand]') ? ' has-error' : '' }}">
		{!! Form::label('meta[solarCharge_brand]', 'Merek', ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::text('meta[solarCharge_brand]', null, ['class' => 'form-control']) !!}
		</div>
	</div>
    <div class="form-group {{ $errors->has('meta[solarCharge_type]') ? ' has-error' : '' }}">
		{!! Form::label('meta[solarCharge_type]', 'Tipe', ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::text('meta[solarCharge_type]', null, ['class' => 'form-control']) !!}
		</div>
	</div>


	<br/><br/>
	<legend>Battery</legend>
	<div class="form-group {{ $errors->has('meta[battery_brand]') ? ' has-error' : '' }}">
		{!! Form::label('meta[battery_brand]', 'Merek', ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::text('meta[battery_brand]', null, ['class' => 'form-control']) !!}
		</div>
	</div>
    <div class="form-group {{ $errors->has('meta[battery_capacity]') ? ' has-error' : '' }}">
		{!! Form::label('meta[battery_capacity]', 'Kapasitas tiap Baterai', ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::number('meta[battery_capacity]', null, ['class' => 'form-control']) !!}
		</div>
	</div>
    <div class="form-group {{ $errors->has('meta[battery_amount]') ? ' has-error' : '' }}">
		{!! Form::label('meta[battery_amount]', 'Jumlah', ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::number('meta[battery_amount]', null, ['class' => 'form-control']) !!}
		</div>
	</div>


	<br/><br/>
	<legend>Pemasangam Meter Exim</legend>
	<div class="form-group {{ $errors->has('meterExim_waiting_time') ? ' has-error' : '' }}">
		{!! Form::label('meterExim_waiting_time', 'Waktu Menunggu', ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::text('meterExim_waiting_time', null, ['class' => 'form-control']) !!}
		</div>
	</div>
	<div class="form-group {{ $errors->has('meterExim_pln_rayon') ? ' has-error' : '' }}">
		{!! Form::label('meterExim_pln_rayon', 'PLN Rayon', ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::text('meterExim_pln_rayon', null, ['class' => 'form-control']) !!}
		</div>
	</div>
	<div class="form-group {{ $errors->has('meterExim_experience_pln') ? ' has-error' : '' }}">
		{!! Form::label('meterExim_experience_pln', 'Pengalaman berhubungan dengan PLN', ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::textarea('meterExim_experience_pln', null, ['class' => 'form-control']) !!}
		</div>
	</div>


	<br/><br/>
	<legend>Other</legend>
	<div class="form-group {{ $errors->has('other_info') ? ' has-error' : '' }}">
		{!! Form::label('other_info', 'Informasi pemasangan lain', ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::textarea('other_info', null, ['class' => 'form-control']) !!}
		</div>
	</div>
</div>

<div class="box-footer text-center">
	<button type="submit" class="btn btn-warning btn-lg">
		<i class="fa fa-save"></i> Submit
	</button>
</div>
