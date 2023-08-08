<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'image',
        'title',
        'content',
    ];

    protected $dispatchesEvents = [
        // 'created' => PostCreated::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function chirps(): HasMany
    {
        return $this->hasMany(Chirp::class);
    }
}
