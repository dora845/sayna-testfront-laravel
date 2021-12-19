<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as templar;

class CarteBancaire extends templar
{
    protected $connection = 'mongodb';
    protected $collection = 'carte_bancaires';
    use HasFactory;
    protected $fillable = [
        'month',
        'year',
        'default',

    ];
}
