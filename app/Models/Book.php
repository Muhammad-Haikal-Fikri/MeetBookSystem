<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    protected $with = ["user"];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }


    public function room()
    {
        return $this->belongsTo('App\Models\Room');
    }
}
