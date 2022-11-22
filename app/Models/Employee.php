<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Employee
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property string $surname
 * @property string $phone
 * @property string|null $position
 * @property string $salary
 * @property int $user_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ServiceOrders[] $service_oders
 * @property-read int|null $service_oders_count
 * @method static \Database\Factories\EmployeeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee query()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereSalary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereUserId($value)
 * @mixin \Eloquent
 */
class Employee extends Model
{
    use HasFactory;

    protected $table = 'employee';

    protected $fillable = [
        'name', 'surname', 'phone','position','salary'
    ];

    public function service_orders()
    {
        return $this->hasMany(ServiceOrders::class, 'employee_id', 'id');
    }
}
