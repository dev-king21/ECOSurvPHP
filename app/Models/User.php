<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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
        'location'
    ];

     /**
     * Get the user's parks.
     */
    public function parks()
    {
        return $this->morphToMany(Park::class, 'parkable', 'parkable');
    }

    /**
     * Get the breeds for the user.
     */
    public function breeds()
    {
        return $this->morphedByMany(Breed::class, 'userable', 'userable');
    }

}
