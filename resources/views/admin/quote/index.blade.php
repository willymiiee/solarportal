@extends('layouts.admin')
@section('style')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('header')
<h1>
  Quote
  <small>List</small>
</h1>
@endsection

@section('content') @if (session('status'))
<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <h4><i class="icon fa fa-check"></i> Success!</h4>
  {{ session('status') }}
</div>
@endif

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-body">
        <table id="data" class="table table-bordered table-striped mt-3">
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Address</th>
              <th>Privacy Policy</th>
              <th>Related to Calculator</th>
              <th>Plan to Install</th>
            </tr>
          </thead>

          <tbody>
            @foreach ($items as $item)
            <tr>
              <td>{{ $item->user()->first()->name }}</td>
              <td>{{ $item->user()->first()->email }}</td>
              <td>{{ $item->phone }}</td>
              <td>{{ $item->address }}</td>
              <td>{{ $item->tnc ? 'Agreed' : 'Disagree' }}</td>
              <td>
                @if ($item->is_related)
                  Yes <br><br>

                  <b>Bill</b> : Rp. {{ number_format($item->bill, 0, ',', '.') }} <br>
                  <b>Capacity</b> : {{ number_format($item->capacity, 0, ',', '.') }} <br>
                  <b>PV Allowed</b> : {{ number_format($item->pv_allowed, 0, ',', '.') }}
                @else
                  No
                @endif
              </td>
              <td>
                @if ($item->plan_to_install == 3)
                  In 3 months
                @elseif ($item->plan_to_install == 12)
                  In 1 year
                @elseif ($item->plan_to_install == 0)
                  Longer than 1 year
                @else
                  Don't Know
                @endif
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