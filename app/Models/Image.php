<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
    ];

    /**
     * Get the breed that owns the images.
     */
    public function breed()
    {
        return $this->belongsTo(Breed::class);
    }
}
