<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;

    protected $table = 'model';

    protected $fillable = [
        'name'
    ];

    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}
