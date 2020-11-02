<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Spatie\Sluggable\HasSlug;

use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Announcement extends Model
{ 
    use HasSlug;
    use HasFactory;
   

    protected $fillable = ['title', 'description', 'price', 'user_id', 'category_id'];

    //RELAZIONI
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {

        return $this->belongsTo(Category::class);
    }

    
    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
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
    public function incrementVisit(){
        $this->visit++;
        $this->save();
        return $this->visit;
    }
}
