<?php
namespace App\Http\Controllers;

use id;
use App\Models\Food;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    // Show booking form for user
    public function create()
    {
        $foods = Food::all();
        return view('user.bookings.create', compact('foods'));
    }

    // Store booking
    public function store(Request $request)
{
    // Validate input: foods array is required, quantities required and numeric
    $request->validate([
        'foods' => 'required|array',
        'foods.*.quantity' => 'required|integer|min:1',
    ]);

    // Filter only selected foods
    $selectedFoods = collect($request->input('foods'))->filter(function ($item) {
        return isset($item['selected']) && $item['selected'] == '1';
    });

    if ($selectedFoods->isEmpty()) {
        return back()->withErrors(['foods' => 'Please select at least one food item.'])->withInput();
    }

    // Create booking
    $booking = Booking::create([
        'user_id' => auth()->id(),
        'status' => 'pending',
    ]);

    // Prepare sync data with food_id => quantity
    $syncData = [];
    foreach ($selectedFoods as $foodId => $food) {
        $syncData[$foodId] = ['quantity' => $food['quantity']];
    }

    // Sync foods to booking (pivot with quantity)
    $booking->foods()->sync($syncData);

    return redirect()->route('bookings.my')->with('success', 'Booking submitted!');
}

    // Show user's bookings
    public function myBookings()
    {
        $bookings = Booking::with('foods')->where('user_id', auth()->id())->latest()->get();
        return view('user.bookings.index', compact('bookings'));
    }
    

    ///update booking status
    // List all bookings for admin
public function adminIndex()
{
    $bookings = Booking::with('user', 'foods')->latest()->get();
    return view('admin.bookings.index', compact('bookings'));
}

// Show a single booking and approve/reject form
public function adminEdit(Booking $booking)
{
    $booking->load('user', 'foods');
    return view('admin.bookings.edit', compact('booking'));
}

// Update booking status
public function adminUpdate(Request $request, Booking $booking)
{
    $request->validate([
        'status' => 'required|in:pending,accepted,rejected',
    ]);

    $booking->update(['status' => $request->status]);

    return redirect()->route('admin.bookings.index')->with('success', 'Booking status updated!');
}

}
