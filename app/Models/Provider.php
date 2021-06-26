<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Provider
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property string $city
 * @property string $address
 * @method static \Illuminate\Database\Eloquent\Builder|Provider newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Provider newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Provider query()
 * @method static \Illuminate\Database\Eloquent\Builder|Provider whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provider whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provider whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provider whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provider whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provider whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int|null $opening_from
 * @property int|null $opening_to
 * @property int $publish
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Category[] $categories
 * @property-read int|null $categories_count
 * @method static \Illuminate\Database\Eloquent\Builder|Provider whereOpeningFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provider whereOpeningTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provider wherePublish($value)
 */
class Provider extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'city',
        'address',
    ];

    public function categories() {
        return $this->belongsToMany(Category::class);
    }
}
