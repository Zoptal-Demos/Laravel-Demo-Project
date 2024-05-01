<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Hash;
use Auth;
use DB;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Validator;
use Laravel\Passport\Token;

class RegisterController extends Controller
{
    //
    private function sendMessage($message, $recipients)
    {
        $account_sid = config("twillio.TWILIO_SID");
        $auth_token = config("twillio.TWILIO_AUTH_TOKEN");
        $twilio_number = config("twillio.TWILIO_NUMBER");
        $client = new Client($account_sid, $auth_token);
        $client->messages->create($recipients, 
                ['from' => $twilio_number, 'body' => $message] );
    }
    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            /*'name' 		 =>	'required',*/
            'phoneNumber'		 =>	'required',
            'lat'	 =>	'required',
            'lng'=>	'required',
            'deviceModel'	 =>	'required',
            'deviceType'	 =>	'required',
            'deviceToken' =>	'required',
            'user_type'=>'required'
            ]);
                if ($validator->fails()) {
                        return response()->json(['status'=>false,'code'=>201,'message'=>'All Fields are required']);
                }
                else{
                    /*$otp = rand(1000,9999);*/
                    $otp = 5263;
                    $usercheck = User::where([['phone_number',$request['phoneNumber']],['user_type',$request['user_type']],['user_status',1]])->first();
                    if(!empty($usercheck)){ /* User already registered */

                        try {
                            $this->sendMessage("Your otp for Kangaroo login is ".$otp,'+1'.$request['phoneNumber']);
                        }
                        catch (\Exception $e){
                            /*if($e->getstatusCode == 400){*/
                                return response()->json(['code'=>204,'message'=>'Not a valid phone number']);
                            /*}
                            else{
                                return response()->json(['code'=>204,'message'=>$e->getMessage()]);
                            }*/
                        }

                        User::where([['phone_number',$request['phoneNumber']],['user_type',$request['user_type']],['user_status',1]])->update(['device_model'=>$request['deviceModel'],'device_type'=>$request['deviceType'],'device_token'=>$request['deviceToken'],'otp'=>$otp]);
                        $data['status'] = true;
                        $data['code'] = 200;
                        $data['user_id'] = $usercheck->id;
                        $data['message'] = 'Otp sent';
                        return response()->json($data);
                    }
                    else{ /* User not registered */

                        if($request['name']){

                            try {
                                $this->sendMessage("Your otp for Kangaroo registration is ".$otp,'+1'.$request['phoneNumber']);
                            }
                            catch (\Exception $e){
                                /*if($e->getstatusCode == 400){*/
                                    return response()->json(['code'=>204,'message'=>'Not a valid phone number']);
                                /*}
                                else{
                                    return response()->json(['code'=>204,'message'=>$e->getMessage()]);
                                }*/
                            }

                            $user = User::create(['name'		=>	$request['name'] ? $request['name'] : '',
                                        'phone_number'  =>  $request['phoneNumber'],
                                        'user_type'     =>  $request['user_type'],
                                        'user_status'   =>  0,
                                        'otp'           =>  $otp,
                                        'lat'           =>  $request['lat'],
                                        'lng'           =>  $request['lng'],
                                        'device_model'  =>  $request['deviceModel'],
                                        'device_type'  =>  $request['deviceType'],
                                        'device_token'  =>  $request['deviceToken'],
                                    ]);
                            $data['status'] = true;
                            $data['code'] = 200;
                            $data['user_id'] = $user->id;
                            $data['message'] = 'Otp sent';
                            return response()->json($data);
                        }
                        else{

                            return response()->json(array('code'=>205,'message'=>"Sorry! You are not register with us. Please complete registration process first."));
                        }
                    }
                }
    }
    public function verify_otp(Request $request){

        $validator = Validator::make($request->all(), [
            'otp' 		 =>	'required'
            ],
            [
            'otp.required' 		=>	'otp is required'
            ]);

            if ($validator->fails()) { /* Otp validation error */
                return response()->json(['status'=>false,'code'=>201,'message'=>'otp is required']);
            }

            else{ 

                $usercheck = User::where(['id'=>$request['user_id']])->first(); /* check user exist with given user id */

                if(!empty($usercheck)){ /* if user exist with user id */

                    if($usercheck->user_status == 1){ /* if user already registered and have user status 1 */

                        if($request['otp'] == $usercheck->otp){ /* if otp match */

                            if(isset($request['editprofile']) && $request['editprofile'] == 'editProfile'){ /* if it is a case of edit profile */

                                if(isset($request['address'])){

                                    $user = User::where([['id',$request['user_id']]])->update(['name'=>$request['name'],'phone_number'=>$request['phonenumber'],'address'=>$request['address'],'email'=>$request['email'],'profile_pic'=>$request['profile_pic']]);

                                    return response()->json(array('status'=>true,'code'=>205,'message'=>'User details updated','user_id'=>$request['user_id'],'name'=>$request['name'],'phonenumber'=>$request['phonenumber'],'address'=>$request['address'],'email'=>$request['email'],'profile_pic'=>$request['profile_pic']));
                                }
                                else{

                                    $user = User::where([['id',$request['user_id']]])->update(['name'=>$request['name'],'phone_number'=>$request['phonenumber']]);

                                    return response()->json(array('status'=>true,'code'=>205,'message'=>'User details updated','user_id'=>$request['user_id'],'name'=>$request['name'],'phonenumber'=>$request['phonenumber']));
                                }

                                

                            }

                            Auth::login($usercheck);
                            Auth::user()->tokens->each(function ($token, $key) {
                                $token->delete();
                            });
                            $access_token = Auth::user()->createToken('authToken')->accessToken;
                            User::where(['id'=>$request['user_id']])->update(['auth_token'=>$access_token]);

                            $data['status'] = true;
                            $data['code'] = 200;
                            $data['message'] = 'Otp Verified';
                            $data['data'] = array('access_token'=>$access_token,'user_id'=>$usercheck->id,'name'=>$usercheck->name,'PhoneNumber'=>$usercheck->phone_number,'lat'=>$usercheck->lat,'lng'=>$usercheck->lng);
                            return response()->json($data);

                        }
                        else{ /* if otp not match */
                            return response()->json(['status'=>false,'code'=>201,'message'=>'Wrong otp']);
                        }

                    }
                    elseif($usercheck->user_status == 0){ /* if user already registered but user status is 0 */
                        if($request['otp'] == $usercheck->otp){ /* if otp match */

                            User::where(['id'=>$request['user_id']])->update(['user_status'=>1]); /* This will update user with status 1 */
                            User::where([['phone_number',$usercheck->phone_number],['user_status',0]])->delete();

                            Auth::login($usercheck);
                            Auth::user()->tokens->each(function ($token, $key) {
                                $token->delete();
                            });
                            $access_token = Auth::user()->createToken('authToken')->accessToken;
                            User::where(['id'=>$request['user_id']])->update(['auth_token'=>$access_token]);

                            $data['status'] = true;
                            $data['code'] = 200;
                            $data['message'] = 'Otp Verified';
                            $data['data'] = array('access_token'=>$access_token,'user_id'=>$usercheck->id,'name'=>$usercheck->name,'PhoneNumber'=>$usercheck->phone_number,'lat'=>$usercheck->lat,'lng'=>$usercheck->lng);
                            return response()->json($data);



                        }
                        else{ /* if otp not match */
                            return response()->json(['status'=>false,'code'=>201,'message'=>'Wrong otp']);
                        }
                    }
                }
                else{ /* not found any record with this user id */
                    return response()->json(['status'=>false,'code'=>201,'message'=>'Not founded any record with this user id']);
                }
            }
    }
    public function custom_otp(Request $request){

        $validator = Validator::make($request->all(), [
            'user_id'        => 'required',
            'phonenumber'    => 'required'
            ],
            [
            'user_id.required'      =>  'user_id is required',
            'phonenumber.required' => 'phonenumber is required'
            ]);

            if ($validator->fails()) { /* Otp validation error */
                return response()->json(['status'=>false,'code'=>201,'message'=>'All fields are required']);
            }

            $otp = 5263;
            try {
                $this->sendMessage("Your otp for Kangaroo is ".$otp,'+1'.$request['phonenumber']);
                $user = User::where([['id',$request['user_id']]])->update(['otp'=>5263]);
                if($user){

                    if(isset($request['address'])){

                        return response()->json(['code'=>205,'message'=>'Otp sent','name'=>$request['name'],'phonenumber'=>$request['phonenumber'],'address'=>$request['address'],'email'=>$request['email'],'profile_pic'=>$request['profile_pic']]);
                    }
                    else{

                        return response()->json(['code'=>205,'message'=>'Otp sent','name'=>$request['name'],'phonenumber'=>$request['phonenumber']]);
                    }

                    
                }
                else{
                    return response()->json(['status'=>false,'code'=>201,'message'=>'Not founded any record with this user id']);
                }
            }
            catch (\Exception $e){
                /*if($e->getstatusCode == 400){*/
                    return response()->json(['code'=>204,'message'=>'Not a valid phone number']);
                /*}
                else{
                    return response()->json(['code'=>204,'message'=>$e->getMessage()]);
                }*/
            }
    }
    public function resend_otp(Request $request){



            $validator = Validator::make($request->all(), [
                        'user_id'        => 'required'
                        ],
                        [
                        'user_id.required'      =>  'user_id is required'
                        ]);

            if ($validator->fails()) { /* Otp validation error */
                return response()->json(['status'=>false,'code'=>201,'message'=>'user_id is required']);
            }

            else{ 
                if(isset($request['phonenumber'])){ /* if it is edit profile case */

                    $response = $this->custom_otp($request);
                }

                $usercheck = User::where(['id'=>$request['user_id']])->first(); /* check user exist with given user id */

                if(!empty($usercheck)){ /* if user exist with user id */
                    $otp = 5263;
                    try {
                        $this->sendMessage("Your otp for Kangaroo is ".$otp,'+1'.$usercheck->phone_number);
                    }
                    catch (\Exception $e){
                        /*if($e->getstatusCode == 400){*/
                            return response()->json(['code'=>204,'message'=>'Not a valid phone number']);
                        /*}
                        else{
                            return response()->json(['code'=>204,'message'=>$e->getMessage()]);
                        }*/
                    }

                      $user = User::where([['id',$request['user_id']]])->update(['otp'=>$otp]);
                        $data['status'] = true;
                        $data['code'] = 200;
                        $data['user_id'] = $request['user_id'];
                        $data['message'] = 'Otp sent';
                        return response()->json($data);
                    
                }
                else{   /* if user does not exist with user id */
                    return response()->json(['status'=>false,'code'=>201,'message'=>'Not founded any record with this user id']);
                }
            }
    }

    public function logout(Request $request){

        if(!Auth::guard('api')->check()){
                    return response()->json(['status'=>false,'code'=>203,'message' => 'Your session is expired. Please login again to continue.']);
        }

        $validator = Validator::make($request->all(), [
            'user_id'  => 'required'
        ]);
        if ($validator->fails()) {

            return response()->json(['status'=>false,'code'=>201,'message'=>'All fields are required']);

        }

        else{

            $user = User::where([['id',$request['user_id']]])->first();
            User::where([['id',$request['user_id']]])->update(['device_token'=>'']);
            Token::where('user_id', $user->id)
                ->update(['revoked' => true]);
            return response()->json(['status'=>true,'code'=>200,'message'=>'Logged out']);
        }

    }

    public function delete_account(Request $request){

        if(!Auth::guard('api')->check()){
            return response()->json(['status'=>false,'code'=>203,'message' => 'Your session is expired. Please login again to continue.']);
        }

        $validator = Validator::make($request->all(), [
            'user_id'  => 'required'
        ]);
        if ($validator->fails()) {

            return response()->json(['status'=>false,'code'=>201,'message'=>'All fields are required']);

        }
        else{

            $user = User::where([['id',$request['user_id']]])->first();
            User::where([['id',$request['user_id']]])->update(['device_token'=>'','user_status'=>2]);
            Token::where('user_id', $user->id)->update(['revoked' => true]);
            return response()->json(['status'=>true,'code'=>200,'message'=>'Your Kangaroo account was successfully deleted. Signup again will create a new Kangaroo account.']);
        }
    }
}
