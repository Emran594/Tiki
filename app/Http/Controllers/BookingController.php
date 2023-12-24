<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Trip;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(){
        $trip = Trip::all();
        $Bookings = Booking::with('trip')->get();
        return view('/book',compact('trip','Bookings'));
    }

    public function create(Request $request)
    {
       // Validate the form data
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'trip_name' => 'required|exists:trips,id',
            'booked_seat' => 'required|string',
        ]);


        Booking::create([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'trip_name' => $request->input('trip_name'),
            'booked_seat' => $request->input('booked_seat'),
        ]);

        // Optionally, you can redirect the user after creating the trip
        return redirect('/booking')->with('success', 'Trip created successfully!');
    }
}
