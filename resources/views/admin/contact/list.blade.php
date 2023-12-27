@extends('admin.layouts.master')

@section('title', 'Contact List Page')

@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-md-12">

                    @if (session('deleteSuccess'))
                        <div class="col-4 offset-8">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fa-solid fa-circle-xmark"></i> {{ session('deleteSuccess') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    @endif

                    {{-- <div class="row mt-2">
                        <div class="col-1 offset-10 bg-white shadow-sm p-2 text-center">
                            <h3><i class="fa-solid fa-database mr-2"></i>{{ $contacts->total() }}</h3>
                        </div>
                    </div> --}}

                    @if (count($contacts) != 0)
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2 text-center">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contacts as $contact)
                                        <tr class="tr-shadow">
                                            <td>{{ $contact->id }}</td>
                                            <td>{{ $contact->name }}</td>
                                            <td>{{ $contact->email }}</td>
                                            <td>{{ $contact->created_at->format('j-F-Y') }}</td>
                                            <td>
                                                <div class="table-data-feature">
                                                    <a href="{{ route('admin#contactRead', $contact->id) }}">
                                                        <button class="item me-1" data-toggle="tooltip" data-placement="top"
                                                            title="Read">
                                                            <i class="fa-solid fa-eye"></i>
                                                        </button></a>
                                                    <a href="{{ route('admin#contactDelete', $contact->id) }}">
                                                        <button class="item me-1" data-toggle="tooltip" data-placement="top"
                                                            title="Delete">
                                                            <i class="fa-solid fa-trash-can"></i>
                                                        </button>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="mt-3">
                                {{-- {{ $contacts->links() }} --}}
                            </div>
                        </div>
                    @else
                        <h3 class="text-secondary text-center mt-5">There is no Message Here!</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
