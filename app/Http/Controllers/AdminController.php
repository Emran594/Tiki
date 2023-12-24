<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Trip;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
       $location =  Location::all();
       $trips =  $trips = Trip::with(['fromLocation', 'toLocation'])->get();

        return view('admin',compact('location','trips'));
    }

    public function create(Request $request)
    {
        // Validate the form data
        $request->validate([
            'title' => 'required|string',
            'date' => 'required|date',
            'from' => 'required|exists:locations,id',
            'to' => 'required|exists:locations,id',
            'seats' => 'required|string',
            'status' => 'required|string',
        ]);


        Trip::create([
            'title' => $request->input('title'),
            'date' => $request->input('date'),
            'from' => $request->input('from'),
            'to' => $request->input('to'),
            'seats' => $request->input('seats'),
            'status' => $request->input('status'),
        ]);

        // Optionally, you can redirect the user after creating the trip
        return redirect('/admin')->with('success', 'Trip created successfully!');
    }


    public function delete($id)
    {
        // Find the Trip record by ID
        $trip = Trip::find($id);

        // Check if the record exists
        if (!$trip) {
            return redirect('/admin')->with('error', 'Trip not found.');
        }

        // Perform the deletion
        $trip->delete();

        // Redirect with a success message
        return redirect('/admin')->with('success', 'Trip deleted successfully!');
    }




}
