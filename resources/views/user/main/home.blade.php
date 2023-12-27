@extends('user.layouts.master')

@section('title', 'Products Page')

@section('content')
    <div class="container-fluid" style="height: 400px">
        <div class="row" style="background-color: #cbcbcb94;">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid px-5">
                    <ul class="navbar-nav me-auto mb-3 mb-lg-0">
                        <li class="nav-item text-dark me-2">
                            <a href="{{ route('user#home') }}" class="nav-link">All</a>
                        </li>
                        @foreach ($categories as $category)
                            <li class="nav-item text-dark me-2">
                                <a class="nav-link" aria-current="page"
                                    href="{{ route('user#filter', $category->id) }}">{{ $category->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                    <form action="{{ route('user#home') }}" method="get" class="d-flex" role="search">
                        @csrf
                        <input class="form-control me-1" type="text" name="key" placeholder="Search"
                            aria-label="Search" value="{{ request('key') }}">
                        <button class="btn bg-dark text-white" type="submit">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
                </div>
            </nav>
        </div>
        <div class="row px-xl-5 mt-3">
            <div class="row pb-3">
                <div class="col-12 pb-1">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div>
                        </div>
                        <div class="ml-2">
                            <div class="btn-group">
                                <select name="sorting" id="sortingOption" class="form-control">
                                    <option value="">Choose One Option...</option>
                                    <option value="asc">Ascending</option>
                                    <option value="desc">Descending</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="dataList">
                    @if (count($products) != 0)
                        @foreach ($products as $product)
                            <div class="col-lg-3 col-md-6 col-sm-6 pb-1">
                                <a href="{{ route('user#productDetails', $product->id) }}">
                                    <div class="product-item bg-light mb-4" id="myForm">
                                        <div class="product-img position-relative overflow-hidden">
                                            <img class="img-fluid" style="width:300px ;height: 250px"
                                                src="{{ asset('storage/' . $product->image) }}" alt="">
                                        </div>
                                        <div class="text-center py-4">
                                            <a class="h6 text-decoration-none text-truncate"
                                                href="{{ route('user#productDetails', $product->id) }}">{{ $product->name }}</a>
                                            <div class="d-flex align-items-center justify-content-center mt-2">
                                                <h5>{{ $product->price }} Kyats</h5>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @else
                        <p class="text-center shadow-sm fs-1 col-6 offset-3 py-5">There is no product</p>
                    @endif
                </div>
            </div>
            <div class="mt-3">
                {{ $products->links() }}
            </div>
        </div>

    @endsection

    @section('scriptSource')
        <script>
            $(document).ready(function() {
                // Sorting
                $('#sortingOption').change(function() {
                    $eventOption = $('#sortingOption').val();

                    if ($eventOption == 'asc') {
                        $.ajax({
                            type: 'get',
                            url: '/user/ajax/product/list',
                            data: {
                                'status': 'asc'
                            },
                            dataType: 'json',
                            success: function(response) {
                                $list = '';
                                for ($i = 0; $i < response.length; $i++) {
                                    $list += `<div class="col-lg-3 col-md-6 col-sm-6 pb-1">
                                <a href="{{ route('user#productDetails', $product->id) }}">
                                    <div class="product-item bg-light mb-4" id="myForm">
                                        <div class="product-img position-relative overflow-hidden">
                                            <img class="img-fluid" style="width:300px ;height: 250px"
                                                src="{{ asset('storage/${response[$i].image}') }}" alt="">
                                        </div>
                                        <div class="text-center py-4">
                                            <a class="h6 text-decoration-none text-truncate"
                                                href="{{ route('user#productDetails', $product->id) }}">${response[$i].name}</a>
                                            <div class="d-flex align-items-center justify-content-center mt-2">
                                                <h5>${response[$i].price} Kyats</h5>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>`;
                                }
                                $('#dataList').html($list);
                            }
                        })
                    } else if ($eventOption == 'desc') {
                        $.ajax({
                            type: 'get',
                            url: '/user/ajax/product/list',
                            data: {
                                'status': 'desc'
                            },
                            dataType: 'json',
                            success: function(response) {
                                $list = '';
                                for ($i = 0; $i < response.length; $i++) {
                                    $list += `<div class="col-lg-3 col-md-6 col-sm-6 pb-1">
                                <a href="{{ route('user#productDetails', $product->id) }}">
                                    <div class="product-item bg-light mb-4" id="myForm">
                                        <div class="product-img position-relative overflow-hidden">
                                            <img class="img-fluid" style="width:300px ;height: 250px"
                                                src="{{ asset('storage/${response[$i].image}') }}" alt="">
                                        </div>
                                        <div class="text-center py-4">
                                            <a class="h6 text-decoration-none text-truncate"
                                                href="{{ route('user#productDetails', $product->id) }}">${response[$i].name}</a>
                                            <div class="d-flex align-items-center justify-content-center mt-2">
                                                <h5>${response[$i].price} Kyats</h5>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>`;
                                }
                                $('#dataList').html($list);
                            }
                        })
                    }
                })
            });
        </script>
    @endsection
