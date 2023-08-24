<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SparePartsOutput extends Model
{
    use HasFactory;

    protected $fillable = ['items', 'status', 'user_id'];
}
