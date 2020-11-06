<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.revisor');
    }

    public function index()
    {
<<<<<<< HEAD
        $announcements = Announcement::where('status_id', 1)
                        ->orderBy('created_at', 'desc')
                        ->get();
        return view('revisor.home', compact('announcements'));
=======
        $announcement = Announcement::where('status_id', 1)
            ->orderBy('created_at', 'desc')
            ->paginate(16);
        return view('revisor.home', compact('announcement'));
>>>>>>> 405cb77c1c4c1540ecc991e98e1af5e90c6fc791
    }

    public function setAccepted(Announcement $announcement)
    {
        $announcement->setStatus('accepted');
        return redirect(route('revisor.home'));
    }

    public function setRejected(Announcement $announcement)
    {
        $announcement->setStatus('rejected');
        return redirect(route('revisor.home'));
    }
}
