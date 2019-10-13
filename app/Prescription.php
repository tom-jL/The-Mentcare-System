<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prescription extends Model
{
    use SoftDeletes;

    public $table = 'prescriptions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'price',
        'dosage',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function clients()
    {
        return $this->belongsToMany(Client::class);
    }

}
