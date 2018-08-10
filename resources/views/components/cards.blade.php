@extends('layouts.master')

@section('title', 'Cards')

@section('content')

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('home')}}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">Components</li>
            <li class="breadcrumb-item active">Cards</li>
        </ol>

        <div>
            <span>Cards content</span>
        </div>

    </div>

@endsection