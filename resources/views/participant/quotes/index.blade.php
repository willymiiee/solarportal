@extends('participant::layout_default')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Daftar Biaya</h3>
                    </div>

                    <div class="box-body">
                        <div class="form-group">
                            <a href="{{ route('calculator') }}" class="btn btn-primary">Hitung Kembali</a>
                        </div>

                        @if ($quotes->isEmpty())
                            <p class="text-center text-muted lead">Saat ini tidak ada hasil kalkulator.</p>
                        @else
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <th style="width: 40px;">No</th>
                                        <th>Tagihan PLN per Bulan</th>
                                        <th>Kapasitas</th>
                                        <th>Biaya Pemasangan</th>
                                        <th>Potensi Penghematan per Bulan</th>
                                    </thead>

                                    <tbody>
                                        @php
                                        $no = $quotes->firstItem();
                                        @endphp

                                        @foreach ($quotes as $q)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>Rp. {{ number_format($q->bill, 0, ',', '.') }}</td>
                                            <td>{{ number_format($q->pv_allowed, 0, ',', '.') }}</td>
                                            <td>Rp. {{ number_format($q->cost, 0, ',', '.') }}</td>
                                            <td>Rp. {{ number_format($q->saving, 0, ',', '.') }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="text-center">
                                {!! $quotes->links('vendor.pagination.bootstrap-4') !!}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
