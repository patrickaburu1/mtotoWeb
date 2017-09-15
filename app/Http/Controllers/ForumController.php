<?php

namespace App\Http\Controllers;

use App\Forum;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class ForumController extends Controller
{
    //send message to forum
    public function postForum(Request $request,$mother_id)
    {

        $message = $request->input('message');
       // $mother_id = $request->input('mother_id');

        $mydate = Carbon::today();
        $date = $mydate->toDateString();

        $forum = new Forum();
        $forum->message = $message;
        $forum->mother_id = $mother_id;
        $forum->date = $date;
        $forum->save();


        return Response::json($forum);
    }


    //get the last 20 message
    public  function getMessages(){
        $messages=DB::table('forums')
            ->join('mothers','forums.mother_id','=','mothers.id')
            ->select(DB::raw('forums.*,mothers.firstName'))
            ->orderby('forums.id','desc')
            ->get();

        return Response::json($messages);

    }
}
