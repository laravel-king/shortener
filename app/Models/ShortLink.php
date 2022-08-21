<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ShortLink extends Model
{
    use HasFactory;

    protected $fillable=['code', 'link', 'user_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected static function booted()
    {
        if (auth()->check()){
            static::addGlobalScope('ancient', function (Builder $builder) {
                $builder->where('user_id', auth()->id());
            });
        }

    }

}
