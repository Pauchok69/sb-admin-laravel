@extends('layouts.master')

@section('title', 'Charts')

@section('content')

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('home')}}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Access denied</li>
        </ol>

        <!-- Page Content -->
        <h1 class="display-1">403</h1>
        <p class="lead">Page not found. You can
            <a href="javascript:history.back()">go back</a>
            to the previous page, or
            <a href="{{route('home')}}">return home</a>.</p>

    </div>

@endsection