<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CardsController extends Controller
{
    /** Show the application components/cards.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('components.cards');
    }
}
