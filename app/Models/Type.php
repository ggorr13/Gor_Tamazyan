<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = ['name','mark_id'];

    public function mark()
    {
        return $this->belongsTo(Mark::class,'mark_id');
    }
}
