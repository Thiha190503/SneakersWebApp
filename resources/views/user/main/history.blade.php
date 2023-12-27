@extends('user.layouts.master')

@section('title', 'History Page')

@section('content')
    <div class="container-fluid" style="height:400px">
        <div class="ms-5 mt-3">
            <a href="#">
                <i class="fa-solid fa-arrow-left text-dark fs-5" onclick="history.back()"></i>
            </a>
        </div>
        <div class="row px-xl-5">
            <div class="col-lg-8 offset-2 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0" id="dataTable">
                    <thead class="thead-dark">
                        <tr>
                            <th>Date</th>
                            <th>Order ID</th>
                            <th>Total Price</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @foreach ($order as $o)
                            <tr>
                                <td class="align-middle">{{ $o->created_at->format('F-j-Y') }}</td>
                                <td class="align-middle">{{ $o->order_code }}</td>
                                <td class="align-middle">{{ $o->total_price }}</td>
                                <td class="align-middle">
                                    @if ($o->status == 0)
                                        <span class="text-warning"> <i class="fa-regular fa-clock me-2"></i>
                                            Pending...</span>
                                    @elseif($o->status == 1)
                                        <span class="text-suceess"> <i class="fa-solid fa-check me-2"></i> Success</span>
                                    @elseif($o->status == 2)
                                        <span class="text-danger"> <i class="fa-solid fa-triangle-exclamation me-2"></i>
                                            Reject</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $order->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
