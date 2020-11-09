<?php

namespace App\Models;

use App\Models\Announcement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Place extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'region', 'region_code', 'country_code', 'post_code', 'cordinates' ];

    //relazioni

    public function announcements()
    {
        return $this->hasMany(Announcement::class);
    }
}
