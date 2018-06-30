@extends('themes::mottestate.layouts.default')

@section('styles')
	<style>
		.tl-contact-form > .row {
			margin-bottom: 20px;
		}
	</style>
@stop

@section('breadcrumb')
    <section class="tl-inner-banner">
        <div class="container">
            <h3>{{ $title }}</h3>
        </div>
    </section>
@stop

@section('content')
	<section class="tl-properties-section pd-tb-80">
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					{!! Form::open(['method' => 'POST', 'url' => route('project.store'), 'class' => 'tl-contact-form', 'files' => true]) !!}
						<h3>Project Details</h3><p>&nbsp;</p>

						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="inner-holder">
									{!! Form::label('installed_capacity', __('project.installed_capacity')) !!}
									{!! Form::number('installed_capacity', null, ['class' => 'form-control', 'required' => true]) !!}
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="inner-holder">
									{!! Form::label('type_installation', __('project.type_installation')) !!}
									{!! Form::select('type_installation', \App\Models\Project::DROPDOWN_TYPE_INSTALLATION, null, ['class' => 'form-control']) !!}
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="inner-holder">
									{!! Form::label('type_connection', __('project.type_connection')) !!}
									{!! Form::select('type_connection', \App\Models\Project::DROPDOWN_TYPE_CONNECTION, null, ['class' => 'form-control']) !!}
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="inner-holder">
									{!! Form::label('is_location_allow_public', __('project.is_location_allow_public')) !!}
									<div>
										<div class="radio-inline">
											<label>{!! Form::radio('is_location_allow_public', 1, old('is_location_allow_public', @$project['is_location_allow_public'] ?: true)) !!} Iya</label>
										</div>
										<div class="radio-inline">
											<label>{!! Form::radio('is_location_allow_public', 0, old('is_location_allow_public', @$project['is_location_allow_public'])) !!} Tidak</label>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="inner-holder">
									{!! Form::label('province', 'Provinsi') !!}
									{!! Form::select('province', getMainDomicileDropdown('< Pilih Provinsi >'), null, ['class' => 'form-control']) !!}
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="inner-holder">
									{!! Form::label('location', __('project.location')) !!}
									{!! Form::text('location', null, ['class' => 'form-control']) !!}
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="inner-holder">
									{!! Form::label('company_id', 'Perusahaan/Institusi') !!}
									{!! Form::select('company_id', $company_dropdown, null, ['class' => 'form-control']) !!}
								</div>
							</div>
							<div id="unregistered_company_field" class="col-md-6 col-sm-6 col-xs-12" style="display: none;">
								<div class="inner-holder">
									{!! Form::label('unregistered_company_name', 'Tulis Nama Perusahaan/Institusi') !!}
									{!! Form::text('unregistered_company_name', null, ['class' => 'form-control']) !!}
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="inner-holder">
									{!! Form::label('image', 'Upload Foto') !!}
									{!! Form::file('image', ['class' => 'form-control', 'multiple' => true]) !!}
									<p style="margin: 10px 0px;" class="help-block">Tekan CTRL + Click foto yg di inginkan untuk memilih foto lebih dari 1. Anda dapat upload maximal: 5 foto</p>
								</div>
							</div>
						</div>

						<h3>Tentang Anda</h3><p>&nbsp;</p>
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="inner-holder">
									{!! Form::label('user[name]', 'Nama') !!}
									{!! Form::text('user[name]', null, ['class' => 'form-control', 'required' => true]) !!}
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="inner-holder">
									{!! Form::label('user[email]', 'Alamat Email') !!}
									{!! Form::email('user[email]', null, ['class' => 'form-control', 'required' => true]) !!}
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="inner-holder">
									{!! Form::label('user[password]', 'Password') !!}
									{!! Form::password('user[password]', null, ['class' => 'form-control', 'required' => true]) !!}
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="inner-holder">
									{!! Form::label('user[password_confirmation]', 'Ulangi Password') !!}
									{!! Form::password('user[password_confirmation]', null, ['class' => 'form-control', 'required' => true]) !!}
								</div>
							</div>
						</div>

						<div class="text-center">
							<button class="btn-submit" type="submit" style="float: none;"><i class="fa fa-send"></i> Daftarkan</button>
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</section>
@stop

@section('scripts')
	<script>
		$('#company_id').on('change', function (e) {
			var theDisplay = ($(this).val() == 0) ? 'block' : 'none'
			$('#unregistered_company_field').css('display', theDisplay)
		})
	</script>
@stop