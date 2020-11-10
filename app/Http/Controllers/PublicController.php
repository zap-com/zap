<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Place;
use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Notification;
use App\Notifications\RevisorRequestNotification;

class PublicController extends Controller
{



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::orderBy('id')->get();
        return view('home', compact('categories'));
    }

    public function indexCarousel(Announcement $announcement, Request $request)
    {
        dd($announcement->images);
        return $request->json($announcement->images);
    }

    public function locale($locale)
    {
        session()->put('locale', $locale);
        return redirect()->back();
    }

    public function category(Category $category)
    {
        $announcements = Announcement::where('category_id', $category->id)->where('status_id', 2)->get();

        return view('category.index', compact('announcements'));
    }

    public function works()
    {

        return view('work.revisor');
    }

    public function revisorWork(User $user)
    {
        $admins =  User::getAdmins();


        if ($admins->count() == 0) {
            return redirect(route('home'))->with('message', 'Non ci sono Admin, in questo sito comanda l\'anarchia');
        }
        Notification::send($user, new RevisorRequestNotification($user));

        return redirect(route('home'))->with('message', 'Richiesta inviata, ti faremo sapere al più presto');
    }

    public function search(Request $req)
    {

        $q = $req->input('q');
        $categoryId = $req->input('cat');


        if (!$categoryId) {
            $announcements = Announcement::search($q)->where('status_id', 2)->get();
        } else if (!$q) {
            $announcements = Announcement::where('category_id', $categoryId)->get();
        } else {
            $announcements = Announcement::search($q)->where('status_id', 2)->where('category_id', $categoryId)->get();
        }


        return view('announcement.index', compact('announcements'));
    }

    public function regions($regione)
    {
        $announcements = Place::regionAnnouncements($regione);
        return view('announcement.index', compact('announcements'));
    }
}
