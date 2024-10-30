<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mentor;
use App\Models\TimeSlot;
use App\Models\Reservation;
use App\Http\Requests\ReservationRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; 

class ReservationController extends Controller
{
    public function index(Request $request, $id){
        $role = auth()->user()->role;
        $mentors = Mentor::find($id);
        $timeslots = Timeslot::where('mentor_id', $id)
        ->get();
        $status = [
            'available' => '予約可能',
            'booked' => '予約済み',
        ];
        if ($role === 'student') {
            return view('mentor.reservation', compact('timeslots', 'mentors'));
        } elseif ($role === 'mentor') {
            return view('student.reservation', compact('timeslots', 'status'));
        }
    }
    public function request(Request $request, $id){
        $mentors = Mentor::where('id', $id)
        ->get();
        $timeslots = Timeslot::where('mentor_id', $id)
        ->get();
        $status = [
            'available' => '予約可能',
            'booked' => '予約済み',
        ];
        return view('mentor.request', compact('timeslots', 'status', 'mentors'));
    }

    public function getTimeslots(Request $request) {
        $timeslot = Timeslot::where('mentor_id', $request->mentor_id)->get();
        return response()->json(['timeslots' => $timeslot]);
    }


    public function edit($id)
    {
        $timeslot = TimeSlot::findOrFail($id);
        $editMode = true;
        return view('/reservation/request', compact('timeslot', 'editMode'));
    }

    public function update(ReservationRequest $request, $id)
    {
        
        $timeslot = TimeSlot::find($id);
        $timeslot->mentor_id = Auth::user()->detail_id;
        $timeslot->start_time = $request['start_time'];
        $timeslot->end_time = $request['end_time'];
        $timeslot->save();

        return redirect()->route('reservation')->with('message', '編集しました');
    }

    public function destroy($id)
    {
        $timeslot = TimeSlot::find($id);
        $timeslot->delete();
        
        return redirect('reservation')->with('message', '削除しました');
    }

    public function addRegistration(ReservationRequest $request){
        $timeslot = new Timeslot();

        $timeslot->mentor_id = Auth::user()->detail_id;
        $timeslot->start_time = $request['start_time'];
        $timeslot->end_time = $request['end_time'];
        $timeslot->status = 'available';
        $timeslot->save();

        return redirect('/student/reservation')->with('message', '追加しました');
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
