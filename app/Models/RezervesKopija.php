<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RezervesKopija extends Model
{
    // table name will be discovered at runtime; the database may use one of several
    // variants (with or without underscore, plural, etc.).
    protected $table;
    protected $primaryKey = 'ID';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'fails',
        'izveides_datums',
    ];

    /**
     * Determine the correct table name when the model is instantiated.
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        // try possible names in order of preference
        $possible = ['rezerves_kopija', 'rezerveskopija', 'rezerveskopijas'];
        foreach ($possible as $name) {
            if (\Illuminate\Support\Facades\Schema::hasTable($name)) {
                $this->table = $name;
                break;
            }
        }

        // fallback to the first variant if nothing exists; queries will then error
        $this->table ??= $possible[0];
    }
}
