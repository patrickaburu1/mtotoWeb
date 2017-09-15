<?php

namespace App\Http\Controllers;
use App\Child;
use App\sms\AfricasTalkingGateway;
use App\sms\AfricasTalkingGatewayException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class SmsController extends Controller
{

    // send sms when umminization given

    public function sendSms(Request $request){

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
            .$childName." will be on ".$next_visist." Please avail yourself";

        //return Response::json($message);

        // $recipients=$request->input('phone_number');
        //$recipients="+254710446176";

        //$txt=$request->input('txt');
        // $message=$txt."
        // SENT BY   ".$name;

        //$message="hello";
        //  require_once('AfricasTalkingGateway.php');
        // Specify your login credentials
        $username   = "patrickaburu";
        $apikey     = "75d1187a13d406cb9357f7fcb5d474cfdacb5a5ce90a87768c2cdbb325d95625";
        // Specify the numbers that you want to send to in a comma-separated list
        // Please ensure you include the country code (+254 for Kenya in this case)
        //    $recipients = "+254723108293";
        // And of course we want our recipients to know what we really do
        //        $message    = "Evening Sir";
        // Create a new instance of our awesome gateway class
        $gateway    = new AfricasTalkingGateway($username, $apikey);
        // Any gateway error will be captured by our custom Exception class below,
        // so wrap the call in a try-catch block
        try
        {
            // Thats it, hit send and we'll take care of the rest.
            $results = $gateway->sendMessage($recipients, $message);
//return redirect('sms')-> with('status','messasge sent successfully');
            foreach($results as $result) {
                // status is either "Success" or "error message"

            }
            return Response::json($results);


        }
        catch ( AfricasTalkingGatewayException $e )
        {
          //  echo "Encountered an error while sending: ".$e->getMessage();
            return Response::json($e->getMessage());
        }
        // DONE!!!
    }
}
