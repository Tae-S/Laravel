@extends('layouts.app')

@section('content')

    <div class="page-container">
        <h2 class="heading">Create new Company</h2>
        <div class="form-container">
            <form class="employee-form" method="POST" action="/employees">
                @csrf
                <input type="text" name="username" placeholder="Enter Employee Username">

                <input type="text" name="parent" placeholder="Enter Affiliate code">

                <input type="submit" class="btn">
            </form>

        </div>
        <div class="affiliate-code-container">
            <h2 class="heading">Available Affiliate Codes</h2>
            @foreach($employees as $employee)
                <div class=affiliate-code">
                    <p><strong>{{$employee->username}}</strong></p>
                    <hr>
                </div>
            @endforeach
        </div>
    </div>



@endsection
