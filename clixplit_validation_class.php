<?php

class clixplit_validation {

	const CLIXPLIT_SECRET_KEY = "57f80db7cba2a2.89306186";
	const CLIXPLIT_LICENSE_SERVER_URL = "http://wonkasoft.com";
	const CLIXPLIT_REFERENCE = "clixplit";

	function __construct() {
	}


	function clixplit_check($key) {
		$license_key = $key;
		$response_message ='';

        // API query parameters
		$api_params = array(
			'slm_action' => 'slm_check',
			'secret_key' => self::CLIXPLIT_SECRET_KEY,
			'license_key' => $license_key,
			);

        // Send query to the license manager server
		$query = esc_url_raw(add_query_arg($api_params, self::CLIXPLIT_LICENSE_SERVER_URL));
		$response = wp_remote_get($query, array('timeout' => 20, 'sslverify' => false));

        // Check for error in the response
		if (is_wp_error($response)){
			$response_message = "Unexpected Error! The query returned with an error.";
			return $response_message;
		}

        //var_dump($response);//uncomment it if you want to look at the full response

        // License data.
		// $license_data = json_decode(wp_remote_retrieve_body($response));
               $license_data = json_decode( preg_replace('/[\x00-\x1F\x80-\xFF]/', '', wp_remote_retrieve_body($response)), true );

        // TODO - Do something with it.
        var_dump($license_data);//uncomment it to look at the data

        if($license_data->result == 'success'){//Success was returned for the license activation

            //Uncomment the followng line to see the message that returned from the license server
        	$response_message = $license_data->status;
        	return $response_message;

        }
        else{
            //Show error to the user. Probably entered incorrect license key.

            //Uncomment the followng line to see the message that returned from the license server
        	$response_message = '<br />The following message was returned from the server: '.$license_data->message;
        	return $response_message;
        }

    }
    /*** End of license check ***/

/*
* Activation process
*
*/
    function clixplit_activate($key) {

      $license_key = $key;
      $response_message ='';

        // API query parameters
      $api_params = array(
         'slm_action' => 'slm_activate',
         'secret_key' => self::CLIXPLIT_SECRET_KEY,
         'license_key' => $license_key,
         'registered_domain' => $_SERVER['SERVER_NAME'],
         'item_reference' => urlencode(self::CLIXPLIT_REFERENCE),
         );

        // Send query to the license manager server
      $query = esc_url_raw(add_query_arg($api_params, self::CLIXPLIT_LICENSE_SERVER_URL));
      $response = wp_remote_get($query, array('timeout' => 20, 'sslverify' => false));

        // Check for error in the response
      if (is_wp_error($response)){
         $response_message = "Unexpected Error! The query returned with an error.";
         return $response_message;
     }

        // var_dump($response);//uncomment it if you want to look at the full response

        // License data.
     // $license_data = json_decode(wp_remote_retrieve_body($response));
        $license_data = json_decode( preg_replace('/[\x00-\x1F\x80-\xFF]/', '', wp_remote_retrieve_body($response)), true );

        // TODO - Do something with it.
        var_dump($license_data);//uncomment it to look at the data

        if($license_data->result == 'success'){//Success was returned for the license activation

            //Uncomment the followng line to see the message that returned from the license server
        	$response_message = '<br />The following message was returned from the server: ' . $license_data->message . '<meta http-equiv="refresh" content="2;url=?page=clixplit/clixplit-home.php" />';
        	return $response_message;

        }
        else{
            //Show error to the user. Probably entered incorrect license key.

            //Uncomment the followng line to see the message that returned from the license server
        	$response_message = '<br />The following message was returned from the server: '.$license_data->message;
        	return $response_message;
        }
    }

    function clixplit_deactivate($key) {

      $license_key = $key;
      $response_message ='';

        // API query parameters
      $api_params = array(
      'slm_action' => 'slm_deactivate',
      'secret_key' => self::CLIXPLIT_SECRET_KEY,
      'license_key' => $license_key,
      'registered_domain' => $_SERVER['SERVER_NAME'],
      'item_reference' => urlencode(self::CLIXPLIT_REFERENCE),
      );

        // Send query to the license manager server
      $query = esc_url_raw(add_query_arg($api_params, self::CLIXPLIT_LICENSE_SERVER_URL));
      $response = wp_remote_get($query, array('timeout' => 20, 'sslverify' => false));

        // Check for error in the response
      if (is_wp_error($response)){
         $response_message = "Unexpected Error! The query returned with an error.";
         return $response_message;
     }

        //var_dump($response);//uncomment it if you want to look at the full response

        // License data.
     // $license_data = json_decode(wp_remote_retrieve_body($response));
     $license_data = json_decode( preg_replace('/[\x00-\x1F\x80-\xFF]/', '', wp_remote_retrieve_body($response)), true );

        // TODO - Do something with it.
        var_dump($license_data);//uncomment it to look at the data

     if($license_data->result == 'success'){//Success was returned for the license activation

            //Uncomment the followng line to see the message that returned from the license server
        $response_message = '<br />The following message was returned from the server: '.$license_data->message . '<meta http-equiv="refresh" content="2;url=?page=clixplit/clixplit-activation.php" />';
       return $response_message;
   }
   else{
            //Show error to the user. Probably entered incorrect license key.

            //Uncomment the followng line to see the message that returned from the license server
       $response_message = '<br />The following message was returned from the server: '.$license_data->message;
       return $response_message;
   }
}

} // End of Class
?>