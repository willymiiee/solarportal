@extends('participant::layout_default')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default">
					<div class="box-header with-border">
                        <h3 class="box-title">Verification Form</h3>
                    </div>

                    <form action="" class="form-horizontal">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Company</label>

                                <div class="col-sm-10">
                                    <select name="company" id="company" class="form-control">
                                        @foreach (Auth::user()->companies as $c)
                                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Type</label>

                                <div class="col-sm-10">
                                    <select name="type" id="type" class="form-control">
                                        @foreach ($items as $i)
                                        <option value="{{ $i->id }}">{{ 'Rp. ' . number_format($i->price, 0, ',', '.') . ' (' . $i->duration . ' hari)' }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="box-footer">
                            <button id="pay" type="submit" class="btn btn-info pull-right"> Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@stop

@section('script')
    @if (\App::environment('production'))
        <script src="https://app.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_ID') }}"></script>
    @else
        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_ID') }}"></script>
    @endif

    <script>
        $('#pay').click(function(e) {
            e.preventDefault()

            let orderData = {
                'user_id': "{{ Auth::user()->id }}",
                'type': 'verify',
                'item_id': $('#type').val(),
                'company': $('#company').val()
            }

            $.post("{{ route('api.orders.store') }}", orderData)
                .done(function(res) {
                    let snapData = {
                        'customer_details': {
                            'first_name': "{{ Auth::user()->name }}",
                            'email': "{{ Auth::user()->email }}"
                        },
                        'transaction_details': {
                            'order_id': res.id,
                            'gross_amount': Math.round(res.grand_total)
                        }
                    }

                    $.post("{{ route('api.snap') }}", snapData)
                        .done(function(res) {
                            snap.pay(res)
                        })
                })
        })
    </script>
@stop
