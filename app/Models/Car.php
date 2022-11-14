<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table = 'cars';
    
    protected $fillable = [
        'VIN', 'registration_number', 'year', 'type', 'model', 'photo'
    ];

    public function types()
    {
        return $this->belongsTo(Type::class);
    }

    public function car_models()
    {
        return $this->belongsTo(CarModel::class);
    }

    public function service_oders()
    {
        return $this->hasMany(ServiceOrders::class, 'car_id', 'id');
    }
}
