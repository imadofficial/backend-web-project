<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    use HasFactory;

    protected $table = 'hero';

    protected $fillable = [
        'image',
        'buttonText',
        'buttonLink',
        'textLine1',
        'textLine2',
        'user_id',
    ];

    /**
     * Get the user that created this hero (belongs to one-to-many).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
