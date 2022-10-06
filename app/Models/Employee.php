<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employee';

    protected $fillable = [
        'name', 'surname', 'phone','position','salary'
    ];

    public function service_oders()
    {
        return $this->hasMany(ServiceOrders::class, 'employee_id', 'id');
    }
}
