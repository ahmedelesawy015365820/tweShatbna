<?php
namespace App\Traits;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

/**
 * trait NotificationTrait
 */
trait NotificationTrait
{
    public function notification($tokens,$body,$title,$type,$productData){

        $SERVER_API_KEY = 'AAAA5NvLe_I:APA91bFD3ci5FV6Ow92LYIm7NWLcLPqvo65r5dKSG93xnSJWMgvwpS6ad_KHBVLDmn6bhkKIWl_pSUtKYJ9WyOkZV1NViRxP7vt4pbhCnzd4qVzTvyKbc1RrMXJTMekXIUPLxHS4QDzn';
        $data = [

            "registration_ids" => $tokens,

            "data" => [
                'type' => $type,
                'productData' => json_encode($productData),
            ],

            "notification" => [

                "title" => $title,

                "body" => $body,

                "sound" => "default", // required for sound on ios

                // "image" =>asset('uploads/products/'.$product -> image),

                "click_action"=> "FLUTTER_NOTIFICATION_CLICK"

            ],

        ];

        $dataString = json_encode($data);

        $headers = [

            'Authorization: key=' . $SERVER_API_KEY,

            'Content-Type: application/json',

        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');

        curl_setopt($ch, CURLOPT_POST, true);

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);



        return $response;
    }
}
