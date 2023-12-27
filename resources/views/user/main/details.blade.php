@extends('user.layouts.master')

@section('title', 'Details Page')

@section('content')
    <div class="container-fluid pb-5">
        <div class="ms-5 mt-3">
            <a href="#">
                <i class="fa-solid fa-arrow-left text-dark fs-5" onclick="history.back()"></i>
            </a>
        </div>
        <div class="row px-xl-5">
            <div class="col-lg-5 mb-30">
                <div id="product-carousel" class="carousel slide mt-3" data-ride="carousel">
                    <div class="carousel-inner bg-light">
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="{{ asset('storage/' . $product->image) }}" alt="Image">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7 h-auto mb-30 mt-3">
                <div class="h-100 bg-light p-30">
                    <h3>{{ $product->name }}</h3>
                    <input type="hidden" value="{{ Auth::user()->id }}" id="userId">
                    <input type="hidden" value="{{ $product->id }}" id="productId">
                    <h3 class="font-weight-semi-bold mb-4">{{ $product->price }} Kyats</h3>
                    <p class="mb-4">{{ $product->description }}</p>
                    <div class="d-flex align-items-center mb-4 pt-2">
                        <div class="input-group quantity mr-3" style="width: 130px;">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-minus">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <input type="text" class="form-control border-0 text-center" id="orderCount" value="1">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-plus">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary px-3" id="addCartBtn"><i
                                class="fa fa-shopping-cart mr-1"></i> Add To
                            Cart</button>
                    </div>

                    <div class="d-flex pt-2">
                        <strong class="text-dark mr-2">Share on:</strong>
                        <div class="d-inline-flex">
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-pinterest"></i>
                            </a>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <div class="mt-5">
            <ul class="list-group mb-2">
                <li class="list-group-item active">
                    <b>Comments ({{ count($product->reviews) }})</b>
                </li>
                @foreach ($product->reviews as $review)
                    <li class="list-group-item">
                        @if (Auth::user()->name == $review->user->name)
                            <a href="{{ Route('user#reviewDelete', $review->id) }}" class="btn-close float-end">
                            </a>
                        @endif
                        {{ $review->content }}
                        <div class="small mt-2">
                            By <b>{{ $review->user->name }}</b>,
                            {{ $review->created_at->diffForHumans() }}
                        </div>
                    </li>
                @endforeach
            </ul>

            <form action="{{ Route('user#reviewAdd') }}" method="post">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <textarea name="content" class="form-control mb-2" placeholder="New Review"></textarea>
                <input type="submit" value="Add Review" class="btn btn-secondary float-end">
            </form>
        </div>

    </div>

    <div class="container-fluid py-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">You May Also
                Like</span></h2>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                    @foreach ($productList as $p)
                        <div class="product-item bg-light">
                            <div class="product-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="{{ asset('storage/' . $p->image) }}" alt=""
                                    style="height: 300px">
                                <div class="product-action">
                                    <a class="btn btn-outline-dark btn-square" href=""><i
                                            class="fa fa-shopping-cart"></i>
                                    </a>
                                    <a class="btn btn-outline-dark btn-square"
                                        href="{{ route('user#productDetails', $p->id) }}"><i
                                            class="fa fa-solid fa-circle-info"></i></a>
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate" href="">{{ $p->name }}</a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5>{{ $p->price }} Kyats</h5>
                                    <h6 class="text-muted ml-2"></h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-center mb-1">
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small>(99)</small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scriptSource')
    <script>
        // increase view count
        $.ajax({
            type: 'get',
            url: '/user/ajax/increase/viewCount',
            data: {
                'productId': $('#productId').val()
            },
            dataType: 'json',
        })

        // add to cart btn
        $(document).ready(function() {
            $('#addCartBtn').click(function() {
                $source = {
                    'userId': $('#userId').val(),
                    'productId': $('#productId').val(),
                    'qty': $('#orderCount').val()
                };
                console.log($source);

                $.ajax({
                    url: '/user/ajax/addToCart',
                    type: 'get',
                    dataType: 'json',
                    data: $source,
                    success: function(response) {
                        if (response.status === 'success') {
                            window.location.href = 'http://localhost:8000/user/home';
                        }
                    }
                })
            })
        })
    </script>
@endsection
