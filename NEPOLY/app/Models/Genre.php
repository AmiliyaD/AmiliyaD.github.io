<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function histories()
    {
        return $this->hasMany(HistoryPar::class, 'genre_id', 'id');
    }
}
