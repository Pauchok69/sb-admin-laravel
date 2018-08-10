@extends('layouts.master')

@section('title', 'Navbar')

@section('content')

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('home')}}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">Components</li>
            <li class="breadcrumb-item active">Navbar</li>
        </ol>

        <div>
            <span>Navbar content</span>
        </div>

    </div>

@endsection