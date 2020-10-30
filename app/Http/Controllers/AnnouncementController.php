<?php

namespace App\Http\Controllers;

use App\Models\User;
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

        return view('home', compact('announcements'));
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
        $announcement = Announcement::create([
            'title' => $request->input('title'),
            'slug' => $request->input('slug'),
            'body' => $request->input('body'),
            'img' => $request->file('img')->store('public/img'),
            'user_id' => Auth::user()->id
        ]);

        return redirect(route('announcement.index'))->with('message', 'Annuncio Creato');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $announcement)
    {
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
