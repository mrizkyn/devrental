<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();

        if ($user->hasRole('Admin')) {
            return view('home');
        } elseif ($user->hasRole('Customer')) {
            return redirect()->route('customer.index');
        } else {
            return view('home', compact('customer'));
        }
    }

}
