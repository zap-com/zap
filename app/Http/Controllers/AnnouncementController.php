<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AnnouncementRequest;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $announcements = Announcement::orderBy('created_at', 'desc')->paginate(4);

        return view('announcement.index', compact('announcements'));
    }

    public function json()
    {
        $announcements = Announcement::orderBy('created_at', 'desc')->get()->take(8);
        return response()->json($announcements);
    }

    /**
     * Show the form for creating a new resource.
     *fa
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('announcement.create');
    }

    /**
     * Store a newly created resource in storage.
     
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnnouncementRequest $request)
    {
        Announcement::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'category_id' => $request->input('category'),
            'user_id' => Auth::user()->id
        ]);

        return redirect(route('home'))->with('message', 'Annuncio Creato');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $announcement)
    {
        $announcement->incrementVisit();
        return view('announcement.show', compact('announcement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement)
    {
        return view('announcement.edit', compact('announcement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(AnnouncementRequest $request, Announcement $announcement)
    {

        $announcement->update($request->all());


        return redirect(route('announcement.index'))->with('message', 'Annuncio Aggiornato');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement)
    {

        $announcement->delete();
        return redirect(route('announcement.index'))->with('message', 'Annuncio eliminato');
    }
}
