@extends('layouts.admin')

@section('style')
@endsection

@section('header')
<h1>
    Dashboard
    <small>Control panel</small>
</h1>
@endsection

@section('breadcrumb')
{{--  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
</ol>  --}}
@endsection

@section('content')
<!-- Main row -->
<div class="row">
    You are logged in!
</div>
<!-- /.row (main row) -->
@endsection

@section('script')
@endsection
