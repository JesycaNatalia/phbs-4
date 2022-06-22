<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabanUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'bulan_id',
        'ppemantauan_id',
        'kuisoner_id',
        'isi_kuisoner_id',
        'user_id',
    ];

    public function isi_kuisoner()
    {
        return $this->belongsTo('App\Models\IsiKuisoner');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
