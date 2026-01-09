<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'name',
        'price',
        'description',
    ];

    /**
     * Get the users that have this plan (many-to-many).
     */
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
