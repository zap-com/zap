<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;

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
        dd($user);
    }
}
