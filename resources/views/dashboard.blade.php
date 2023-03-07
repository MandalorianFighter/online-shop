@extends('layouts.app')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/product_styles.css') }}">

<div class="contact_form">
    <div class="container">
        <div class="row">
            <div class="col-8 card">
                <table class="table table-response">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Body</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="col">1</td>
                            <td scope="col">Mark 1</td>
                            <td scope="col">Mark 2</td>
                            <td scope="col">Mark 3</td>
                        </tr>
                        <tr>
                            <td scope="col">2</td>
                            <td scope="col">Mark 1</td>
                            <td scope="col">Mark 2</td>
                            <td scope="col">Mark 3</td>
                        </tr>
                        <tr>
                            <td scope="col">3</td>
                            <td scope="col">Mark 1</td>
                            <td scope="col">Mark 2</td>
                            <td scope="col">Mark 3</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-4">
                <div class="card">
                    <img src="{{ asset('frontend/images/profile-1.jpg') }}" alt="" class="card-img-top" style="height:90px; width:90px; margin-left:39%;">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{ auth()->user()->name }}</h5>
                    </div>
                    <ul class="list-group list-group-flash">
                        <li class="list-group-item"><a href="{{ route('password.change') }}">Change Password</a></li>
                        <li class="list-group-item">line one</li>
                        <li class="list-group-item">line one</li>
                    </ul>
                    <div class="card-body d-grid gap-2">
                    <a href="{{ route('user.logout') }}" class="btn btn-sm btn-light">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
