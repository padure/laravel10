<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mechanic extends Model
{
    use HasFactory;
    public const NUMBER_PER_PAGE = 10;
    protected $fillable = [
        'name'
    ];
}
