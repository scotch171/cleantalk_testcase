<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        's_name',
        'email',
        'phone',
        'notes',
        'boss_id',
    ];

    public function slaves(): HasMany
    {
        return $this->hasMany(self::class, 'boss_id');
    }

    public function boss(): BelongsTo
    {
        return $this->belongsTo(self::class, 'boss_id');
    }
}
