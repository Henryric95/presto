<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(){
        
        $announcements=Announcement::where('is_accepted',true)->orderBy('created_at','desc')->take(5)->get(); 
        
          return view('welcome',compact('announcements'));
    }

    public function category($name, $category_id){
        $categories=Category::find($category_id);
        $announcements=$categories->announcements()->orderBy('created_at','desc')->paginate(3);
        // dd($announcements->all());

        return view('announcement.announcement_by_category', compact('announcements'));
      
    }

    public function search(Request $request){
        $q=$request->input('q');
        $categories=Category::all();

      
        $announcements=Announcement::search($q)->where('is_accepted',true)->get();

        

        return view('announcement.search',compact('q', 'announcements','categories'));
    }

    public function locale($locale){
        session()->put('locale', $locale);
        return redirect()->back();
    }

}
