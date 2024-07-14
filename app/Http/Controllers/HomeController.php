<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Car;
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

        $totalTransactions = Transaction::where('status', 'Complete')->sum('price');

        $totalCars = Car::count();

        if ($user->hasRole('Admin')) {
            return view('admin.index', compact('totalTransactions', 'totalCars'));
        } elseif ($user->hasRole('Customer')) {
            return redirect()->route('customer.index');
        } else {
            return view('home', compact('customer'));
        }
    }



}
