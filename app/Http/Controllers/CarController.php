<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $this->authorize('user');
        $cars = Cart::orderBy('id', 'desc')->paginate(15);
        return view('admin.cars.index', compact('cars'));
    }
    public function create(Request $request, Cart $cars)
    {
        $this->authorize($cars, 'create');
        return view('admin.cars.create');
    }
}
