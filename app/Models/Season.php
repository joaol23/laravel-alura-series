<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;
    protected $fillable = ['number'];

    function serie()
    {
        return $this->belongsTo(Serie::class);
    }

    function episodes()
    {
        return $this->hasMany(Episode::class);
    }
}
