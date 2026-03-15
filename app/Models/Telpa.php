<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Telpa extends Model
{
    // legacy table
    protected $table = 'telpa';
    protected $primaryKey = 'ID';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'nosaukums',
        'ietilpiba',
    ];
}
