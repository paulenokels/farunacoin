<?php

namespace App\Http\Utils;
use App\User;
use App\Models\Notifications;
use App\Utils\DateUtil;

/*
``This class is responsible for crediting the user account and
    also update the user earnings
*/

class NotificationUtil {

    public static function createNotification($userId, $title, $message, $type ) {
       Notifications::create([
           'user_id' => $userId,
           'title' => $title,
           'message' => $message,
           'type'  => $type
       ]);
        
    }
}