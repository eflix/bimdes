<?php
function sendPushNotification($fcm_token, $title, $message, $id = null,$action = null) {  
     
    $url = "https://fcm.googleapis.com/fcm/send";            
    $header = [
        'authorization: key=AAAAleNL5zM:APA91bHKagYcwJURsGlltCcSf2JDGBzUr08Dlo0E9pTGXUC2ve4MSX0tRqVDzi-e6beuK7nE5k8mTkV-9-Rreu5kAxOxuGXfBkZsAPcaXPojQkdEmo9uj2BoxHC1ldKoDQ_DsvZiykgz',
        'content-type: application/json'
    ];    
 
    $notification = [
        'title' =>$title,
        'body' => $message
    ];
    $extraNotificationData = ["message" => $notification,"id" =>$id,'action'=>$action];
 
    $fcmNotification = [
        'to'        => $fcm_token,
        'notification' => $notification,
        'data' => $extraNotificationData
    ];
 
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
 
    $result = curl_exec($ch);

if ($result === FALSE) {
 die('Curl failed: ' . curl_error($ch));
 }
    
    curl_close($ch);
 
    return $result;
}

sendPushNotification("fhQ_GCvK1B4:APA91bHjqbEqpDPuPaXoC1YPbCtYo3A36wZRCeEx9guNrSCCyUDznrOPiI9fAgCZOxMfcS82wiHkuo97PJ14FrRu6KY52ZgQOwJ2I6Lk7ZOE88QJ9cdIvDRLgXNp0gThLCJiRArKNMhS","Ini Title","Ini Isi",123456,"notif");