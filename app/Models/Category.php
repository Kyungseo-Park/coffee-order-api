<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Category
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @mixin \Eloquent
 * @property-read \App\Models\Office|null $office
 * @property int $id
 * @property string $name_en 카테고리 영어 이름
 * @property string $name_ko 카테고리 한글 이름
 * @property int $office_id office_id
 * @property int $parents 하위 카테고리인 경우 부모 id를 참조
 * @property int $is_show 공개 여부
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereIsShow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereNameKo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereOfficeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereParents($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 */
class Category extends Model
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
        'parents',
        'is_show',
        'office_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'is_show'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function office(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\Office', 'office_id');
    }
}
