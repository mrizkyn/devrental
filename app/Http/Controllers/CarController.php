<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        return view('admin.cars.index', compact('cars'));
    }

    public function create()
    {
        return view('admin.cars.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required|integer',
        ]);

        $imagePath = $request->file('img')->store('images', 'public');

        Car::create([
            'name' => $request->name,
            'img' => $imagePath,
            'price' => $request->price,
        ]);

        return redirect()->route('cars.index')
            ->with('success', 'Car created successfully.');
    }

    public function show(Car $car)
    {
        return view('customers.cars.show', compact('car'));
    }

    public function edit(Car $car)
    {
        return view('admin.cars.edit', compact('car'));
    }

    public function update(Request $request, Car $car)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required|integer',
        ]);

        if ($request->hasFile('img')) {
            $imagePath = $request->file('img')->store('images', 'public');
            // Delete the old image
            Storage::disk('public')->delete($car->img);
            $car->img = $imagePath;
        }

        $car->update([
            'name' => $request->name,
            'price' => $request->price,
        ]);

        return redirect()->route('cars.index')
            ->with('success', 'Car updated successfully.');
    }

    public function destroy(Car $car)
    {
        Storage::disk('public')->delete($car->img);
        $car->delete();

        return redirect()->route('cars.index')
            ->with('success', 'Car deleted successfully.');
    }
}
