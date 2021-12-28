@extends('layouts.app')

@section('content')


    <div class="page-container">
        <h2 class="heading">Create new Company</h2>
        <div class="form-container">
            <form class="employee-form" method="POST" action="/employees/{{$employee->id}}">
                @csrf
                @method('PUT')
                <input type="text" name="username" placeholder="Enter Employee Username" value="{{$employee->username}}">

                <input type="text" name="parent" placeholder="Enter Affiliate code" value="{{$employee->parent}}">

                <input type="submit" class="btn" value="Update">
            </form>

        </div>
        <div class="affiliate-code-container">
            <h2 class="heading">Available Affiliate Codes</h2>
            @foreach($employeeList as $e)
                <div class=affiliate-code">
                    <p><strong>{{$e->username}}</strong></p>
                    <hr>
                </div>
            @endforeach
        </div>
    </div>
@endsection