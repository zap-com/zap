<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Laravel\Scout\Searchable;

use Spatie\Sluggable\HasSlug;
use App\Models\AnnouncementImage;
use Spatie\Sluggable\SlugOptions;
use App\Models\AnnouncementStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Announcement extends Model
{
    use HasSlug;
    use HasFactory;
    use Searchable;


    protected $fillable = ['title', 'description', 'price', 'user_id', 'category_id', 'status_id'];

    //RELAZIONI
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {

        return $this->belongsTo(Category::class);
    }

    public function status()
    {
        return $this->belongsTo(AnnouncementStatus::class);
    }
    public function images()
    {
        return $this->hasMany(AnnouncementImage::class);
    }

    //FullText research
    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $array = [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'category' => $this->category,
        ] ;

        // Customize array...

        return $array;
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }



    //Uri 
    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    //Functions
    public function incrementVisit()
    {
        $this->visit++;
        $this->save();
        return $this->visit;
    }


    public function setStatus($status)
    {
        $statusesCode = AnnouncementStatus::where('status', $status)->first();
      
        if ($statusesCode) {
            $this->status_id= $statusesCode->id;
            $this->save();
            return $this->status_id;
        }

        return 'invalid status';
    }

    static public function toBeRevisedCount(){
        return self::where('status_id',1)->count();
    }


    //Development function
    static function publishAll()
    {
        $announcements = self::all();

        $announcements->map(function ($el){
            $el->setStatus('accepted');
        });

        return 'done';
    }
}
