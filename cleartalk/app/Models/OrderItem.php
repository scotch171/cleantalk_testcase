<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\OrderItem
 *
 *
 * @property int $good_id
 * @property float $price
 * @property int $quantity
 * @property-read Good|null $good
 * @method static Builder|OrderItem newModelQuery()
 * @method static Builder|OrderItem newQuery()
 * @method static Builder|OrderItem query()
 * @mixin Eloquent
 */
class OrderItem extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'good_id',
        'price',
        'quantity',
    ];


    public function good(): BelongsTo
    {
        return $this->belongsTo(Good::class);
    }
}
