<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Announcement;
use App\Notifications\RevisorRequestNotification;

use Illuminate\Support\Facades\Notification;

class PublicController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function category(Category $category)
    {
        $announcements = Announcement::where('category_id', $category->id)->where('status_id', 2)->get();
        
        return view('category.index', compact('announcements'));
    }

    public function works() {

        return view('work.revisor');
    }

    public function revisorWork(User $user){
        $admins =  User::getAdmins();
        

        if($admins->count() == 0){
            return redirect(route('home'))->with('message','Non ci sono Admin, in questo sito comanda l\'anarchia');
        }
        Notification::send($user, new RevisorRequestNotification($user));

        return redirect(route('home'))->with('message','Richiesta inviata, ti faremo sapere al più presto');
    }
}
