<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
