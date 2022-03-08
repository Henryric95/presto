<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Announcement extends Model

{
    use Searchable;
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'user_id',
    ];

    public function toSearchableArray()
    {    
        $categories = $this->categories;

        $array = [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'altro' => 'annunci categoria',
            'categories' => $categories
        ];
        return $array;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function user()
    {

        return $this->belongsTo(User::class);
    }

    static public function count()
    {
        return Announcement::where('is_accepted', null)->count();
    }

    public function announcementImages(){
        return $this->hasMany(AnnouncementImage::class);
    }
}
