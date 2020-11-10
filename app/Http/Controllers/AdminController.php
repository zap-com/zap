<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\RevisorAcceptedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    public function acceptRevisor(User $user)
    {
        $user->makeUserRevisor();

        Notification::send($user, new RevisorAcceptedNotification($user));
        return redirect(route('home'))->with('message', "{$user->name} __('global.maderevisor')");
    }
}
