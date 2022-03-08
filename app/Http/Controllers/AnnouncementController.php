<?php

namespace App\Http\Controllers;

use App\Jobs\ResizeImage;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Models\AnnouncementImage;
use App\Jobs\GoogleVisionLabelImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Jobs\GoogleVisionRemoveFaces;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\ViewServiceProvider;
use App\Jobs\GoogleVisionSafeSearchImage;
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
        
    }
    public function __construct(){
        $this->middleware('auth');
    }
    
    
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $uniqueSecret =$request->old('uniqueSecret',base_convert(sha1(uniqid(mt_rand())), 16, 36));
        
        return view("announcement.create", compact("uniqueSecret"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnnouncementRequest $request)
    {
        $announcement= Auth::user()->announcements()->create([
           "name"=>$request->input('name'),
           "description"=>$request->input('description'),
           "price"=>$request->input('price'),
           "category_id"=>$request->input('category'),
           "user_id"=>$request->input('user_id'),
        ]);
        $uniqueSecret = $request->input("uniqueSecret");
        $images = session()->get("images.{$uniqueSecret}", []);
        $removedImages = session()->get("removedimages.{$uniqueSecret}", []);

        $images = array_diff($images, $removedImages);
        foreach($images as $image){




 
            $i=new AnnouncementImage();
            $fileName= basename($image);
            $newFileName= "public/announcements/{$announcement->id}/{$fileName}";
            Storage::move($image, $newFileName);
            $i->file=$newFileName;
            $i->announcement_id=$announcement->id;
            $i->save();

            $i->file = $newFileName;
            $i->announcement_id = $announcement->id;
            $i->save();
            
            GoogleVisionSafeSearchImage::withChain([
                
                new   GoogleVisionLabelImage($i->id),
                
                new GoogleVisionRemoveFaces($i->id),

                new ResizeImage($newFileName,300,150)
            ])->dispatch($i->id);

        }
        File::deleteDirectory(storage_path("/app/public/temp/{$uniqueSecret}"));

        
        return redirect(route('welcome'))->with('message', 'annuncio inserito correttamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $announcement)
    {
        return view('announcement.details', compact('announcement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Announcement $announcement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement)
    {
        //
    } 

    public function uploadImage(Request $request){
        $uniqueSecret = $request->uniqueSecret;

        $fileName = $request->file('file')->store("public/temp/{$uniqueSecret}");

        dispatch(new ResizeImage(
            $fileName,
            120,
            120
        ));

        session()->push("images.{$uniqueSecret}", $fileName);

        return response()->json(
            [
                'id'=>$fileName
            ]
        );
    }

    public function removeImage(Request $request){

        $uniqueSecret = $request->input("uniqueSecret");
        $fileName = $request->input('id');
        session()->push("removedimages.{$uniqueSecret}", $fileName);
        Storage::delete($fileName);
        return response()->json('ok');
    }

    public function getImages(Request $request){
        $uniqueSecret = $request->input('uniqueSecret');

        $images = session()->get("images.{$uniqueSecret}", []);

        $removedImages = session()->get("removedimages.{$uniqueSecret}", []);

        $images = array_diff($images, $removedImages);

        $data = [];

        foreach($images as $image){

            $data[]= ['id'=>$image, 'src'=>AnnouncementImage::get($image, 120, 120) ];

            $data[]= ['id'=>$image, 'src'=>AnnouncementImage::getUrlByFilePath($image, 120, 120) ];

            $data[]= ['id'=>$image, 'src'=>AnnouncementImage::get($image, 120, 120) ];


        }

        return response()->json($data);
    }
}