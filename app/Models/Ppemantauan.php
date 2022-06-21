<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ppemantauan extends Model
{
    use HasFactory;

    protected $fillable = [
        'namapemantauan'
    ];

    public function pertanyaan()
    {
        return $this->hasMany('App\Models\Kuisoner');
    }
}
