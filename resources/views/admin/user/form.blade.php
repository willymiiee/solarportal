@extends('layouts.admin')

@section('style')
@endsection

@section('header')
<h1>
    User
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
            <form action="{{ url('admin/users/'.$item->id) }}" method="post" enctype="multipart/form-data">
                <input name="_method" type="hidden" value="PUT">
            @else
            <form action="{{ url('admin/users') }}" method="post" enctype="multipart/form-data">
            @endif
                <div class="box-body pad">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{ isset($item) ? $item->name : old('name') }}" >
                    </div>

                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="{{ isset($item) ? $item->email : old('email') }}" >
                    </div>

                    @if (!isset($item))
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" value="{{ isset($item) ? $item->password : old('password') }}" >
                    </div>

                    <div class="form-group">
                        <label for="">Confirm Password</label>
                        <input type="password" class="form-control" id="password" name="password_confirmation" placeholder="Confirm password" >
                    </div>
                    @endif

                    <div class="form-group">
                        <label for="">Type</label>
                        <select name="type" id="type" class="form-control">
                            <option value="A" {{ isset($item) && $item->type == 'A' ? 'selected' : '' }}>Administrator</option>
                            <option value="C" {{ isset($item) && $item->type == 'C' ? 'selected' : '' }}>General User</option>
                        </select>
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
<!-- CK Editor -->
<script src="{{ asset('bower_components/ckeditor/ckeditor.js') }}"></script>
<script>
    $(function () {
        CKEDITOR.replace('content')
    })
</script>
@endsection