<?php

namespace App\Http\Controllers;

use App\MapMarker;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class MapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mapMarkers = MapMarker::all();

        return view('map')->with(compact('mapMarkers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Request $request)
    {
        if (Auth::user()->cant('mapMarker.create')) {
            abort(500, 'You don`t have permissions to set the marker.');
        }
        $marker = MapMarker::create($request->all());

        return Response::json($marker);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($id == 'all') {
            $map_markers = MapMarker::all();

            foreach ($map_markers as $map_marker) {
                $map_marker->delete();
            }
        }

        return response(200);
    }
}
