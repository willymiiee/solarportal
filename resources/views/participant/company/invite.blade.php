@extends('participant::layout_default')

@section('content')

	<section class="content">
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3">
				<div class="box box-solid">
					<div class="box-header with-border text-center">
						<h3 class="box-title">Invite Participant</h3>
					</div>

					@if (!$company_dropdown)
						<div class="box-body">
							<p class="text-center">Saat ini anda tidak memiliki Perusahaan/Institusi. <br/> <a href="{{ route('participant.company.create') }}">Daftarkan Perusahaan/Institusi</a></p>
						</div>
					@else

						{!! Form::open(['method' => 'PUT', 'url' => route('participant.company.inviteProcess'), 'class' => 'form-invite']) !!}
						<div class="box-body">
							<div class="form-group">
								{!! Form::label('name', 'Name', []) !!}
								{!! Form::text('name', null, ['class' => 'form-control', 'required' => true]) !!}
							</div>
							<div class="form-group">
								{!! Form::label('email', 'Email', []) !!}
								{!! Form::email('email', null, ['class' => 'form-control', 'required' => true]) !!}
							</div>
							<div class="form-group">
								{!! Form::label('company_id', 'Added in Company', []) !!}
								{!! Form::select('company_id', $company_dropdown, null, ['class' => 'form-control']) !!}
							</div>

							{{-- <hr/>
							<div class="alert alert-default" style="font-style: italic;">
								You can use:
								<label class="label label-default">__name__</label>
								<label class="label label-default">__company__</label>
								<label class="label label-default">__email__</label>
								to display actual value
							</div>

							<div class="form-group">
								{!! Form::label('subject', 'Subject', []) !!}
								{!! Form::text('subject', old('subject', $subject_placeholder), ['class' => 'form-control', 'required' => true]) !!}
							</div>
							<div class="form-group">
								{!! Form::label('message', 'Message', []) !!}
								{!! Form::textarea('message', old('message', $message_placeholder), ['class' => 'form-control', 'rows' => 15, 'required' => true]) !!}
								<span class="help-block">Link invitation will automatically generated after this message</span>
							</div> --}}
						</div>
						<div class="box-footer clearfix">
							{{-- <button type="submit" name="preview" value="1" class="btn btn-default pull-left" onclick="$('.form-invite').attr('target', '_blank');">
								<i class="fa fa-eye"></i> Preview
							</button> --}}
							<button type="submit" class="btn btn-warning btn-lg pull-right" onclick="$('.form-invite').removeAttr('target');">
								<i class="fa fa-send"></i> Send Invitation
							</button>
						</div> <!-- /.box-footer -->
						{!! Form::close() !!}

					@endif
				</div>
			</div>
		</div>
	</section>

@stop
