@extends('admin.layouts.master')

@section('title', 'Contact Read Page')

@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="offset-1 col-md-10 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <form>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" disabled id="name"
                                        value="{{ $contact->name }}">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" disabled id="email"
                                        value="{{ $contact->email }}">
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="form-label">Message</label>
                                    <textarea class="form-control" disabled id="message " rows="5" placeholder="Your Message">{{ $contact->message }}</textarea>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
