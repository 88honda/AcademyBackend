<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mentor;
use App\Models\TimeSlot;
use App\Models\Reservation;
use App\Http\Requests\ReservationRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; 

class ReservationRequestController extends Controller
{
    public function showMentorReservations(Request $request, $id){
        $mentors = Mentor::find($id);
        $timeslots = Timeslot::where('mentor_id', $id)->get();
        return view('mentor.reservation', compact('timeslots', 'mentors'));
    }

    public function request(Request $request, $id){
        $mentors = Mentor::where('id', $id)->get();
        $timeslots = Timeslot::where('mentor_id', $id)->get();

        return view('mentor.request', compact('timeslots', 'mentors'));
    }
    public function submitReservation(Request $request, $id){
        $timeSlot = TimeSlot::find($id);
        $studentId = auth()->user()->id;

        $reservation = new Reservation();
        $reservation->student_id = $studentId;
        $reservation->time_slot_id = $timeSlot->id;
        $reservation->save();

        $timeSlot->status = "booked";
        $timeSlot->save();

        return redirect('/mentor')->with('message', '予約が申請されました。');
    }
}
