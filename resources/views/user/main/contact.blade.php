@extends('user.layouts.master')

@section('title', 'Contact Page')

@section('content')
    <div class="container mt-5">
        <div class="ml-2 my-3">
            <a href="#">
                <i class="fa-solid fa-arrow-left text-dark fs-5" onclick="history.back()"></i>
            </a>
        </div>

        @if (session('contactSuccess'))
            <div class="col-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fa-solid fa-circle-xmark"></i> {{ session('contactSuccess') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif

        <div class="card">
            <div class="card-title mt-3">
                <h2 class="text-center">Contact Us</h2>
            </div>

            <hr>

            <div class="card-body">
                <form method="post" action="{{ route('user#contactMessage') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="contactName" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="contactEmail" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea class="form-control" id="message" name="contactMessage" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
