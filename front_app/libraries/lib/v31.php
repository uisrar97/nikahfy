<?php 
function request($host, $path, $url_params = array()) {
	$response = '';
    try {
        $curl = curl_init();
        if (FALSE === $curl)
            throw new Exception('Failed to initialize');
        $url = $host . $path . "?" . http_build_query($url_params);

		// echo $url;exit;
        // curl_setopt_array($curl, array(
            // CURLOPT_URL => $url,
            // CURLOPT_RETURNTRANSFER => true,  // Capture response.
            // CURLOPT_ENCODING => "",  // Accept gzip/deflate/whatever.
            // CURLOPT_MAXREDIRS => 10,
            // CURLOPT_TIMEOUT => 30,
            // CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            // CURLOPT_CUSTOMREQUEST => "GET",
            // CURLOPT_HTTPHEADER => array(
                // "Authorization: bearer " . $API_KEY,
                // "cache-control: no-cache",
            // ),
        // ));
		// Get cURL resource
		// $curl = curl_init();
		// Set some options - we are passing in a useragent too here
		curl_setopt_array($curl, array(
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => $url,
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer Os2eeomusm8U-gan3T_GdUielprnk3zhOoYeK-DwHFB3GwX0xYR6MxCyVUtz5mA1b1LollSq8avbrP-l8_OzdwyiVwUfAIcy51pvZt3E_nfcplq0jJ4y7Ii3n2psWnYx",
                "cache-control: no-cache",
            ),
		));
		// Send the request & save response to $resp
		$response = curl_exec($curl);
		// Close request to clear up some resources
		curl_close($curl);
		// print_r($response);exit;
    } catch(Exception $e) {
		// print_r($e);exit;
        trigger_error(sprintf(
            'Curl failed with error #%d: %s',
            $e->getCode(), $e->getMessage()),
            E_USER_ERROR);
    }
	// print_r($response);exit;
    return $response;
}
?>