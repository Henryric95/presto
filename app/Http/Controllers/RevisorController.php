<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function __construct(){
        $this->middleware('auth.revisor');
    }

    public function revisorHome() {
        $announcements= Announcement::where('is_accepted',null)->orderBY('created_at', 'desc')->first();
        
        return view('revisor.home', compact('announcements'));
        
    }

    private function setAccepted($announcement_id, $value){

        $announcements = Announcement::find($announcement_id);
        $announcements -> is_accepted = $value;
        $announcements -> save();
        return redirect(route('revisor-home'));
    }

  
    public function accept($announcement_id){
        return $this->setAccepted($announcement_id,true);
    }

    public function reject($announcement_id){
        return $this->setAccepted($announcement_id,false);
    }
}
