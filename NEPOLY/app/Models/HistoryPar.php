<?php

namespace App\Models;
// HEADER ИСТОРИИИ
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryPar extends Model
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
    public function historyText()
    {
        return $this->hasMany(HistoryText::class,'history_id', 'id' );
        # code...
    }
    public function comments()
    {
        return $this->hasMany(Comment::class,'post_id', 'id');
        # code...
    }
    public function getAllComments()
    {
        return $this->hasOneThrough(CommentPar::class, HistoryText::class, 'history_id', 'history_parId');
    }
}
