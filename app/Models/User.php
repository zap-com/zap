<?php

namespace App\Models;

use App\Models\Role;
use App\Models\Announcement;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Relations
    public function announcents()
    {
        return $this->hasMany(Announcement::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    //Funzioni
    public function makeUserRevisor()
    {
        if ($this->roles->contains('name', 'revisor')) {
            return;
        }
        $this->roles()->attach(Role::find(3));
        $this->save();
        return true;
    }

    static function getAdmins()
    {

        return User::all()->filter(function ($u) {
            return $u->roles->contains('name', 'admin');
        });
    }
}
