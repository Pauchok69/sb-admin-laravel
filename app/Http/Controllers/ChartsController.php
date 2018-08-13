<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChartsController extends Controller
{
    /** Show the application charts.
     *https://www.google.com.ua/webhp?hl=ru&sa=X&sqi=2&pjf=1&ved=0ahUKEwiR6pzCxufcAhUlMn0KHRGXBewQPAgDmailtrap laravel
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $this->authorize('charts.view');

        return view('charts');
    }
}
