<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kuisoner extends Model
{
    use HasFactory;

    protected $fillable = [
        'ppemantauan_id',
        'pertanyaan',
        'penjelasan',
    ];

    public function jawaban()
    {
        return $this->hasMany('App\Models\IsiKuisoner');
    }
}
