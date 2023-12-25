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

        // Find the selected trip
        $selectedTrip = Trip::findOrFail($request->input('trip_name'));

        // Check if there are enough available seats
        $availableSeats = $selectedTrip->seats - $selectedTrip->bookings->sum('booked_seat');

        if ($request->input('booked_seat') > $availableSeats) {
            // If there are not enough seats, return with an error message
            return redirect('/booking')->with('error', 'Not enough available seats for this trip.');
        }

        // Create the booking
        Booking::create([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'trip_name' => $request->input('trip_name'),
            'booked_seat' => $request->input('booked_seat'),
        ]);

        // Optionally, you can update the available seats for the trip
        $selectedTrip->update([
            'seats' => $availableSeats - $request->input('booked_seat'),
        ]);

        // Redirect the user after creating the booking
        return redirect('/booking')->with('success', 'Booking created successfully!');
    }

    public function view($id){
        $single = Booking::with('trip')->find($id);
        return view('view',compact('single'));
    }

    public function delete($id)
    {
        $trip = Booking::find($id);
        if (!$trip) {
            return redirect('/booking')->with('error', 'Trip not found.');
        }
        $trip->delete();
        return redirect('/booking')->with('success', 'Trip deleted successfully!');
    }
}
