<?php

namespace App\Models;

use App\Models\Announcement;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasSlug;
    use HasFactory;

    //RELAZIONI
    public function announcements()
    {

        return $this->hasMany(Announcement::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}
