<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class ReportController extends Controller
{
    public function getNextVisit(Request $request,$mother_id){

        $child_id=DB::table('children')
            ->select(DB::raw('id'))
            ->where('mother_id','=',$mother_id)
            ->pluck('id');

        $nextVisit=DB::table('child_immunizations')
          //  ->whereNotIn('child_id',$immunizationsGiven)
             ->join('children','child_immunizations.child_id','=','children.id')
             ->whereIn('child_id', $child_id)
            ->where('child_id','=',$child_id)
            ->select(DB::raw('next_visit,children.firstName,child_immunizations.id'))
            ->orderby('child_immunizations.id','asc')
            ->first();

        return Response::json($nextVisit);
    }
// report
    public function monthlyReport(Request $request){

        $immunizations=DB::table('immunizations')
            ->select(DB::raw('id'))
            ->pluck('id');

        $no=DB::table('child_immunizations')
            ->join('immunizations','child_immunizations.immunization_id','=','immunizations.id')
          //  ->whereIn('immunization_id', $immunizations)
            ->where('immunization_id','=', $immunizations)
            ->select(DB::raw('given_at'))
            ->groupBy('child_immunizations.immunization_id')
            ->groupBy('given_at')
            ->count();

//        $nos = array();
//        $nos['numbers'] = $no;
//        //$nos->toArray();

        $rep=DB::table('child_immunizations')
            ->join('immunizations','child_immunizations.immunization_id','=','immunizations.id')
            //->whereIn('immunization_id', $immunizations)
            ->where('immunization_id','=', $immunizations)
            ->select(DB::raw('given_at,immunizations.name'))
            ->groupBy('child_immunizations.immunization_id')
            ->groupBy('given_at')
            ->groupBy('immunizations.name')
            //->count();
           ->get();

        foreach ($rep as $data){
            $data1['given_at']=$data->given_at;
            $data1['name']=$data->name;
            $data1['number']=$no;
            $d[]=$data1;
        }

//        $result = array();
//        $result['numbers'] = $no;
//        $result['r']=$rep;


        return Response::json($d);
    }
    public function test(Request $request){
//        $rep=DB::table('child_immunizations')
//            ->get();
        $rep=DB::table('immunizations')
            ->select(DB::raw('id'))
            ->pluck('id');

        foreach ($rep as $id) {


            $count = DB::table('child_immunizations')
                //->join('immunizations','child_immunizations.immunization_id','=','immunizations.id')
                //  ->whereIn('immunization_id', $immunizations)
                ->where('immunization_id', '=', $id)
                // ->where('date_given','=', $rep->date_given)
//            ->select(DB::raw('given_at'))
//            ->groupBy('child_immunizations.immunization_id')
//            ->groupBy('given_at')
                ->count();

             $data=DB::table('child_immunizations')
                ->join('immunizations','child_immunizations.immunization_id','=','immunizations.id')
                //->whereIn('immunization_id', $immunizations)
                ->where('immunization_id','=', $id)
                ->select(DB::raw('given_at,immunizations.name'))
                ->groupBy('child_immunizations.immunization_id')
                ->groupBy('given_at')
                ->groupBy('immunizations.name')
                //->count();
                ->first();
            $date[]=$data->given_at;
            $name[]=$data->name;

            $count1[]=$count;
         }

        foreach(array_combine($count1,$name) as $key=>$value) {
            $data2['name']=$key;
            $data2['number']=$value;
           // $d[]=$data2;
        }

        $keysOne = array_keys($count1);
        $keysTwo = array_keys($name);

        $min = min(count($count1), count($name));

        for($i = 0; $i < $min; $i++) {
//            echo $count1[$keysOne[$i]] . "<br>";
//            echo $name[$keysTwo[$i]] . "<br><br>";
            $data2['number']=$count1[$keysOne[$i]];
            $data2['name']=$name[$keysTwo[$i]];
            $d[]=$data2;
        }

        return Response::json($d);
    }

}
