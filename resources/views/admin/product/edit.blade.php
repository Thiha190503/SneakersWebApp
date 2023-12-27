@extends('admin.layouts.master')

@section('title', 'Product Edit Page')

@section('content')
    <div class="main-content">
        <div class="row">
            <div class="col-3 offset-7 mb-2">
                @if (session('updateSuccess'))
                    <div class="">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fa-solid fa-circle-xmark"></i> {{ session('updateSuccess') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="section__content section__content--p30">
            <div class="container-fluid mt-4 bg-white">
                <div class="ms-5">
                    <a href="#" class="mt-3">
                        <i class="fa-solid fa-arrow-left text-dark" onclick="history.back()"></i>
                    </a>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="img-fluid">
                    </div>
                    <div class="col-md-8">
                        <h2>{{ $product->name }}</h2>
                        <div class="mt-3"><strong>Price:</strong> {{ $product->price }}</div>
                        <div class="mt-3"><strong>Category:</strong> {{ $product->category_name }}</div>
                        <div class="mt-3"><strong>Date:</strong> {{ $product->created_at->format('j-F-Y') }}</div>
                        <div class="mt-3"><strong>Description:</strong> {{ $product->description }}</div>
                        <div class="mt-3"><strong>View Count:</strong> {{ $product->view_count }}</div>
                        <div class="mt-3"><strong>Reviews:</strong> {{ count($product->reviews) }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
