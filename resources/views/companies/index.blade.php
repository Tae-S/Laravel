@extends('layouts.app')


@section('content')

    <div class="page-container">
        <h2 class="heading">Companies with us</h2>
        <div class="companies-list-container">
            <div class="btn-container top-btn">
                <a class="btn" href="companies/create">Add new COMPANY</a>
            </div>
            <div class="companies-list">
                @foreach($companies as $company)
                <span class="company-name">{{$company->name}}</span>
                <div class="btn-container" style="float:right;">
                    <a class="btn" href="companies\{{$company->id}}\edit">Edit &crarr;</a>

                    <form method="post"action="/companies/{{$company->id}}">
                        @csrf
                        @method('delete')


                            <input type="submit" value="Delete &crarr;" class="btn">

                    </form>
                </div>

                    <p class="company-status"><strong>{{$company->status}}</strong> <span class="company-static-field"> : Status</span></p>
                    <p class="company-email"><strong>{{$company->email}}</strong> <span class="company-static-field"> : Email</span></p>
                    <p class="company-logo-p"><img src="{{$company->logo}}" class="company-logo"> <span class="company-static-field"> : Logo</span></p>
                    <hr class="company-hr">
                @endforeach
            </div>

        </div>
    </div>


@endsection