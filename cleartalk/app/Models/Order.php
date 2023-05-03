<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Order
 *
 * @property int $user_id
 * @property string $status
 * @property string|float $total
 * @property string|float $paid_sum
 * @property-read Collection<int, OrderItem> $items
 * @property-read int|null $items_count
 * @property-read User|null $user
 * @method static Builder|Order newModelQuery()
 * @method static Builder|Order newQuery()
 * @method static Builder|Order query()
 * @mixin Eloquent
 */
class Order extends Model
{
    use HasFactory;

    public const S_CREATED = 'created';
    public const S_FINISHED = 'finished';
    public const S_DELETED = 'deleted';

    public const STATUSES = [
        self::S_CREATED,
        self::S_FINISHED,
        self::S_DELETED,
    ];

    protected $fillable = [
        'user_id',
        'status',
        'total',
        'paid_sum',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function isPaid(): bool
    {
        return (float)$this->total === (float)$this->paid_sum;
    }
}
