@extends('user.layouts.master')

@section('title', 'Cart Page')

@section('content')
    <div class="container-fluid">
        <div class="ms-5 my-3">
            <a href="#">
                <i class="fa-solid fa-arrow-left text-dark fs-5" onclick="history.back()"></i>
            </a>
        </div>
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0" id="dataTable">
                    <thead class="thead-dark">
                        <tr>
                            <th>Image</th>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @foreach ($cartList as $c)
                            <tr>
                                <td><img src="{{ asset('storage/' . $c->product_image) }}" alt=""
                                        style="width: 100px;" class="img-thumbnail shadow-sm">
                                </td>
                                <td class="align-middle">
                                    {{ $c->product_name }}
                                    <input type="hidden" class="orderId" value="{{ $c->id }}">
                                    <input type="hidden" class="productId" value="{{ $c->product_id }}">
                                    <input type="hidden" class="userId" value="{{ $c->user_id }}">
                                </td>
                                <input type="hidden" class="userId" value="{{ $c->user_id }}"></td>
                                <td class="align-middle" id="price">{{ $c->product_price }}</td>
                                <td class="align-middle">
                                    <div class="input-group quantity mx-auto" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-primary btn-minus">
                                                <i class="fa fa-minus text-white"></i>
                                            </button>
                                        </div>
                                        <input type="text" class="form-control form-control-sm border-0 text-center"
                                            value="{{ $c->qty }}" id="qty">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-primary btn-plus">
                                                <i class="fa fa-plus text-white"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle col-3" id="total">{{ $c->product_price * $c->qty }} Kyats</td>
                                <td class="align-middle"><button class="btn btn-sm btn-danger btnRemove"><i
                                            class="fa fa-times"></i></button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <h5 class="section-title text-uppercase mb-3"><span class="pr-3">Cart
                        Summary</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6 id="subTotalPrice">{{ $totalPrice }} Kyats</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Delivery</h6>
                            <h6 class="font-weight-medium">3000 Kyats</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5 id="finalPrice">{{ $totalPrice += 3000 }} Kyats</h5>
                        </div>
                        <button class="btn btn-block btn-primary font-weight-bold mt-5 mb-2 py-3" id="orderBtn">
                            <span class="text-white">Proceed To Checkout</span>
                        </button>
                        <button class="btn btn-block btn-danger font-weight-bold mb-3 py-3" id="clearBtn">
                            <span class="text-white">Clear Cart</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scriptSource')
    <script>
        // when + button click
        $('.btn-plus').click(function() {
            $parentNode = $(this).parents("tr");
            $price = Number($parentNode.find('#price').text().replace("Kyats", ""));
            $qty = Number($parentNode.find('#qty').val());
            $total = $price * $qty;
            $parentNode.find('#total').html($total + "Kyats");
            summaryCalculation();
        })

        // when - button click
        $('.btn-minus').click(function() {
            $parentNode = $(this).parents("tr");
            $price = Number($parentNode.find('#price').text().replace("Kyats", ""));
            $qty = Number($parentNode.find('#qty').val());
            $total = $price * $qty;
            $parentNode.find('#total').html($total + "Kyats");
            summaryCalculation();
        })

        // calculate final price for order
        function summaryCalculation() {
            $totalPrice = 0;
            $('#dataTable tbody tr').each(function(index, row) {
                $totalPrice += Number($(row).find('#total').text().replace("Kyats", ""));
            });

            $("#subTotalPrice").html(`${$totalPrice} Kyats`);
            $('#finalPrice').html(`${$totalPrice+3000} Kyats`);
        }
        $('#orderBtn').click(function() {
            $orderList = [];

            $random = Math.floor(Math.random() * 100000000001);

            $('#dataTable tbody tr').each(function(index, row) {
                $orderList.push({
                    'user_id': $(row).find('.userId').val(),
                    'product_id': $(row).find('.productId').val(),
                    'qty': $(row).find('#qty').val(),
                    'total': $(row).find('#total').text().replace('Kyats', '') * 1,
                    'order_code': 'POS' + $random
                })
            });

            $.ajax({
                type: 'get',
                url: 'http://localhost:8000/user/ajax/order',
                data: Object.assign({}, $orderList),
                dataType: 'json',
                success: function(response) {
                    if (response.status == "true") {
                        window.location.href = "http://localhost:8000/user/home";
                    }
                }
            })
        })

        // when clear button click
        $('#clearBtn').click(function() {
            //UI mhr changes lote tr
            $('#dataTable tbody tr').remove();
            $('#subTotalPrice').html('0 Kyats');
            $('#finalPrice').html('3000 Kyats');

            //Database mhr phyat tr
            $.ajax({
                type: 'get',
                url: 'http://localhost:8000/user/ajax/clear/cart',
                dataType: 'json',
            })
        })

        // remove current product //when cross button click
        $('.btnRemove').click(function() {
            $parentNode = $(this).parents("tr");
            $productId = $parentNode.find(".productId").val();
            $orderId = $parentNode.find(".orderId").val();
            $parentNode.remove();

            $.ajax({
                type: 'get',
                url: 'http://localhost:8000/user/ajax/clear/current/product',
                data: {
                    'productId': $productId,
                    'orderId': $orderId
                },
                dataType: 'json',
            })

            $parentNode.remove();

            $totalPrice = 0;
            $('#dataTable tbody tr').each(function(index, row) {
                $totalPrice += Number($(row).find('#total').text().replace("Kyats", ""));
            });
            $("#subTotalPrice").html(`${$totalPrice} Kyats`);
            $('#finalPrice').html(`${$totalPrice+3000} Kyats`);
        })
    </script>
@endsection
