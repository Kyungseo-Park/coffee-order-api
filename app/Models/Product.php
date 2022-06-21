<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Product
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Order[] $orders
 * @property-read int|null $orders_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProductOption[] $productOptions
 * @property-read int|null $product_options_count
 * @property int $id
 * @property int $category_id
 * @property string $name_en 카테고리 영어 이름
 * @property string $name_ko 카테고리 한글 이름
 * @property int $is_delete 삭제: API 에서 안 보내줌
 * @property string $thumbnail 썸네일 필수(없으면 default api에서)
 * @property string $status 판매중, 판매중단, 출시예정, 품절
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Order[] $subcategory
 * @property-read int|null $subcategory_count
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereIsDelete($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereNameKo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereThumbnail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @property string $slug
 * @property int $star 신메뉴
 * @property int $sort 정렬 순서(없을 경우 API에서 마지막에 추가
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereStar($value)
 */
class Product extends Model
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
        'is_delete',
        'thumbnail',
        'status',
    ];

    // Product 는 productOptions 과 N:N 관계 이다.
    public function productOptions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Models\ProductOption', 'product_id');
    }

    // Product 는 order 과 N:N 관계 이다.
    public function orders(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Models\Order', 'product_id');
    }

    public function subcategory()
    {
        // 쌸라쌸라
        return $this->hasMany('App\Models\Order', '패런트_id', '');
    }
}
