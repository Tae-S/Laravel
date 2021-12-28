@extends('layouts.app')

@section('content')

    <div class="page-container">
        <h2 class="heading">Create new Company</h2>
        <div class="form-container">
            <form class="company-form" method="POST" action="/companies/{{$company->id}}">
                @csrf
                @method('PUT')
                <input type="text" name="name" placeholder="Enter Company name" value="{{$company->name}}">
                <input type="text" name="status" placeholder="Enter Company status" value="{{$company->status}}">
                <input type="email" name="email" placeholder="Enter Company email" value="{{$company->email}}">
                <input type="file" name="logo" placeholder="Upload Company logo" value="{{$company->logo}}">
                <input type="submit" class="btn" value="Update">
            </form>

        </div>
    </div>


@endsection