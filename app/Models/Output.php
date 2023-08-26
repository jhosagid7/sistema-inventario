<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Output extends Model
{
    use HasFactory;

    protected $fillable = ['items','status', 'comment', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function outputs()
    {
        return $this->hasMany(OutputDetail::class);
    }
}
