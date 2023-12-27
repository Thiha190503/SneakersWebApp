@extends('admin.layouts.master')

@section('title', 'Product Update Page')

@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-lg-10 offset-1">
                    <div class="card">
                        <div class="card-body">
                            <div class="ms-5">
                                <a href="#">
                                    <i class="fa-solid fa-arrow-left text-dark" onclick="history.back()"></i>
                                </a>
                            </div>
                            <div class="card-title">
                                <h3 class="text-center title-2">Update Product</h3>
                            </div>

                            <hr>
                            <form action="{{ route('product#update', $product->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-4 offset-1">
                                        <input type="hidden" name="productId" value="{{ $product->id }}">
                                        <img src="{{ asset('storage/' . $product->image) }}"
                                            class="img-thumbnail shadow-sm" />

                                        <div class="mt-3">
                                            <input type="file" name="productImage"
                                                class="form-control @error('productImage') is-invalid @enderror">
                                            @error('productImage')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="mt-3">
                                            <button class="btn bg-dark text-white col-12" type="submit">
                                                <i class="fa-solid fa-circle-chevron-right me-1"></i> Update
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row col-5">
                                        <div class="form-group">
                                            <label class="control-label mb-1">Name</label>
                                            <input id="cc-pament" name="productName" type="text"
                                                value="{{ old('productName', $product->name) }}"
                                                class="form-control @error('productName') is-invalid @enderror"
                                                aria-required="true" aria-invalid="false" placeholder="Enter Name...">
                                            @error('productName')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label mb-1">Description</label>
                                            <textarea name="productDescription" class="form-control @error('productDescription') is-invalid @enderror"
                                                id="" cols="30" rows="10" placeholder="Enter productDescription">{{ old('productDescription', $product->description) }}</textarea>
                                            @error('productDescription')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label mb-1">Category</label>
                                            <select name="productCategory"
                                                class="form-control @error('productCategory') is-invalid @enderror">
                                                <option value="">Choose Category...</option>
                                                @foreach ($category as $c)
                                                    <option value="{{ $c->id }}"
                                                        @if ($product->category_id == $c->id) selected @endif>
                                                        {{ $c->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('productCategory')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label mb-1">Price</label>
                                            <input id="cc-pament" name="productPrice" type="number"
                                                value="{{ old('productPrice', $product->price) }}"
                                                class="form-control @error('productPrice') is-invalid @enderror"
                                                aria-required="true" aria-invalid="false" placeholder="Enter Price...">
                                            @error('productPrice')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label mb-1">Waiting Time</label>
                                            <input id="cc-pament" name="productWaitingTime" type="number"
                                                value="{{ old('productWaitingTime', $product->waiting_time) }}"
                                                class="form-control @error('productWaitingTime') is-invalid @enderror"
                                                aria-required="true" aria-invalid="false"
                                                placeholder="Enter Waiting Time...">
                                            @error('productWaitingTime')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label mb-1">View Count</label>
                                            <input id="cc-pament" name="viewCount" type="number"
                                                value="{{ old('viewCount', $product->view_count) }}" class="form-control"
                                                aria-required="true" aria-invalid="false" disabled
                                                placeholder="Enter  View Count...">
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label mb-1">Created Date</label>
                                            <input id="cc-pament" name="created_at" type="text" class="form-control"
                                                value="{{ $product->created_at->format('j-F-Y') }}" aria-required="true"
                                                aria-invalid="false" disabled>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
