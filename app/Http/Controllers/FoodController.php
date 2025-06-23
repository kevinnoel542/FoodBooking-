<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    // List all foods
    public function index()
    {
        $foods = Food::all();
        return view('admin.foods.index', compact('foods'));
    }

    // Show form to create food
    public function create()
    {
        return view('admin.foods.create');
    }

    // Save new food
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);

        Food::create($request->only('name', 'description', 'price'));

        return redirect()->route('admin.foods.index')->with('success', 'Food created successfully!');
    }

    // Show form to edit food
    public function edit(Food $food)
    {
        return view('admin.foods.edit', compact('food'));
    }

    // Update food
    public function update(Request $request, Food $food)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);

        $food->update($request->only('name', 'description', 'price'));

        return redirect()->route('admin.foods.index')->with('success', 'Food updated successfully!');
    }

    // Delete food
    public function destroy(Food $food)
    {
        $food->delete();

        return redirect()->route('admin.foods.index')->with('success', 'Food deleted successfully!');
    }
}
