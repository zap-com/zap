<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Announcement extends Model
{
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

    //Uri 
    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'title';
    }
}
