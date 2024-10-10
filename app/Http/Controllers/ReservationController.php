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
    public function index(Request $request){
        $role = auth()->user()->role;

        $timeslot = Timeslot::all();
        $status = [
            'available' => '予約可能',
            'booked' => '予約済み',
        ];
        if ($role === 'student') {
            return view('mentor.reservation', compact('timeslot', 'status'));
        } elseif ($role === 'mentor') {
            return view('student.reservation', compact('timeslot', 'status'));
        }
    }
    public function request(Request $request){
        $mentor = Mentor::all();
        
        $timeslot = Timeslot::all();
        $status = [
            'available' => '予約可能',
            'booked' => '予約済み',
        ];
            return view('mentor.request', compact('timeslot', 'status', 'mentor'));
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

    public function submitReservation(Request $request)
    {
        $timeSlotId = $request->input('time_slot');
        $studentId = auth()->user()->id;

        $timeSlot = TimeSlot::find($timeSlotId);
        if ($timeSlot && $timeSlot->status === 'available') {
            $timeSlot->status = 'booked';
            $timeSlot->save();
        } else {
            return redirect('/mentor/request')->withErrors(['time_slot' => 'この予約枠は既に予約済みです。']);
        }

        $reservation = new Reservation();
        $reservation->student_id = $studentId;
        $reservation->time_slot_id = $timeSlotId;
        $reservation->save();

        return redirect('/mentor/reservation')->with('message', '予約が完了しました！');
    }

}
