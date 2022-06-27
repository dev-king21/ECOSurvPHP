<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    protected $fillable = [
        'breed',
    ];
    /**
     * Get the sub breeds for the breed.
     */
    public function sub_breeds()
    {
        return $this->hasMany(SubBreed::class);
    }
    /**
     * Get the images for the breed.
     */
    public function images()
    {
        return $this->hasMany(Image::class);
    }

    /**
     * Get all the parks assigned to this breed.
     */
    public function parks()
    {
        return $this->morphedByMany(Park::class, 'breedable', 'breedable');
    }

    /**
     * Get the users assigned to this breed.
     */
    public function users()
    {
        return $this->morphtoMany(User::class, 'userable', 'userable');
    }

}
