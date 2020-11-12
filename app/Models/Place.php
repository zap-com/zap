<?php

namespace App\Models;

use App\Models\Announcement;
use Malhal\Geographical\Geographical;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Place extends Model
{
    use HasFactory;
    use Geographical;

    protected $fillable = ['name', 'region', 'region_code', 'country_code', 'post_code' , 'latitude' ,'longitude'];

    protected static $kilometers = true;    

    //relazioni

    public function announcements()
    {
        return $this->hasMany(Announcement::class);
    }

    //FUNZIONI  

    static public function regionAnnouncements($region_code, $distance = null)
    {
        $city = self::where('region', $region_code)->get();

        $announcements = collect([]);

        $city->map(function ($el) use ($announcements, $distance) {
            return $el->announcements->map(
                function ($e) use ($announcements, $distance) {
                    $e->distance = $distance;
                    $announcements->push($e);
                }
            );
        });
       
        return $announcements;
    }

    static public function getAnnouncementByDistance($lat ,$lng)
    {
      
        $q = self::distance($lat, $lng);
        $array = $q->orderBy('distance', 'asc')->get();
        
        $announcements = collect([]);
        $array->map(function($b) use ($announcements)
        {
            
            self::regionAnnouncements($b->region,$b->distance)->map(
                function ($e) use ($announcements){
                   
                   
                    $announcements->push($e);
                }
            );
        })->sortBy('distance');
        
        
        return $announcements;
    }
}
