<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KartuKeluarga extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_kk',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function status_keluarga()
    {
        return $this->hasMany('App\Models\StatusKeluarga');
    }
}
