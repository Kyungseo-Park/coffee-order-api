<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ProductOption
 *
 * @method static \Illuminate\Database\Eloquent\Builder|ProductOption newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductOption newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductOption query()
 * @mixin \Eloquent
 * @property-read \App\Models\Option|null $option
 * @property-read \App\Models\Product|null $product
 */
class ProductOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
    ];


    // Product_option 에는 1개의 Product 이 있다.
    public function product(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }

    // Product_option 에는 1개의 Product 이 있다.
    public function option(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\Option', 'option_id');
    }

}
