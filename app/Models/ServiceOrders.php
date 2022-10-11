<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceOrders extends Model
{
    use HasFactory;

    protected $table = 'service_orders';

    protected $fillable = [
        'car_id', 
        'client_id', 
        'employee_id', 
        'admission_date' , 
        'end_date_pred', 
        'end_date', 
        'is_done', 
        'description', 
        'price',
        'damage_photo'
    ];

    public function cars()
    {
        return $this->belongsTo(Car::class, 'car_id', 'id');
    }

    public function employees()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }

    public function clients()
    {
        return $this->belongsTo(Clients::class, 'client', 'id');
    }
}
