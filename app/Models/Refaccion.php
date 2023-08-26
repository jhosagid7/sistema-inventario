<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refaccion extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'stock', 'alerts'];

    public function outputs()
    {
        return $this->hasMany(OutputDetail::class);
    }
}
