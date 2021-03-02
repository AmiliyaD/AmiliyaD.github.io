<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryText extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function genresId() {
        return $this->hasOne(Genre::class, 'id', 'genre_id');
    }
    public function userId()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
        # code...
    }
}
