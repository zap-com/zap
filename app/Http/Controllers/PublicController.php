<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Place;
use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Notification;
use App\Notifications\RevisorRequestNotification;
use Carbon\Carbon;

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
        $announcements = Announcement::where('category_id', $category->id)->where('status_id', 2)->orderBy('created_at','desc')->get();

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
            return redirect(route('home'))->with('message', __('global.noadmins'));
        }
        Notification::send($user, new RevisorRequestNotification($user));

        return redirect(route('home'))->with('message', __('global.request-sent'));
    }

    public function search(Request $req, $data = null)
    {

        $q = $req->input('q');
        $categoryId = $req->input('cat');
        $min = $req->input('min');
        $max = $req->input('max');
        

        if($min && $max){
            $announcements = Announcement::where('price','>',$min)->where('price','<',$max)->where('status_id', 2)->orderby('created_at','desc')->get();
            return view('announcement.index', compact('announcements'));
        }
        session()->put('q', $q);
        session()->put('categoryId', $categoryId);

        if($data){
            if (!$categoryId) {
                $announcements = Announcement::where('created_at','<',$data)->where('status_id', 2)->orderby('created_at','desc')->get();
                
               
            } else if (!$q) {
                $announcements = Announcement::where('category_id', $categoryId)->orderby('created_at','desc')->get();
            } else {
                $announcements = Announcement::search($q)->where('status_id', 2)->where('category_id', $categoryId)->orderby('created_at','desc')->get();
            }
        }else{
            
            if (!$categoryId) {
                $announcements = Announcement::search($q)->where('status_id', 2)->orderby('created_at','desc')->get();
            } else if (!$q) {
                $announcements = Announcement::where('category_id', $categoryId)->orderby('created_at','desc')->get();
            } else {
                $announcements = Announcement::search($q)->where('status_id', 2)->where('category_id', $categoryId)->orderby('created_at','desc')->get();
            }
    
        }

        
        


        return view('announcement.index', compact('announcements','q'));
    }

    public function searchByLocality(Request $request)
    {
        $q = json_decode($request->input('hiddenplace'));

        $announcements = Place::getAnnouncementByDistance($q->cordinates->lat,$q->cordinates->lng );

        return view('announcement.index', compact('announcements'));
    }

    public function regions($regione)
    {
        $announcements = Place::regionAnnouncements($regione);
        return view('announcement.index', compact('announcements'));
    }
}
