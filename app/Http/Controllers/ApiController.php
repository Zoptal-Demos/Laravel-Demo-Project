<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\Good;
use App\Models\Order;
use App\Models\Faq;
use App\Models\Tags;
use Illuminate\Support\Facades\Validator;
use Auth;
use Config;
use App\Http\Controllers\RegisterController;

class ApiController extends Controller
{
    //
    public function check_session(Request $request){

        if(!Auth::guard('api')->check()){

            return response()->json(array('status'=>false,'code'=>203,'message' => 'Your session is expired. Please login again to continue.'));

        }
        else{

            return response()->json(array('status'=>true,'code'=>200,'message' => 'success'));

        }

    }
}
