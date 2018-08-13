@extends('layouts.master')

@section('title', 'Charts')

@section('content')

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('home')}}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Forbidden</li>
        </ol>

        <!-- Page Content -->
        <h1 class="display-1">403</h1>
        <p class="lead">Credentials error.</p>

    </div>

@endsection