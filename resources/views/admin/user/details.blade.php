@extends('admin.layouts.master')

@section('title', 'User Details Page')

@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-lg-10 offset-1">
                    <div class="card">
                        <div class="card-body">
                            <div class="ms-5">
                                <a href="#">
                                    <i class="fa-solid fa-arrow-left text-dark fs-5" onclick="history.back()"></i>
                                </a>
                            </div>
                            <div class="card-title">
                                <h3 class="text-center title-2">Account Info</h3>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-3 offset-2 mt-3">
                                    @if ($userData->image == null)
                                        @if ($userData->gender == 'male')
                                            <img src="{{ asset('image/male_default.png') }}"
                                                class="img-thumbnail shadow-sm">
                                        @else
                                            <img src="{{ asset('image/female_default.png') }}"
                                                class="img-thumbnail shadow-sm">
                                        @endif
                                    @else
                                        <img src="{{ asset('storage/' . $userData->image) }}" />
                                    @endif
                                </div>
                                <div class="col-5 offset-1">
                                    <h4 class="my-3">
                                        <i class="fa-solid fa-user-pen me-2"></i> {{ $userData->name }}
                                    </h4>
                                    <h4 class="my-3">
                                        <i class="fa-solid fa-envelope me-2"></i> {{ $userData->email }}
                                    </h4>
                                    <h4 class="my-3">
                                        <i class="fa-solid fa-phone me-2"></i> {{ $userData->phone }}
                                    </h4>
                                    <h4 class="my-3">
                                        <i class="fa-solid fa-address-card me-2"></i> {{ $userData->address }}
                                    </h4>
                                    <h4 class="my-3">
                                        <i class="fa-solid fa-mars-and-venus me-2"></i> {{ $userData->gender }}
                                    </h4>
                                    <h4 class="my-3">
                                        <i class="fa-solid fa-user-clock me-2"></i>
                                        {{ $userData->created_at->format('j.F.Y') }}
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
