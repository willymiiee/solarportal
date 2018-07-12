@extends('participant::layout_default')

@section('content')

	<section class="content">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2">
				<!-- Hutang Pembelian -->
				<div class="box box-default box-solid">
					<div class="box-header with-border">
						<h3 class="box-title">Change Password</h3>
					</div>
					{!! Form::open(['method' => 'PUT', 'url' => route('participant.profile.updatePassword'), 'class' => 'form-horizontal']) !!}
						<div class="box-body">
							<div class="form-group">
								{!! Form::label('current_password', 'Current Password', ['class' => 'col-sm-4 control-label']) !!}
								<div class="col-sm-8">
									{!! Form::password('current_password', ['class' => 'form-control']) !!}
								</div>
							</div>
							<hr/>

							<div class="form-group">
								{!! Form::label('password', 'New Password', ['class' => 'col-sm-4 control-label']) !!}
								<div class="col-sm-8">
									{!! Form::password('password', ['class' => 'form-control']) !!}
								</div>
							</div>
							<div class="form-group">
								{!! Form::label('password_confirmation', 'Confirm New Password', ['class' => 'col-sm-4 control-label']) !!}
								<div class="col-sm-8">
									{!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
								</div>
							</div>
						</div>
						<div class="box-footer">
							<a href="{{ route('participant.profile.edit') }}" class="pull-left">
								Edit Profile
							</a>
							<button type="submit" class="btn btn-info pull-right">
								<i class="fa fa-save"></i> Change Password
							</button>
						</div> <!-- /.box-footer -->
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</section>

@endsection
