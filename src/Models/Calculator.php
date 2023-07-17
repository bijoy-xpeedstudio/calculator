<?php

namespace Bijoy\Math\models;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Calculator extends Model
{
    use HasFactory;

    protected $table = 'calculator';
    protected $fillable = [
        'val0',
        'val1',
        'type'
    ];
}
