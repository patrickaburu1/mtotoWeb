<?php

namespace App\Http\Controllers;

use App\Person;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebController extends Controller
{
    public function newUser(Request $request){
        return view('registerNewUser');
    }

    public function registerUser(Request $request){

        $password=bcrypt($request->idno);

        $user=new Person();
        $user->firstName=$request->fullname;
        $user->lastName=$request->lastName;
        $user->phone=$request->phone;
        $user->password=$password;
        $user->role=2;
        $user->status=0;
        $user->save();

        return redirect('home')->with('status','Succesfully Registered');

    }

    //list of user to block
    public function endUsers(Request $request){

        $users=DB::table('people')
            ->where([['role', '=',2],['status','=',0]])
            ->get();

        return view('listUsers',['user'=>$users]);
    }

    //block user
    public function blockUser($id){

        $users=Person::find($id);
        $users->status=1;
        $users->save();

        return redirect('blockUser')->with('status','Successfully Done');

    }
}
