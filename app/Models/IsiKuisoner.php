<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IsiKuisoner extends Model
{
    use HasFactory;

    protected $fillable = [
        'kuisoner_id',
        'jawaban',
        'skor',
    ];
}
