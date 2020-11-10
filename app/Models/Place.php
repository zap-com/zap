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

    //FUNZIONI  

    static public function regionAnnouncements($region_code)
    {
        $city = self::where('region', $region_code)->get();

        $announcements = collect([]);

        $city->map(function ($el) use ($announcements) {
            return $el->announcements->map(
                function ($e) use ($announcements) {
                    $announcements->push($e);
                }
            );
        });

        return $announcements;
    }
}
