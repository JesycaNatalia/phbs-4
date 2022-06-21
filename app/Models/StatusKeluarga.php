<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusKeluarga extends Model
{
    use HasFactory;

    protected $fillable = [
        'kartu_keluarga_id',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function kartu_keluarga()
    {
        return $this->belongsTo('App\Models\KartuKeluarga');
    }
}
