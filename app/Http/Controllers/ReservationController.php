<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mentor;
use App\Models\TimeSlot;
use App\Models\User;
use App\Http\Requests\ReservationRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; 

class ReservationController extends Controller
{
    public function index(Request $request){

        $timeslot = Timeslot::all();
        $status = [
            'available' => '予約可能',
            'booked' => '予約済み',
        ];
        return view('reservation.reservation',compact('timeslot', 'status'));
    }
    public function add(ReservationRequest $request){

        $timeslot = new Timeslot();

        $timeslot->mentor_id = Auth::user()->detail_id;
        $timeslot->start_time = $request['start_time'];
        $timeslot->end_time = $request['end_time'];
        $timeslot->status = 'available';
        $timeslot->save();

        return redirect('/reservation')->with('message', '追加しました');
    }  
    public function edit($id)
    {
        $timeslot = TimeSlot::findOrFail($id);
        $editMode = true;
        return view('/reservation/sign-up', compact('timeslot', 'editMode'));
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

}
