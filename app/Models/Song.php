<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as templar;

class Song extends templar
{
    protected $connection = 'mongodb';
    protected $collection = 'songs';
    use HasFactory;
    protected $fillable = [
        'name',
        'url',
        'cover',
        'time',
        'type'

    ];
}
