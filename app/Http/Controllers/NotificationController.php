<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Notification;

class NotificationController extends Controller
{
  public function viewNotificationPage()
  {
      return view('dashboard/user/notification');
  }

}
