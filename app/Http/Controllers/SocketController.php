<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Auth;
use Config;

class SocketController extends Controller
{
    
	public function authenticate(Request $request){ /* To authenticate */

        /*if($request['accessToken'] == ''){

            return response()->json(['status'=>false,'code'=>201,'message'=>'accessToken cannot be empty']);
        }

        $user = User::where([['auth_token',$request['accessToken']]])->first();
        if(!empty($user)){

            return response()->json(['status'=>true,'code'=>200,'message'=>'Authentication successfull']);

        }
        else{

            return response()->json(['status'=>false,'code'=>201,'message'=>'Authentication Failed']);

        }*/

        if(!Auth::guard('api')->check()){

			return response()->json(array('status'=>false,'code'=>203,'message' => 'Authentication Failed'));

        }
        else{

			User::where([['auth_token',$request['accessToken']]])->update(['socket_id'=>$request['socket_id']]);
            return response()->json(['status'=>true,'code'=>200,'message'=>'Authentication successfull']);
            
        }

    }

    public function send_message(Request $request){ /* To send message */

		/*if(!Auth::guard('api')->check()){
			return response()->json(array('status'=>false,'code'=>203,'message' => 'Session Expired'));
		}*/
		$validator = Validator::make($request->all(), [
            'from' 		 =>	'required',
            'to'         => 'required',
            'message'           => 'required',
            'time'           => 'required',
            ]);
        if ($validator->fails()) {

            return response()->json(array('status'=>false,'code'=>201,'message'=>'All fields are required'));

        }
        else{

        	$chat = Chat::with(['from_user'])->where([['from_id',$request['from']],['to_id',$request['to']]])->orWhere([['from_id',$request['to']],['to_id',$request['from']]])->first();
        	$conversion_id = '';
        	if(!empty($chat)){

        		$conversion_id = $chat->conversion_id;

        	}
        	else{

        		$conversion_id = time().rand(0,100000);

        	}
        	$chat = Chat::create(['conversion_id'=>$conversion_id,
        						'from_id'=>$request['from'],
	        					'to_id'=>$request['to'],
	        					'message'=>$request['message'],
	        					'time'=>$request['time']]);
        	if($chat){
                $data['message'] = $request['message'];
                $data['chat_id'] = $chat->id;
                $data['profile_pic'] = $chat['from_user']->profile_pic != '' ? asset('public/images/'.$chat['from_user']->profile_pic) : asset('public/images/default_user.png');
                $data['from_id'] = $request['from'];
                $data['to_id'] = $request['to'];
                $data['time'] = date('g:i A',$request['time']);
				$data['time2'] = $request['time'];
                $data['is_sender'] = 1;

				/* Receiver Data starts */

				$receiver_data['receiver'] = $request['to'];
				$receiver_data['receiver_name'] = $chat['to_user']->name;
				$receiver_data['receiver_socket_id'] = $chat['to_user']->socket_id;
				$receiver_data['sender'] = $request['from'];
				$receiver_data['sender_name'] = $chat['from_user']->name;
				$receiver_data['time'] = date('g:i A',$request['time']);
				$receiver_data['time2'] = $request['time'];
				$receiver_data['chat_id'] = $chat->id;
				$receiver_data['conversion_id'] = $conversion_id;
				$receiver_data['profile_pic'] = $chat['from_user']->profile_pic != '' ? asset('public/images/'.$chat['from_user']->profile_pic) : asset('public/images/default_user.png');
				/*$receiver_data['receiver_profile_pic'] = $chat['to_user']->profile_pic != '' ? asset('public/images/'.$chat['to_user']->profile_pic) : asset('public/images/default_user.png');*/
				$receiver_data['message'] = $request['message'];

				/* Receiver Data ends */

				$user = User::where([['id',$request['to']]])->first();
				/* Send Notification starts */

				$push['serverKey'] = config('fcm.FCM_SERVER_KEY');
				$push['device_token'] = $user->device_token;
				$push['title']           = 'Team Kangaroo';
				$push['body']            = 'You have new message from '.$chat['from_user']->name;
				$push['data']['type']            = 'NEW_MESSAGE';
				$push['data']['sender_id']       = $data['from_id'];
				$push['data']['receiver_id']     = $data['to_id'];
				$push['data']['conversion_id']   = $conversion_id;
				send_notification($push);

				/* Send Notification ends */

        		return response()->json(array('status'=>true,'code'=>200,'message'=>'Message Sent!','data'=>$data,'receiverData'=>$receiver_data,'conversion_id'=>$conversion_id,'receiver_socket_id'=>$receiver_data['receiver_socket_id']));

        	}
        	else{

        		return response()->json(array('status'=>false,'code'=>201,'message'=>'Internal Server Error'));

        	}

        }

	}

	public function get_messages(Request $request){ /* To get message of particular chat */

		/*if(!Auth::guard('api')->check()){
			return response()->json(array('status'=>false,'code'=>203,'message' => 'Session Expired'));
		}*/

		$validator = Validator::make($request->all(), [
            'userId' 		 =>	'required',
            'loggedInUser'         => 'required',
            'skip'           => 'required',
            'limit'           => 'required',
            'timezone'		=> 'required'
            ]);
        if ($validator->fails()) {

            return response()->json(array('status'=>false,'code'=>201,'message'=>'All fields are required'));

        }
        else{

        	date_default_timezone_set($request['timezone']);
        	$chatuser = User::where([['id',$request['userId']]])->first();
        	$chat = Chat::with(['from_user'])->where([['from_id',$request['loggedInUser']],['to_id',$request['userId']]])->orWhere([['from_id',$request['userId']],['to_id',$request['loggedInUser']]])->skip($request['skip'])->take($request['limit'])->orderBy('chat_id','desc')->get();

        	$data = array();

        	foreach($chat as $key => $chatdata){

        		$data[$key]['conversion_id'] = $chatdata['conversion_id'];
				$data[$key]['message'] = $chatdata['message'];
        		$data[$key]['chat_id'] = $chatdata['chat_id'];
        		$data[$key]['profile_pic'] = $chatdata['from_user']->profile_pic != '' ? asset('public/images/'.$chatdata['from_user']->profile_pic) : asset('public/images/default_user.png');
                $data[$key]['from_id'] = $chatdata['from_id'];
                $data[$key]['to_id'] = $chatdata['to_id'];
        		$data[$key]['time'] = date('g:i A',$chatdata['time']);
				$data[$key]['time2'] = $chatdata['time'];
                $data[$key]['is_sender'] = ($request['loggedInUser'] == $chatdata['from_id']) ? 1 : 0;

        	}

        	if(count($data) > 0){

        		return response()->json(['code'=>200,'status'=>true,'message'=>'Chat found','chatuser'=>$chatuser->name,'data'=>$data,'total_count'=>$chat->count()]);

        	}
        	else{

        		return response()->json(['code'=>201,'status'=>false,'message'=>'No chat found','chatuser'=>$chatuser->name]);

        	}

        }

	}

	public function get_inbox(Request $request){

		/*if(!Auth::guard('api')->check()){
			return response()->json(array('status'=>false,'code'=>203,'message' => 'Session Expired'));
		}*/

		$validator = Validator::make($request->all(), [
            'userId' 		 =>	'required',
            'skip'           => 'required',
            'limit'           => 'required',
            'timezone'		=> 'required'
            ]);
        if ($validator->fails()) {

            return response()->json(array('status'=>false,'code'=>201,'message'=>'All fields are required'));

        }
        else{

        	$chat = Chat::where([['from_id',$request['userId']]])->orWhere([['to_id',$request['userId']]])->skip($request['skip'])->take($request['limit'])->orderBy('created_at','desc')->get()->unique('conversion_id');
          
            $data = array();
        	date_default_timezone_set($request['timezone']);
            $i = 0;
          	foreach($chat as $key => $chatdata){

        		if($chatdata['from_id'] == $request['userId']){

        			$user = User::where([['id',$chatdata['to_id']]])->first();

        		}
        		elseif($chatdata['to_id'] == $request['userId']){

        			$user = User::where([['id',$chatdata['from_id']]])->first();

        		}

        		$data[$i]['conversion_id'] = $chatdata['conversion_id'];
				$data[$i]['name'] = isset($user->name) ? $user->name : '';
        		$data[$i]['message'] = $chatdata['message'];
        		$data[$i]['time'] = date('g:i A',$chatdata['time']);
				$data[$i]['time2'] = $chatdata['time'];
                $data[$i]['profile_pic'] = isset($user->profile_pic) && $user->profile_pic != '' ? asset('public/images/'.$user->profile_pic) : asset('public/images/default_user.png');
                $data[$i]['userid'] = ($request['userId'] == $chatdata['from_id']) ? $chatdata['to_id'] : $chatdata['from_id'];

                $i++;

        	}
   
        	if(count($data) > 0){

        		return response()->json(['code'=>200,'status'=>true,'message'=>'Chats found','data'=>$data]);

        	}
        	else{

        		return response()->json(['code'=>201,'status'=>false,'message'=>'No Chat found']);

        	}

        }

	}

}
