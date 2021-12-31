<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Booking;
use App\Models\Timeslot;
use App\Models\User;
use Carbon\Carbon;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use App\Notifications\BookingNotification;

class BookingController extends Controller
{
    public function BookingView()
    {
        //Genearation of one week date
        $array = array();
        $period = new DatePeriod(
            new DateTime(),
            new DateInterval('P1D'),
            new DateTime(Carbon::now()->addWeek(1))
        );
        $usersBook = DB::select(
            "SELECT ts.id,ts.start_time,ts.end_time,b.date,u.name FROM time_slot ts LEFT JOIN booking b ON ts.id = b.time_slot_id LEFT JOIN users u On b.user_id = u.id ORDER BY ts.display_order"
        );
        foreach ($usersBook as $key1 => $book) {
            foreach ($period as $key => $value) {
                $Store = $value->format('Y-m-d');
                $array[$key][$key1]['id'] = $book->id;
                $array[$key][$key1]['start_time'] = $book->start_time;
                $array[$key][$key1]['end_time'] = $book->end_time;
                if ($Store == $book->date) {
                    $array[$key][$key1]['date'] = $book->date;
                    $array[$key][$key1]['is_booked'] = 1;
                    $array[$key][$key1]['name'] = $book->name;
                } else {
                    $array[$key][$key1]['date'] = $Store;
                    $array[$key][$key1]['is_booked'] = 0;
                    $array[$key][$key1]['name'] = " ";
                }
            }
        }
        $data['allData'] = $array;

        return view('user.booking.view_booking', $data);
    }
    public function BookingAdd()
    {
        $data['allData'] = Timeslot::orderBy('display_order')->where('status', '1')->get();
        return view('user.booking.create_booking', $data);
    }
    public function BookingEdit($id, $date)
    {
        $data['allData'] = Timeslot::orderBy('display_order')->where('status', '1')->get();
        return view('user.booking.create_booking', $data);
    }
    public function BookingStore(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required|unique:booking,time_slot_id',
            'time_slot_id' => 'required',
        ]);
        $user_id = Auth::user()->id;
        $data = new Booking();
        $data->user_id = $user_id;
        $data->date = $request->date;
        $data->time_slot_id = $request->time_slot_id;
        $data->save();
        $this->sendNotification($user_id, $request);

        $notifications = array(
            'message' => 'You have booked the ground',
            'alert-type' => 'success'
        );

        return redirect()->route('booking.view')
            ->with($notifications);
    }
    public function GetBookedInfo()
    {
        $data['bookedInfo'] = DB::select("SELECT u.name AS user,DAYNAME(b.date) AS match_day, DATE_FORMAT(b.date, '%b %e %Y') AS match_date,ts.start_time,ts.end_time, DATE_FORMAT(b.created_at, '%b %e %Y') AS booked_on FROM booking b JOIN users u ON b.user_id = u.id JOIN time_slot ts ON b.time_slot_id = ts.id");
        return view('welcome', $data);
    }
    public function GetBookedInfoForAuthUser()
    {
        $data['bookedInfo'] = DB::select("SELECT u.name AS user,DAYNAME(b.date) AS match_day, DATE_FORMAT(b.date, '%b %e %Y') AS match_date,ts.start_time,ts.end_time, DATE_FORMAT(b.created_at, '%b %e %Y') AS booked_on FROM booking b JOIN users u ON b.user_id = u.id JOIN time_slot ts ON b.time_slot_id = ts.id");
        return view('user.index', $data);
    }
    private function sendNotification($user_id, $request)
    {
        $admin = Admin::first();

        $user = User::find($user_id);

        $time_slot = Timeslot::find($request->time_slot_id);

        $details = [
            'greeting' => 'Hi, ' . $admin->name,
            'body' => $user->name . ' has booked ground on ' . $request->date . ' from ' . $time_slot->start_time . ' to ' . $time_slot->end_time . '.',
            'actiontext' => 'Click here to redirect to website',
            'actionurl' => '/',
            'lastline' => 'Have a good day'

        ];
        Notification::send($admin, new BookingNotification($details));
    }
}
