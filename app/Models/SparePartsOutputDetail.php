<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SparePartsOutputDetail extends Model
{
    use HasFactory;

    protected $fillable = ['quantity', 'comment', 'spare_parts_output_id', 'part_id'];
}
