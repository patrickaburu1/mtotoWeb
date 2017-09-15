<?php

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;

class UserController extends Controller
{
    //add user
    public function addUser(Request $request){
        $firstname=$request->input('firstname');
        $lastname=$request->input('lastname');
        $phone=$request->input('phone');
        //$id_no=$request->input('id_no');
        $password=bcrypt($lastname);

        $addUser=new Person();
        $addUser->firstName=$firstname;
        $addUser->lastName=$lastname;
        $addUser->phone=$phone;
        $addUser->password=$password;
        $addUser->role=1;
        $addUser->status=0;
        $addUser->Save();

        return Response::json($addUser->id);
    }

    public function login(Request $request){
        $username=$request->input('username');
        $password=$request->input('password');
        //$check_user=User::where([['email','=',$username],['password','=',$password]])->first();
        //$check_user=Person::where('phone','=',$username)->first();
        $check_user=DB::table('people')
                    ->where('phone','=',$username)
            ->first();
      //  return Response::json($check_user);
        if(empty($check_user)){
            $result = array();
            $result['role'] = 0;
            return Response::json($result);
        }else{

            if (Hash::check($password, $check_user->password)) {
              // $person_id= $check_user->id;


               return Response::json($check_user);
            }
            else{
                $result = array();
            $result['role'] = 0;
            return Response::json($result);

            }

    }}

    //get mother id after he login
    public function getMotherId($person_id){
        $mother_id=DB::table('mothers')
            ->where('person_id','=',$person_id)
            ->first();
        //$mother_id1=$mother_id->id;
        return Response::json($mother_id);
    }
}
