<?php

class Cox extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

	}



	public function cox_data(){
	    $url = 'https://incentives.homenetiol.com/DecodeVIN';
        $serverKey='5E3333B4-067D-46D9-916D-6F97FA55539D';
        $data = array("VIN" =>"SCCLMDVN9JHA11287");                                                                    
        $data_string = json_encode($data);   
        /*define('GOOGLE_API_KEY', $serverKey);*/
        $headers =  array(                                                                          
                          'Content-Type: application/json',  
                          'AIS-ApiKey: ' .$serverKey
                          );  
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, $url);
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, $data_string);
        $result = curl_exec($ch);


        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        curl_close($ch);
        print_r($result);
        exit;

        return $result;

      
	}
	public function findvehiclepostalcode(){
	    $url = 'https://incentives.homenetiol.com/findvehiclegroupsbyvehicleandpostalcode';
        $serverKey='5E3333B4-067D-46D9-916D-6F97FA55539D';
        $data = array("VIN" =>"3KPA24AB9KE211780","Postalcode"=>"92618");
        $data_string = json_encode($data);
        /*define('GOOGLE_API_KEY', $serverKey);*/
        $headers =  array(
                          'Content-Type: application/json',
                          'AIS-ApiKey: ' .$serverKey
                          );
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, $url);
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, $data_string);
        $result = curl_exec($ch);


        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        curl_close($ch);
        print_r($result);
        exit;

        return $result;


	}


}
