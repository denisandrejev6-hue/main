<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Lietotajs extends Authenticatable
{
    use Notifiable;

    // actual database table uses plural form
    protected $table = 'lietotaji';
    protected $primaryKey = 'ID';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'vards',
        'uzvards',
        'loma',
        'epasts',
        'parole',
    ];

    protected $hidden = [
        'parole',
        'remember_token',
    ];

    /**
     * Override the default password field name for Laravel auth.
     */
    public function getAuthPassword(): string
    {
        return $this->parole;
    }
}
