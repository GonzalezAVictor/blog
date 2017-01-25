<?php

namespace Robtor\Http\Controllers;

use Illuminate\Http\Request;

use Robtor\Http\Requests;

use Davibennun\LaravelPushNotification;

use PushNotification;  

class PushNotificationController extends Controller
{
    public function sendNotificationToDevice(){

        $deviceToken = 'APA91bHoofbDi111laubV-oB8mNTE34eIwk8g3LLOtx0tiBV0Y-VG8Zsi6Uwc85dDZBoNelIV2AMndwY9hVgLDY5hODAILDmJ88nEdy89d02Iu4lhYLss9OtKxqChaPFh6gXjbWETACQ';

        $message = 'We have successfully sent a push notification!';

        // Send the notification to the device with a token of $deviceToken
        $collection = PushNotification::app('bestdish')->to($deviceToken)->send($message);

        dd('Se ha enviado el mensaje');
    }
}
