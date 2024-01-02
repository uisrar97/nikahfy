
<?php
class Fcm {
//Define SendNotification function
    function sendPushNotification($registration_ids,$message,$serverKey) {

        ignore_user_abort();
        ob_start();

        $url = 'https://fcm.googleapis.com/fcm/send';

        $fields = array(
            'registration_ids' => $registration_ids,
            'notification' => $message,
            'time_to_live' => 60,
            'priority'=>'high',
            'content_available'=> true
        );
        /*define('GOOGLE_API_KEY', $serverKey);*/
        $headers = array(
            'Authorization:key='.$serverKey,
            'Content-Type: application/json'
        );
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, $url);
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
        $result = curl_exec($ch);


        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        curl_close($ch);

        return $result;
        ob_flush();
    }
}
