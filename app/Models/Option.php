<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Option
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Option newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Option newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Option query()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProductOption[] $productOptions
 * @property-read int|null $product_options_count
 * @property int $id
 * @property string $name_en
 * @property string $name_ko
 * @property string|null $thumbnail 옵션 이미지
 * @property int $sort 디폴트 시간
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Option whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Option whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Option whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Option whereNameKo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Option whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Option whereThumbnail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Option whereUpdatedAt($value)
 * @property string $slug
 * @method static \Illuminate\Database\Eloquent\Builder|Option whereSlug($value)
 */
class Option extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name_en',
        'name_ko',
        'thumbnail',
        'sort'
    ];

    // order 는 Product 과 N:N 관계 이다.
    public function products(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany('App\Models\Product');
    }
}
