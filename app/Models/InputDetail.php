<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InputDetail extends Model
{
    use HasFactory;

    protected $fillable = ['quantity', 'input_id', 'refaccion_id'];
}
