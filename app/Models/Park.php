<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Park extends Model
{
    protected $fillable = [
        'name',
    ];
    use HasFactory;
    /**
    * Get all of the users that are assigned this park.
     */
    public function users()
    {
        return $this->morphedByMany(User::class, 'parkable', 'parkable');
    }

    public function breeds()
    {
        return $this->morphToMany(Breed::class, 'breedable', 'breedable');
    }
}
