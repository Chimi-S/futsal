<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Timeslot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function BookingView()
    {
        // $data['allData'] = Timeslot::where('status', '1')->get();
        // return view('admin.time_slot.view_time_slot', $data);
    }
    public function BookingAdd()
    {
        $data['allData'] = Timeslot::where('status', '1')->get();
        return view('user.booking.create_booking', $data);
    }
    public function BookingStore(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required',
            'time_slot_id' => 'required',
        ]);
        $user_id = Auth::user()->id;
        $data = new Booking();
        $data->user_id = $user_id;
        $data->date = $request->date;
        $data->time_slot_id = $request->time_slot_id;
        $data->save();

        $notifications = array(
            'message' => 'You have booked the ground',
            'alert-type' => 'success'
        );

        return redirect()->route('dashboard')
            ->with($notifications);
    }
}
