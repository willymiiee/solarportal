@extends('layouts.admin')

@section('style')
@endsection

@section('header')
<h1>
    Package
    <small>Form</small>
</h1>
@endsection

@section('content')
@if ($errors->any())
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            @if (isset($item))
            <form action="{{ route('admin.verify.packages.update', ['id' => $item->id]) }}" method="post" enctype="multipart/form-data">
                <input name="_method" type="hidden" value="PUT">
            @else
            <form action="{{ route('admin.verify.packages.store') }}" method="post" enctype="multipart/form-data">
            @endif
                <div class="box-body pad">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{ isset($item) ? $item->name : old('name') }}" >
                    </div>

                    <div class="form-group">
                        <label for="">Price</label>
                        <div class="input-group">
                            <span class="input-group-addon">Rp</span>
                            <input type="text" class="form-control" id="price" name="price" placeholder="Enter price" value="{{ isset($item) ? $item->price : old('price') }}" onkeypress="return event.charCode >= 48 && event.charCode <= 57" onpaste="return false" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Duration</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="duration" name="duration" placeholder="Enter duration" value="{{ isset($item) ? $item->duration : old('duration') }}" min=1 >
                            <span class="input-group-addon">days</span>
                        </div>
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col-->
</div>
@endsection

@section('script')
<!-- Select2 -->
<script src="{{ asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<!-- CK Editor -->
<script src="{{ asset('bower_components/ckeditor/ckeditor.js') }}"></script>
<script>
    $(function () {
        CKEDITOR.replace('content')

        //Initialize Select2 Elements
        $('.select2').select2()
    })
</script>
@endsection