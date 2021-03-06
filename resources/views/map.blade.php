@extends('layouts.master')

@section('title', 'Google Map')

@section('content')
    <style>
        /* Set the size of the div element that contains the map */
        #map-canvas {
            height: 60%; /* The height is 400 pixels */
            width: 100%; /* The width is the width of the web page */
        }
        body {
            height: 900px;
        }
    </style>
    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('home')}}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Map</li>
        </ol>

        <!-- DataTables Example -->
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class=" card-header">
                        <i class="fas fa-map"></i>
                        Map
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div id="alert"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <form id="setMarker">
                                    <div class="form-row">
                                        <div class="form-group col-6">
                                            <label for="address" class="sr-only"></label>
                                            <input id="address" class="form-control" type="text"
                                                   placeholder="Input address"
                                                   name="address">
                                        </div>
                                        <div class="form-group col-3">
                                            <button type="submit" class="btn btn-primary">Create marker</button>
                                        </div>
                                        <div class="form-group col-3">
                                            <button id="clearAllMarkers" type="button" class="btn btn-danger">Clear all
                                                markers
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">

                                <div id="map-canvas"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page_scripts')
    <script>
        let markers = @json($mapMarkers);
    </script>
    <script src="{{ asset('js/map.js') }}"></script>

@endsection
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC7xUNKXP-6uXwCJytOULJJs8TaqY6-1AQ&width=675&height=400"
        async defer></script>