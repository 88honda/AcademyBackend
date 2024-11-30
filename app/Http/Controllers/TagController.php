<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\UserTag;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\DB;

class TagController extends Controller
{
    public function createTag(){

        return view('student.tag.create');
    }
    public function showTagList(){
        
        $tags = Tag::all();
        return view('student.tag.tag', compact('tags'));
    }

    public function storeTag(Request $request){
        DB::beginTransaction();

        try {
            $tag = Tag::where('name', $request['name'])->first();

            if (!$tag) {
                $tag = new Tag();
                $tag->name = $request['name'];

                $tag->save();
            }
        
            $userId = Auth::id();

            $usertags = new UserTag();
            $usertags->user_id = $userId;
            $usertags->tag_id = $tag->id;
            $usertags->save();

            DB::commit();
            return redirect('/tag/create')->with('message', 'タグを追加しました');;

        } catch (\Exception $e) {
            DB::rollBack(); 
            throw new \Exception($e);
        }
        
    }
}
