<?php

namespace App\Models;

use App\Models\Announcement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AnnouncementStatus extends Model
{
    use HasFactory;

    public function announcements()
    {
        return $this->hasMany(Announcement::class);
    }


}
