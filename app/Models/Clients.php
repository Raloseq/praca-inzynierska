<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Clients
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property string $surname
 * @property string|null $NIP
 * @property string|null $company_name
 * @property string $phone
 * @property string $email
 * @property int $user_id
 * @property-read \App\Models\ClientAddress|null $client_address
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ServiceOrders[] $service_orders
 * @property-read int|null $service_orders_count
 * @method static \Database\Factories\ClientsFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Clients newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Clients newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Clients query()
 * @method static \Illuminate\Database\Eloquent\Builder|Clients whereCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clients whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clients whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clients whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clients whereNIP($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clients whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clients wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clients whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clients whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clients whereUserId($value)
 * @mixin \Eloquent
 */
class Clients extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable = [
        'name', 'surname', 'phone', 'email', 'NIP', 'company_name'
    ];

    public function client_address()
    {
        return $this->hasOne(ClientAddress::class, 'client_id', 'id');
    }

    public function service_orders()
    {
        return $this->hasMany(ServiceOrders::class, 'client_id', 'id');
    }
}
