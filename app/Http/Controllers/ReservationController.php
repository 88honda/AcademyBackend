<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mentor;
use App\Models\TimeSlot;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; 

class ReservationController extends Controller
{
    public function index(Request $request){

        $keyword = $request->input('keyword');

        $query = TimeSlot::query()
            ->where('time_slots.id', 'LIKE', "%{$keyword}%");
            
        $timeslot = $query->get();
        return view('reservation.reservation',compact('timeslot', 'keyword'));
    }
    public function add(Request $request){

        $timeslot = new Timeslot();

        // ログインしているユーザーのnameを取得してTimeslotのnameフィールドに格納
        $timeslot->name = Auth::user()->name;
        // $mentor->name = $request['name'];
        // // $mentor->learning_language = $request['learning_language'];
        // // $mentor->experience_level = $request['experience_level'];
        // $mentor->save();

        $timeslot = new TimeSlot();

        $timeslot->start_time = $request['start_time'];
        $timeslot->end_time = $request['end_time'];
        \Log::debug($request[$timeslot->end_time]);
        $timeslot->status = $request['status'];
        \Log::debug($request[$timeslot->status]);
        $timeslot->save();

        return redirect('/reservation')->with('message', '追加しました');
    }  
    public function edit($id)
    {
        $timeslot = TimeSlot::findOrFail($id);
        $editMode = true;
        $experienceLevels = [
            '' => '---',
            'available' => 'available',
            'booked' => 'booked',
        ];
        return view('/reservation/sign-up', compact('timeslot', 'editMode', 'experienceLevels'));
    }
    public function update(Request $request, $id)
    {

        $timeslot = TimeSlot::find($id);
        $mentor = Mentor::find($timeslot->mentor_id);
        $mentor->name = $request['name'];
        $timeslot->start_time = $request['start_time'];
        $timeslot->end_time = $request['end_time'];
        $timeslot->status = $request['status'];

        $mentor->save();

        $timeslot->save();

        return redirect()->route('reservation')->with('message', '編集しました');
    }

    public function destroy($id)
    {
        $user = TimeSlot::find($id);
        $student = Mentor::find($user->detail_id);
        $student->delete();
        
        return redirect('student')->with('message', '削除しました');
    }

}
