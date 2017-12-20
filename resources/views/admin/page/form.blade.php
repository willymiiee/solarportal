@extends('layouts.admin')

@section('style')
@endsection

@section('header')
<h1>
    Page
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
            <form action="{{ url('admin/pages/'.$item->id) }}" method="post" enctype="multipart/form-data">
                <input name="_method" type="hidden" value="PUT">
            @else
            <form action="{{ url('admin/pages') }}" method="post" enctype="multipart/form-data">
            @endif
                <div class="box-body pad">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" value="{{ isset($item) ? $item->title : old('title') }}" >
                    </div>

                    <div class="form-group">
                        <label for="">Content</label>
                        <textarea id="content" name="content" rows="10" cols="80">
                            {{ isset($item) ? $item->content : '' }}
                        </textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Header Image</label>
                        <input type="file" id="image" name="image">

                        @if (isset($item) && $item->images()->get())
                            @foreach ($item->images()->get() as $i)
                            <img src="{{ url($i->url) }}" width=300 alt="">
                            @endforeach
                        @endif
                    </div>

                    <div class="form-group">
                        <input type="checkbox" id="is_home" name="is_home" {{ isset($item) ? ($item->is_home == 1 ? 'checked' : '') : '' }}> <label for="">Show in Homepage</label>
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