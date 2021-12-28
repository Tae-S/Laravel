@extends('layouts.app')

@section('content')

    <div class="page-container">
        <h2 class="heading">Employees with us</h2>
        <div class="employees-list-container">
            <div class="btn-container top-btn">
                <a class="btn" href="employees/create">Register new Employee</a>
            </div>
            <div class="employees-list">
                @foreach($employees as $employee)
                    <span class="employee-username">{{$employee->username}}</span>
                    <div class="btn-container" style="float:right;">
                        <a class="btn" href="employees\{{$employee->id}}\edit">Edit &crarr;</a>

                        <form method="post"action="/employees/{{$employee->id}}">
                            @csrf
                            @method('delete')


                            <input type="submit" value="Delete &crarr;" class="btn">

                        </form>
                    </div>

                    <p class="employee-amount"><strong>{{$employee->amount}}</strong> <span class="employee-static-field">: Amount</span></p>
                    <p class="employee-parent"><strong>{{$employee->parent}}</strong> <span class="employee-static-field">: Parent</span></p>

                    <hr class="company-hr">
                @endforeach
            </div>

        </div>
    </div>





@endsection
