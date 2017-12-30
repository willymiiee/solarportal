@extends('participant::layout_default')

@section('content')

	<section class="content">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2">
				<div class="box box-solid">
					<div class="box-header with-border">
						<h3 class="box-title">Edit Profile</h3>
					</div>
					{!! Form::model($user, ['method' => 'PUT', 'url' => route('profile.update'), 'class' => 'form-horizontal', 'files' => true]) !!}
						<div class="box-body">
							<div class="form-group">
								{!! Form::label('name', 'Name', ['class' => 'col-sm-3 control-label']) !!}
								<div class="col-sm-9">
									{!! Form::text('name', null, ['class' => 'form-control']) !!}
								</div>
							</div>
							<div class="form-group">
								{!! Form::label('email', 'Email', ['class' => 'col-sm-3 control-label']) !!}
								<div class="col-sm-9">
									{!! Form::email('email', null, ['class' => 'form-control']) !!}
								</div>
							</div>
							<div class="form-group">
								{!! Form::label('avatar', 'Profile Picture', ['class' => 'col-sm-3 control-label']) !!}
								<div class="col-sm-9">
									<p>
										<img src="{{ $user->avatar_url }}" style="width: 150px;">
									</p>
									{!! Form::file('avatar', ['class' => 'form-control']) !!}
									<span class="help-block">Max File: 2 MB</span>
								</div>
							</div>
							<div class="form-group">
								{!! Form::label('gender', 'Gender', ['class' => 'col-sm-3 control-label']) !!}
								<div class="col-sm-9">
									<label class="radio-inline">
										{!! Form::radio('gender', 'm', null, []) !!}
										Male
									</label>
									<label class="radio-inline">
										{!! Form::radio('gender', 'f', null, []) !!}
										Female
									</label>
								</div>
							</div>
							<div class="form-group">
								{!! Form::label('phone', 'Phone', ['class' => 'col-sm-3 control-label']) !!}
								<div class="col-sm-9">
									{!! Form::text('phone', null, ['class' => 'form-control']) !!}
								</div>
							</div>
							<div class="form-group">
								{!! Form::label('main_domicile', 'Main Domicile', ['class' => 'col-sm-3 control-label']) !!}
								<div class="col-sm-9">
									{!! Form::select('main_domicile', getMainDomicileDropdown(), null, ['class' => 'form-control']) !!}
								</div>
							</div>
							<div class="form-group">
								{!! Form::label('address', 'Address', ['class' => 'col-sm-3 control-label']) !!}
								<div class="col-sm-9">
									{!! Form::textarea('address', null, ['class' => 'form-control', 'rows' => 3]) !!}
								</div>
							</div>
						</div>
						<div class="box-footer">
							<div class="pull-left">
								<a href="{{ route('profile.password') }}">Change Password</a>
							</div>
							<button type="submit" class="btn btn-warning pull-right">
								<i class="fa fa-save"></i> Update Profile
							</button>
						</div> <!-- /.box-footer -->
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</section>

@stop
