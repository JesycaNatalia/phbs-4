<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResponUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'bulan_id',
        'kartu_keluarga_id',
        'total_skor',
    ];

    public function bulan()
    {
        return $this->belongsTo('App\Models\Bulan');
    }

    public function kartu_keluarga()
    {
        return $this->belongsTo('App\Models\KartuKeluarga');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
