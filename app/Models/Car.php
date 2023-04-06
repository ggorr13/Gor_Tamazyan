<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Car extends Model
{
    protected $fillable = ['image','description','published','mark_id','type_id'];

    public function mark(): BelongsTo
    {
        return $this->belongsTo(Mark::class,'mark_id');
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class,'type_id');
    }

    public function scopePublished(Builder $query, bool $operator = true): Builder
    {
        return $query->where('published', $operator);
    }
}
