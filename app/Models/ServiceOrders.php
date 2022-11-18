<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ServiceOrders
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $admission_date
 * @property string|null $end_date
 * @property int $is_done
 * @property string $description
 * @property string $price
 * @property string|null $damage_photo
 * @property int $car_id
 * @property int $employee_id
 * @property int $client_id
 * @property int $user_id
 * @property-read \App\Models\Car $cars
 * @property-read \App\Models\Clients|null $clients
 * @property-read \App\Models\Employee $employees
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceOrders newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceOrders newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceOrders query()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceOrders whereAdmissionDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceOrders whereCarId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceOrders whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceOrders whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceOrders whereDamagePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceOrders whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceOrders whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceOrders whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceOrders whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceOrders whereIsDone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceOrders wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceOrders whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceOrders whereUserId($value)
 * @mixin \Eloquent
 */
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
        return $this->belongsTo(Clients::class, 'client_id', 'id');
    }
}
