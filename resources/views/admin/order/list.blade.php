@extends('admin.layouts.master')

@section('title', 'Order List Page')

@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-md-12">
                    <form action="{{ route('admin#changeStatus') }}" method="get" class="col-5">
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fa-solid fa-database mr-2"></i> {{ count($order) }}
                                    </span>
                                </div>
                            </div>
                            <select name="orderStatus" class="custom-select" id="inputGroupSelect02">
                                <option value="">All</option>
                                <option value="0" @if (request('orderStatus') == '0') selected @endif>Pending</option>
                                <option value="1" @if (request('orderStatus') == '1') selected @endif>Accept</option>
                                <option value="2" @if (request('orderStatus') == '2') selected @endif>Reject</option>
                            </select>
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-sm ml-3 bg-dark text-white input-group-text"> <i
                                        class="fa-solid fa-magnifying-glass"></i> Search</button>
                            </div>
                        </div>
                    </form>

                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2 text-center">
                            <thead>
                                <tr>
                                    <th>User ID</th>
                                    <th>User Name</th>
                                    <th>Order Date</th>
                                    <th>Order Code</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody id="dataList">
                                @foreach ($order as $o)
                                    <tr class="tr-shadow" style="margin-bottom:2px !important">
                                        <input type="hidden" class="orderId" value="{{ $o->id }}">
                                        <td>{{ $o->user_id }}</td>
                                        <td>{{ $o->user_name }}</td>
                                        <td>{{ $o->created_at->format('F-j-Y') }}</td>
                                        <td>
                                            <a href="{{ route('admin#listInfo', $o->order_code) }}"
                                                class="text-primary">{{ $o->order_code }}</a>
                                        </td>
                                        <td>{{ $o->total_price }}</td>
                                        <td>
                                            <select name="status" class="form-control statusChange">
                                                <option value="0" @if ($o->status == 0) selected @endif>
                                                    Pending</option>
                                                <option value="1" @if ($o->status == 1) selected @endif>
                                                    Accept</option>
                                                <option value="2" @if ($o->status == 2) selected @endif>
                                                    Reject</option>
                                            </select>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-3">
                            {{-- {{ $order->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scriptSource')
    <script>
        $(document).ready(function() {
            $('.statusChange').change(function() {
                $currentStatus = $(this).val();
                $parentNode = $(this).parents('tr');
                $orderId = $parentNode.find('.orderId').val();

                $data = {
                    'orderId': $orderId,
                    'status': $currentStatus,
                };

                $.ajax({
                    type: 'get',
                    url: 'http://localhost:8000/order/ajax/change/status',
                    data: $data,
                    dataType: 'json',
                })
            })
        })
    </script>

@endsection
