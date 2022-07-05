<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Traits\Message;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    use Message;

    public function getAllNot()
    {
        $user = auth()->guard('api')->user();

        return $this->sendResponse(['Notifications' => $user->notifications ], 'Data exited successfully');
    }

    public function getNotNotRead()
    {
        $user = auth()->guard('api')->user();
        $Notifications = $user->unreadNotifications;
        $NotificationsCount = $Notifications->count();

        return $this->sendResponse(['Notifications' => $Notifications,'count'=>$NotificationsCount], 'Data exited successfully');
    }

    public function clearItem($id)
    {

        DB::table('notifications')->where('id', $id)->update(['read_at' => now()]);

        return $this->sendResponse([], 'Data exited successfully');
    }

    public function clearAll()
    {
        $user = auth()->guard('api')->user();
        $user->unreadNotifications()->update(['read_at' => now()]);

        return $this->sendResponse([], 'Data exited successfully');
    }

}
