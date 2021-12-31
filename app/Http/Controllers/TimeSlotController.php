<?php

namespace App\Http\Controllers;

use App\Models\Timeslot;
use Illuminate\Http\Request;

class TimeSlotController extends Controller
{
    public function TimeSlotView()
    {
        $data['allData'] = Timeslot::orderBy('display_order')->where('status', '1')->get();
        return view('admin.time_slot.view_time_slot', $data);
    }
    public function TimeSlotAdd()
    {
        return view('admin.time_slot.create_time_slot');
    }
    public function TimeSlotStore(Request $request)
    {
        $validatedData = $request->validate([
            'start_time' => 'required',
            'end_time' => 'required',
            'display_order' => 'required'
        ]);
        $status = 1;
        $data = new Timeslot();
        $data->start_time = date("g:i a", strtotime($request->start_time));
        $data->end_time = date("g:i a", strtotime($request->end_time));
        $data->display_order = $request->display_order;
        $data->status = $status;
        $data->save();

        $notifications = array(
            'message' => 'Time slot created successfully.',
            'alert-type' => 'success'
        );

        return redirect()->route('time_slot.view')
            ->with($notifications);
    }

    public function TimeSlotEdit($id)
    {
        $data = Timeslot::find($id);
        $editData = [
            'id' => $data->id,
            'start_time' => date("H:i", strtotime($data->start_time)),
            'end_time' => date("H:i", strtotime($data->end_time)),
            'display_order' => $data->display_order
        ];
        return view('admin.time_slot.edit_time_slot', compact('editData'));
    }

    public function TimeSlotUpdate(Request $request, $id)
    {
        $status = 1;
        $data = Timeslot::find($id);
        $data->start_time = date("g:i a", strtotime($request->start_time));
        $data->end_time = date("g:i a", strtotime($request->end_time));
        $data->display_order = $request->display_order;
        $data->status = $status;
        $data->save();

        $notification = array(
            'message' => 'Time slot Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('time_slot.view')->with($notification);
    }



    public function TimeSlotDelete($id)
    {
        $user = Timeslot::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Time slot Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('time_slot.view')->with($notification);
    }
}
