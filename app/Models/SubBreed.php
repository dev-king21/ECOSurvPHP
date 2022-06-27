<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubBreed extends Model
{
    protected $fillable = [
        'sub_breed',
    ];
    /**
     * Get the breed that owns the sub-breed.
     */
    public function breed()
    {
        return $this->belongsTo(Breed::class);
    }
}
