@extends('layouts.admin')

@section('style')
@endsection

@section('header')
<h1>
    Company
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
            <form action="{{ route('admin.companies.update', ['id' => $item->id]) }}" method="post">
                <input name="_method" type="hidden" value="PUT">
            @else
            <form action="{{ route('admin.companies.store') }}" method="post">
            @endif
                <div class="box-body pad">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter name" value="{{ isset($item) ? $item->name : old('name') }}" >
                    </div>

                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter email" value="{{ isset($item) ? $item->email : old('email') }}" >
                    </div>

                    <div class="form-group">
                        <label for="">Domicile</label>
                        <input type="text" class="form-control" name="domicile" placeholder="Enter domicile" value="{{ isset($item) ? $item->domicile : old('domicile') }}" >
                    </div>

                    <div class="form-group">
                        <label for="">Address</label>
                        <textarea id="address" name="address" rows="10" cols="80">
                            {{ isset($item) ? $item->address : '' }}
                        </textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Website</label>
                        <input type="text" class="form-control" name="website" placeholder="Enter website" value="{{ isset($item) ? $item->website : old('website') }}" >
                    </div>

                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea id="description" name="description" rows="10" cols="80">
                            {{ isset($item) ? $item->description : '' }}
                        </textarea>
                    </div>

                    <div class="form-group">
                        <input type="checkbox" name="verified" {{ isset($item) ? ($item->verified == 1 ? 'checked' : '') : '' }}> <label for="">Verified</label>
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
        CKEDITOR.replace('address')
        CKEDITOR.replace('description')
    })
</script>
@endsection