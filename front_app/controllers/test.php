<?php
class Test extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

	}


	public function index()
	{

		$message ='
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:urn="urn:description7b.services.chrome.com">
   <soapenv:Header/>
   <soapenv:Body>
      <urn:VehicleDescriptionRequest>
         <urn:accountInfo number="320415" secret="fe478a1a882942ee" country="US" language="en" behalfOf=" "/>
         <!--You have a CHOICE of the next 4 items at this level-->
         <urn:vin>4T4BE46KX9R131146</urn:vin>
      </urn:VehicleDescriptionRequest>
   </soapenv:Body>
</soapenv:Envelope>';


		$file = "001-320415.xml";

		$this->prettyPrint($message, $file);


		$result = $this->runRequest($message);


		$file = "001-320415.xml";

		$this->prettyPrint($result, $file);

		$xml = $result;
		$xml = preg_replace("/(<\/?)(\w+):([^>]*>)/", '$1$2$3', $xml);
		$xml = simplexml_load_string($xml);
		$json = json_encode($xml);
		$data=json_decode($json);
		echo $data->SBody->VehicleDescription->{'@attributes'}->country;
		//$responseArray = json_decode($json, true); // true to have an array, false for an object
		echo '<pre>';
		print_r($data);

		exit;


	}

	function prettyPrint($result,$file){

		$dom = new DOMDocument("1.0");

		$dom->preserveWhiteSpace = false;

		$dom->formatOutput = true;

		$dom->loadXML(simplexml_load_string($result)->asXML());



		//call function to write request/response in file

		$this->outputWriter($file,$dom->saveXML());

		return $dom->saveXML();

	}

	function outputWriter($file,$content){

		file_put_contents($file, $content); // Write request/response and save them in the File

	}



	function runRequest($message)
	{

		$soap_do = $this->initializeHeader($message);

		$result = curl_exec($soap_do);

		if (curl_errno($soap_do) != '') {

			$this->session->set_flashdata('error', 'Sorry Booking failed. Please Try again.');
			echo "no request is run";
			exit;

		}

		curl_close($soap_do);

		return $result;

	}

	function initializeHeader($message)
	{ //Initialize all the header contents
		$user='320415';
		$password='fe478a1a882942ee';
		$CREDENTIALS=$user.":".$password;

		$auth = base64_encode($CREDENTIALS);
		$soap_do = curl_init("http://services.chromedata.com:80/Description/7b"); // Endpoint URL
		$header = array(

			"Content-Type: text/xml;charset=UTF-8",

			"Accept: gzip,deflate",

			"Cache-Control: no-cache",

			"Pragma: no-cache",

			"SOAPAction: \"\"",

			/*"Authorization: Basic $auth",*/

			"Content-length: " . strlen($message),

		);

		curl_setopt($soap_do, CURLOPT_SSL_VERIFYPEER, false); // Verify nothing about peer certificates

		curl_setopt($soap_do, CURLOPT_SSL_VERIFYHOST, false); // Verify nothing about host certificate

		curl_setopt($soap_do, CURLOPT_POST, true);

		curl_setopt($soap_do, CURLOPT_POSTFIELDS, $message);

		curl_setopt($soap_do, CURLOPT_HTTPHEADER, $header);

		curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true);

		return $soap_do;


	}
}
