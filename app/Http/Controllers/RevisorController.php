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

        $announcement = Announcement::where('status_id', 1)
            ->orderBy('created_at', 'desc')
            ->paginate(16);

        $mode = null;
        return view('revisor.home', compact('announcement', 'mode'));
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

    public function restoreAd(Announcement $announcement)
    {
        $announcement->setStatus('pending');
        return redirect()->back();
    }

    public function deleteAd(Announcement $announcement)
    {
        $announcement->delete();
        return redirect()->back();
    }

    public function trash()
    {
        $announcement = Announcement::where('status_id', 4)->get();

        $mode = "elimina definitivamente gli annunci o ripristinali";
        return view('revisor.home', compact('announcement', 'mode'));
    }
}
