<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function Laravel\Prompts\outro;

class OutputDetail extends Model
{
    use HasFactory;

    protected $fillable = ['quantity', 'output_id', 'refaccion_id'];

    public function output()
    {
        return $this->belongsTo(Output::class);
    }

    public function refaccion()
    {
        return $this->belongsTo(Refaccion::class);
    }
}
