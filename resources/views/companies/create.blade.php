@extends('layouts.app')

@section('content')
    <div class="page-container">
        <h2 class="heading">Create new Company</h2>
        <div class="form-container">
            <form class="company-form" method="POST" action="/companies" enctype="multipart/form-data">
                @csrf
                <input type="text" name="name" placeholder="Enter Company name">
                <input type="text" name="status" placeholder="Enter Company status">
                <input type="email" name="email" placeholder="Enter Company email">
                <input type="file" name="logo" placeholder="Upload Company logo">
                <input type="submit" class="btn">
            </form>

        </div>
    </div>


@endsection;