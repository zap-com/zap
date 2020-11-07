<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Announcement;
use App\Models\AnnouncementImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AnnouncementRequest;


class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $announcements = Announcement::where('status_id', 2)->with('category')->orderBy('created_at', 'desc')->paginate(16);
        if ($request->ajax()) {
            return $announcements;
        }


        return view('announcement.index', compact('announcements'));
    }

    public function test(Request $request)
    {
        $announcements = Announcement::where('status_id', 1)->with('category')->orderBy('created_at', 'desc')->paginate(16);
        if ($request->ajax()) {
            return $announcements;
        }


        return view('test', compact('announcements'));
    }

    public function json()
    {
        $announcements = Announcement::where('status_id', 2)->with('category')->orderBy('visit', 'desc')->get()->take(8);
        return response()->json($announcements);
    }

    public function catjson()
    {
        $categories = Category::orderBy('id', 'asc')->get();
        return response()->json($categories);
    }

    /**
     * Show the form for creating a new resource.
     *fa
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $secret = base_convert(sha1(uniqid(mt_rand())),16,32);
        return view('announcement.create', compact('secret'));
    }

    public function UploadImages(Request $request)
    {
       $secret = $request->input('secret');

       $fileName = $request->file('file')->store("public/temp/{$secret}");

       session()->push("images.{$secret}", $fileName);
        
       
        return response()->json(session()->get("images.{$secret}"));
    }

    /**
     * Store a newly created resource in storage.
     
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnnouncementRequest $request)
    {
        

        $a = Announcement::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'category_id' => $request->input('category_id'),
            'user_id' => Auth::user()->id
        ]);

        $secret = $request->input('secret');

        $images = session()->get("images.{$secret}");

        foreach ($images as  $image) {
            $i = new AnnouncementImage();

            $fileName = basename($image);
            $newFileName =  "/public/announcements/{$a->id}/{$fileName}";
            Storage::move($image,$newFileName);

            $i->file = $newFileName;
            $i->announcement_id = $a->id;
            $i->save();
        }

        File::deleteDirectory(storage_path("/app/public/temp/{$secret}"));

      

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
