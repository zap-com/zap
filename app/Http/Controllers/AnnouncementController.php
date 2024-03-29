<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\Category;
use App\Jobs\ResizeImageJob;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Models\AnnouncementImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Jobs\GoogleVisionImgLabelJob;

use App\Jobs\GoogleVisonSafeImageJob;
use Illuminate\Support\Facades\Storage;
use App\Jobs\GoogleVisionRemoveFacesJob;
use App\Http\Requests\AnnouncementRequest;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $announcements = Announcement::where('status_id', 2)->with(['category','place'])->orderBy('created_at', 'desc')->paginate(16);
        $announcements->map(function ($el) {
            return $el->images = $el->images;
        });
        if ($request->wantsJson()) {
            return $announcements;
        }


        return view('announcement.index', compact('announcements'));
    }

    public function test(Request $request)
    {
        $announcements = Announcement::where('status_id', 1)->with('category')->orderBy('created_at', 'desc')->paginate(16);
        if ($request->wantsJson()) {
            return $announcements;
        }


        return view('test', compact('announcements'));
    }

    public function json()
    {
        $announcements = Announcement::where('status_id', 2)->with(['category','place'])->orderBy('visit', 'desc')->get()->take(8);

        $announcements->map(function ($el) {
            return $el->images = $el->images;
        });
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
    public function create(Request $request)
    {
        $secret = $request->old('secret', base_convert(sha1(uniqid(mt_rand())), 16, 32));
        return view('announcement.create', compact('secret'));
    }


    /**
     * Upload Announcement Images (temp)
     *
     * @param Request $request
     * @return void
     */
    public function UploadImages(Request $request)
    {
        $secret = $request->input('secret');

        $fileName = $request->file('file')->store("public/temp/{$secret}");

        // ResizeImageJob::dispatch( $fileName,
        // 120,
        // 120);
        dispatch(new ResizeImageJob(
            $fileName,
            120,
            120
        ));

        session()->push("images.{$secret}", $fileName);


        return response()->json([
            'id' => $fileName,

        ]);
    }

    /**
     * Remove Announcement Images (temp)
     *
     * @param Request $request
     * @return void
     */
    public function removeImage(Request $request)
    {
        $secret = $request->input('secret');
        $fileName = $request->input('id');

        session()->push("removedImages.{$secret}", $fileName);

        Storage::delete($fileName);

        return response()->json(['success' => 'true']);
    }
    /**
     * AJAX
     * Return Images if they exist
     *
     * @param Request $request
     * @return void
     */
    public function getImages(Request $request)
    {
        $secret = $request->input('secret');
        $images = session()->get("images.{$secret}", []);
        $removedImages = session()->get("removedImages.{$secret}", []);
        $images = array_diff($images, $removedImages);
        $data = [];

        foreach ($images as $image) {
            $data[] = [
                'id' => $image,
                'src' => AnnouncementImage::getUrlByFilePath($image, 120, 120)
            ];
        }



        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnnouncementRequest $request)
    {
        $placeJson = json_decode($request->input('hiddenplace'));

        $a = Announcement::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'category_id' => $request->input('category_id'),
            'user_id' => Auth::user()->id,
            'place_id' => Place::firstOrCreate(
                [
                    "name" => $placeJson->name,
                    "region" => $placeJson->region,
                    'country_code' => $placeJson->country_code,
                ],
                [
                    'name' => $placeJson->name,
                    'region' => $placeJson->region,
                    'region_code' => $placeJson->region_code,
                    'country_code' => $placeJson->country_code,
                    'post_code' => $placeJson->post_code,
                    'latitude' => $placeJson->cordinates->lat,
                    'longitude' => $placeJson->cordinates->lng

                ]
            )->id
        ]);

      
        $secret = $request->input('secret');

        $images = session()->get("images.{$secret}", []);
        $removedImages = session()->get("removedImages.{$secret}", []);

        $images = array_diff($images, $removedImages);

        foreach ($images as  $image) {
            $i = new AnnouncementImage();

            $fileName = basename($image);
            $newFileName =  "/public/announcements/{$a->id}/{$fileName}";
            Storage::move($image, $newFileName);

  
            $i->file =  "announcements/{$a->id}/{$fileName}";
            $i->announcement_id = $a->id;
            $i->save();
            
           
            GoogleVisonSafeImageJob::withChain([
                new GoogleVisionImgLabelJob($i->id),
                new GoogleVisionRemoveFacesJob($i->id),
                new ResizeImageJob($newFileName,200,150),
                new ResizeImageJob($newFileName,900,500)
            ])->dispatch($i->id);
            
        }

        File::deleteDirectory(storage_path("/app/public/temp/{$secret}"));



        return redirect(route('home'))->with('message', __('announcement.message-created'));
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


        return redirect(route('announcement.index'))->with('message', __('announcement.message-updated'));
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
        return redirect(route('announcement.index'))->with('message', __('announcement.message-deleted'));
    }
}
