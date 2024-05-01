<?php 
if(!function_exists('upload_image'))
{
	function upload_image($image)
	{
		$image = $image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $imagename);
        return $imagename;
	}
}

if(!function_exists('send_order_email')){

	function send_order_email($email,$order){

		$content =  '<body> <h1>You have new order #'.$order.' to accept </h1>';
		$content .= '<p> Order id : '.$order.'</p>';
		$content .= '<p> click <a href='.route('all_orders').'>here</a> to view the order </p></body>';

		$headers  = "From: Kangaroo";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

		mail($email,"You have new order #".$order." to accept - Kangaroo",$content,$headers);


	}
}

if(!function_exists('send_notification')){

	function send_notification($push){

		$path_to_firebase_cm = 'https://fcm.googleapis.com/fcm/send';
        $firebase_registration_id =$push['device_token'];
        $fields = array(
            'to' => $firebase_registration_id,
            'notification' => array('title' => $push['title'], 'body' => $push['body'], /*'type'  => $push->push_type,*/'sound' => 'alert_tone', 'badge' =>'1','priority'=>'10','foreground'=>'true','data'=>$push['data'],'type'=>$push['data']['type']),
            'data'=>array('title' => $push['title'], 'body' => $push['body'], /*'type'  => $push->push_type,*/'sound' => 'alert_tone', 'badge' =>'1','priority'=>'10','foreground'=>'true','data'=>$push['data'],'type'=>$push['data']['type'],'sender_id'=>$push['data']['sender_id'],'receiver_id'=>$push['data']['receiver_id'],'conversion_id'=>$push['data']['conversion_id']),
            /*'data' => $push['data']*/
            /*'data' => array('title' => $push['title'], 'body' => $push['body'],'sound' => 'alert_tone', 'badge' =>'1','priority'=>'10','foreground'=>'true','type'=>$push['data']['type'],'data'=>$push['data'],'sender_id'=>$push['sender_id'],'receiver_id'=>$push['receiver_id'],'conversion_id'=>$push['conversion_id'])*/

        );
        $headers = array(
            'Authorization:key='.$push['serverKey'],
            'Content-Type:application/json'
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $path_to_firebase_cm);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4 );
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        curl_close($ch);

	}
}

?>