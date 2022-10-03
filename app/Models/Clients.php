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
        return $this->hasMany(ClientAddress::class, 'client_id', 'id');
    }
}
