<?php

namespace App\Http\Controllers;

use App\Child;
use App\ChildImmunization;
use App\Height;
use App\Mother;
use App\sms\AfricasTalkingGateway;
use App\sms\AfricasTalkingGatewayException;
use App\Weight;
use App\Person;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;


class ApiController extends Controller
{
    //show list of mothers
    public function mothers(Request $request){
        try {

            $mothers = DB::table('mothers')
                ->orderBy('id','desc')
                ->get();

            return Response::json($mothers);

        } catch (Exception $e) {

        }}

    //Register Mother
    public function registerMother(Request $request){
        try {
            $fname=$request->input('fname');
            $lname=$request->input('lname');
            $phone=$request->input('phone');
            $county=$request->input('county');
            $district=$request->input('district');
            $division=$request->input('division');
            $location=$request->input('location');
            $town=$request->input('town');
            $village=$request->input('village');

//            $firstname=$request->input('firstname');
//            $lastname=$request->input('lastname');
//            $phone=$request->input('phone');
            //$id_no=$request->input('id_no');
            $password=bcrypt($lname);

            $addUser=new Person();
            $addUser->firstName=$fname;
            $addUser->lastName=$lname;
            $addUser->phone=$phone;
            $addUser->password=$password;
            $addUser->role=1;
            $addUser->status=0;
            $addUser->Save();

            //return Response::json($addUser->id);
            $person_id=$addUser->id;

            $newMother = new Mother();
            $newMother->firstName = $fname;
            $newMother->lastName = $lname;
            $newMother->phone_no = $phone;
            $newMother->county = $county;
            $newMother->district = $district;
            $newMother->division = $division;
            $newMother->location = $location;
            $newMother->town = $town;
            $newMother->village = $village;
            $newMother->person_id = $person_id;
            $newMother->Save();

            return Response::json($newMother);

        } catch (Exception $e) {

        }
    }

    public function registerChild(Request $request){
        try {
            $fname=$request->input('fname');
            $lname=$request->input('lname');
            //$gender=$request->input('gender');
            $dob=$request->input('dob');
            $weight=$request->input('weight');
            $height=$request->input('height');
            $motherId=$request->input('motherid');

            $newChild=new Child();
            $newChild->firstName = $fname;
            $newChild->lastName = $lname;
            $newChild->gender = 1;
            $newChild->dob = $dob;
            $newChild->weight = $weight;
            $newChild->length = $height;
            $newChild->mother_id = $motherId;

        $newChild->Save();
        return Response::json($newChild);

    } catch (Exception $e) {

}

    }

    //list of children
    public function children(Request $request){
        try {

            $children = DB::table('children')
                ->orderBy('id','desc')
                ->get();

            return Response::json($children);

        } catch (Exception $e) {

        }}

    //list of children for loggedin mother
    public function getMothersChildren($mother_id){
        try {

            $children = DB::table('children')
                ->where('mother_id','=',$mother_id)
                ->orderBy('id','desc')
                ->get();

            return Response::json($children);

        } catch (Exception $e) {

        }}

        //get height of a child

        public function height($child_id){
        try{
            $height = DB::table('heights')
                ->where('child_id','=',$child_id)
                ->get();

            return Response::json($height);

        }
        catch (Exception $e) {

        }
        }

    //get weight of child
    public function weight($child_id){
        try{
            $weight = DB::table('weights')
                ->where('child_id','=',$child_id)
                ->get();

            return Response::json($weight);

        }
        catch (Exception $e) {

        }
    }

    //get immunizations not given
    public function getImmunization(Request $request){
        try{
            $immunization = DB::table('immunizations')
                ->get();

            return Response::json($immunization);

        }
        catch (Exception $e) {

        }
    }

    //give immunization
    public function giveImmunization(Request $request){
        $child_id=$request->input('child_id');
        $immunization_id=$request->input('immunization_id');
        $next_visist=$request->input('nextvisit');

        $mytime = Carbon::today();

        $date_given= $mytime->toDateString();

        $giveImmunization=new ChildImmunization();
        $giveImmunization->immunization_id=$immunization_id;
        $giveImmunization->child_id=$child_id;
        $giveImmunization->next_visit=$next_visist;
        $giveImmunization->given_at=$date_given;
        $giveImmunization->Save();

        //send message to the Mother
        $child_id=$request->input('child_id');

        $next_visist=$request->input('nextvisit');

        $childDetails=DB::table('children')
            ->where('id','=',$child_id)
            ->first();

        $childName=$childDetails->firstName;

        $motherDetails=DB::table('mothers')
            ->where('id','=',$childDetails->mother_id)
            ->first();

        $motherName=$motherDetails->firstName;

        $mothersPhone=$motherDetails->phone_No;

        $recipients=$mothersPhone;

        $message="Hi, ".$motherName." this is to inform you that the next immunization date for your child "
            .$childName." will be on ".$next_visist.". Please avail yourself";

        $username   = "patrickaburu";
        $apikey     = "75d1187a13d406cb9357f7fcb5d474cfdacb5a5ce90a87768c2cdbb325d95625";

        $gateway    = new AfricasTalkingGateway($username, $apikey);

        try
        {
            // Thats it, hit send and we'll take care of the rest.
            $results = $gateway->sendMessage($recipients, $message);
//return redirect('sms')-> with('status','messasge sent successfully');
            foreach($results as $result) {
                // status is either "Success" or "error message"

            }
        }
        catch ( AfricasTalkingGatewayException $e )
        {
            //  echo "Encountered an error while sending: ".$e->getMessage();
           // return Response::json($e->getMessage());
        }


        return Response::json($giveImmunization);
    }

    //record weight of child
    public function recordWeight(Request $request){
        $child_id=$request->input('child_id');
        $weightvalue=$request->input('weight');

        $weight=new Weight();
        $weight->weight=$weightvalue;
        $weight->child_id=$child_id;

        $weight->Save();

        return Response::json($weight);
    }
//record height
    public function recordHeight(Request $request){
        $child_id=$request->input('child_id');
        $heightvalue=$request->input('height');

        $height=new Height();
        $height->height=$heightvalue;
        $height->child_id=$child_id;

        $height->Save();

        return Response::json($height);
    }

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

    //show last nurse last immunization given
    public function lastImmunizationGiven($child_id){
      $lastImmunization=DB::table('child_immunizations')
          ->join('immunizations','child_immunizations.immunization_id','=','immunizations.id')
          ->select(DB::raw('child_immunizations.id,immunizations.name,child_immunizations.next_visit'))
          ->where('child_immunizations.child_id','=',$child_id)
         ->orderby('id','desc')
          ->first();
      return Response::json($lastImmunization);
    }

    //list of all immunizations given to a child
    public function allImmunizationGiven($child_id){
        $immunizationsGiven=DB::table('child_immunizations')
            ->join('immunizations','child_immunizations.immunization_id','=','immunizations.id')
            ->select(DB::raw('child_immunizations.id,immunizations.name,child_immunizations.next_visit,given_at,immunizations.age'))
            ->where('child_immunizations.child_id','=',$child_id)
            ->get();

        return Response::json($immunizationsGiven);
    }

    //get list of immunizatio not given to  particular child where to clause

    /**
     * @param $child_id
     * @return mixed
     */
    public function immunizationdNotGiven($child_id){
        
        $immunizationsGiven=DB::table('child_immunizations')
            ->select(DB::raw('immunization_id'))
            ->where('child_immunizations.child_id','=',$child_id)
            ->pluck('immunization_id');


  ///    return Response::json($immunizationsGiven);

            $immunizationsNotGiven=DB::table('immunizations')
                ->whereNotIn('id',$immunizationsGiven)
                   // ->whereIn('id', $immunizationsGiven)
                ->select(DB::raw('id,name,age'))
                ->get();




        return Response::json($immunizationsNotGiven);
    }
}
