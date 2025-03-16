<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function viewNotificationPage(Request $request)
    {
        $user = Auth::user();
        $tab = $request->query('tab', 'all');
        
        $allNotifications = Notification::where('user_id', $user->id)->where('est_lu', 0)->orderBy('created_at', 'desc')->get();
                                        
        $notificationsImportant = Notification::where('user_id', $user->id)->where('importance', 1)->where('est_lu', 0)->get();
        
        $notifications = ($tab == 'important') ? $notificationsImportant : $allNotifications;
        
        return view('dashboard/user/notification', compact('allNotifications', 'notificationsImportant', 'notifications'));
    }
    
    public function markAsRead($id)
    {
        $notification = Notification::findOrFail($id);
        
        $notification->est_lu = 1;
        $notification->save();
        
        return redirect()->back()->with('update', 'Notification marquée comme lue');
    }
}
