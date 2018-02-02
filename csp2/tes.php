<?php  
$msg = "Please pay atleast 50% of the total amount of your reservation. Failure to comply within 3 days will result to auto cancellation of your reservation. A text message will be sent after the Admin confirms your payment. Thank you. Do not reply.";
		

		$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 25);
		$arr_post_body = array(
		"message_type" => "SEND",
		"mobile_number" => 639566721273,
		"shortcode" => "2929068950",
		"message_id" => $randomString,
		"message" => $msg,
		"client_id" => "d926cdd91b55ab3e684fd2870255345d01f2150398e6b63292103021212a0028",
		"secret_key" => "f68d1a0a395cf82bf976571f07c199aad3b533cebf9297f43c45bda614d91a46"
		);

		$query_string = "";
		foreach($arr_post_body as $key => $frow)
		{
		$query_string .= '&'.$key.'='.$frow;
		}
		$URL = "https://post.chikka.com/smsapi/request";
		$curl_handler = curl_init();
		curl_setopt($curl_handler, CURLOPT_URL, $URL);
		curl_setopt($curl_handler, CURLOPT_POST, count($arr_post_body));
		curl_setopt($curl_handler, CURLOPT_POSTFIELDS, $query_string);
		curl_setopt($curl_handler, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($curl_handler, CURLOPT_SSL_VERIFYPEER, FALSE);
		$response = curl_exec($curl_handler);
		curl_close($curl_handler);

?>