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
	{{-- <div class="box-group" id="accordion">
		<div class="panel box box-primary">
	        <div class="box-header with-border">
	            <h4 class="box-title">
	                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" class="collapsed">
	                    Collapsible Group Item #1
	                </a>
	            </h4>
	        </div>
	        <div id="collapseOne" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
	            <div class="box-body">
	                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
	                wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
	                eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
	                assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
	                nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
	                farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
	                labore sustainable VHS.
	            </div>
	        </div>
	    </div>
	    <div class="panel box box-danger">
	        <div class="box-header with-border">
	            <h4 class="box-title">
	                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed" aria-expanded="false">
	                    Collapsible Group Danger
	                </a>
	            </h4>
	        </div>
	        <div id="collapseTwo" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
	            <div class="box-body">
	                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
	                wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
	                eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
	                assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
	                nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
	                farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
	                labore sustainable VHS.
	            </div>
	        </div>
	    </div>
	    <div class="panel box box-success">
	        <div class="box-header with-border">
	            <h4 class="box-title">
	                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="collapsed" aria-expanded="false">
	                    Collapsible Group Success
	                </a>
	            </h4>
	        </div>
	        <div id="collapseThree" class="panel-collapse collapse" aria-expanded="false">
	            <div class="box-body">
	                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
	                wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
	                eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
	                assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
	                nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
	                farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
	                labore sustainable VHS.
	            </div>
	        </div>
	    </div>
    </div> --}}

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
