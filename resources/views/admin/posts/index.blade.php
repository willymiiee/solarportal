@extends('layouts.admin')

@section('style')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('header')
<h1>
    Post
    <small>List</small>
</h1>
@endsection

@section('content')
@if (session('status'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-check"></i> Success!</h4>
    {{ session('status') }}
</div>
@endif

<div class="row">
    <div class="col-xs-12">
        <a href="{{ url('admin/posts/create') }}" class="btn btn-lg btn-primary" style="margin-bottom:10px">Add Item</a>

        <div class="box">
            <div class="box-body">
                <table id="data" class="table table-bordered table-striped mt-3">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Label</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->label_name }}</td>
                            <td>{{ date('j M Y', strtotime($item->created_at)) }}</td>
                            <td>
                                <a href="{{ url('admin/posts/'.$item->id.'/edit') }}" class="btn btn-sm btn-warning pull-left"><i class="fa fa-pencil"></i></a>
                                <form action="{{ url('admin/posts/'.$item->id) }}" method="post" onsubmit="return confirm('Do you really want to delete?');">
                                    {{ csrf_field() }}
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>
@endsection

@section('script')
<!-- DataTables -->
<script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script>
    $(function () {
        $('#data').DataTable()
    })
</script>
@endsection
