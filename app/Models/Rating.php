<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = ['name','movie_id','score'];
    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
