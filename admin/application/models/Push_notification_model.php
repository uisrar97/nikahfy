<?php
class Push_notification_model extends CI_Model{
    public function __construct(){
        parent:: __construct();
        ob_start();
    }
	public function android_notification($notification_array = NULL){
		// echo "<pre>";print_r($notification_array);echo "</pre>";exit;
		$gcm = new GCM();
		$registatoin_ids = array($notification_array['device_id']);
		$message = array(
			"message"		=> $notification_array['message'],
			"store_id"		=> $notification_array['store_id'],
			"store_name"	=> $notification_array['store_name'],
			"store_logo"	=> $notification_array['store_logo'],
			"deal_id"		=> $notification_array['deal_id'],
			"is_emp"		=> $notification_array['is_emp'],
			"is_loyalty"	=> $notification_array['is_loyalty'],
			"subject"		=> $notification_array['subject'],
			"image"			=> $notification_array['image'],
			"video"			=> $notification_array['video'],
			"date"			=> $notification_array['date'],
			"time"			=> $notification_array['time'],
			"expiry"		=> $notification_array['expiry'],
			"promotion_id"	=> $notification_array['promotion_id']
		);
		sleep(1);
		$response = $gcm->send_notification($registatoin_ids, $message);
		// echo "<pre>";print_r($notification_array);echo "</pre>";//exit;
		// echo "<pre>";print_r($response);echo "</pre>";//exit;
		if($response->success == 1){
			return true;
		}elseif($response->failure == 1){
			return false;
		}
	}

	public function apple_notification($notification_array = NULL){
		$push = new ApnsPHP_Push(
			ApnsPHP_Abstract::ENVIRONMENT_SANDBOX,
			APPPATH."third_party/apns/final_aps_dev.pem"
		);
		// $push = new ApnsPHP_Push(
		// ApnsPHP_Abstract::ENVIRONMENT_PRODUCTION,
		// APPPATH.'third_party/apns/final_aps_production.pem'
		// );
		$push->setProviderCertificatePassphrase('1234');
		$push->connect();
		$message = new ApnsPHP_Message($notification_array['device_id']);
		$msg = 'You have received a new employee message';
		$message_data = array(
			"message"		=> $notification_array['message'],
			"store_id"		=> $notification_array['store_id'],
			"store_name"	=> $notification_array['store_name'],
			"store_logo"	=> $notification_array['store_logo'],
			"deal_id"		=> $notification_array['deal_id'],
			"is_emp"		=> $notification_array['is_emp'],
			"is_loyalty"	=> $notification_array['is_loyalty'],
			"subject"		=> $notification_array['subject'],
			"image"			=> ($notification_array['image'] == "")?"0":$notification_array['image'],
			"video"			=> ($notification_array['video'] == "")?"0":$notification_array['video'],
			"date"			=> $notification_array['date'],
			"time"			=> $notification_array['time'],
			"expiry"		=> $notification_array['expiry'],
			"promotion_id"	=> $notification_array['promotion_id']
		);
		$message->setTitle($notification_array['subject']);
		$message->setText($notification_array['message']);
		$message->setSound();
		$message->setMutableContent();
		$message->setCustomProperty('data', $message_data);
		$message->setExpiry(30);
		$push->add($message);
		$push->send();
		$push->disconnect();
		$aErrorQueue = $push->getErrors();
		// echo "<pre>";print_r($aErrorQueue);echo "</pre>";exit;
		if (!empty($aErrorQueue)) {
			return false;
			// var_dump($aErrorQueue);
		}else{
			return true;
		}
	}
}