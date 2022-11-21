<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Car
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $VIN
 * @property string $registration_number
 * @property string $year
 * @property string|null $photo
 * @property string $type
 * @property string $model
 * @property int $user_id
 * @property-read \App\Models\CarModel|null $car_models
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ServiceOrders[] $service_oders
 * @property-read int|null $service_oders_count
 * @property-read \App\Models\Type|null $types
 * @method static \Database\Factories\CarFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Car newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Car newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Car query()
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereRegistrationNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereVIN($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereYear($value)
 * @mixin \Eloquent
 */
class Car extends Model
{
    use HasFactory;

    protected $table = 'cars';
    
    protected $fillable = [
        'VIN', 'registration_number', 'year', 'type', 'model', 'photo'
    ];

    public function service_oders()
    {
        return $this->hasMany(ServiceOrders::class, 'car_id', 'id');
    }
}
