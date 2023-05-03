<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Good
 *
 * @property string $name
 * @property float $price
 * @method static Builder|Good newModelQuery()
 * @method static Builder|Good newQuery()
 * @method static Builder|Good query()
 * @mixin \Eloquent
 */
class Good extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price'
    ];
}
