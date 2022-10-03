<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientAddress extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable = [
        'voivodeship', 'city', 'street', 'ZIP', 'client_id'
    ];

    public function clients()
    {
        return $this->belongsTo(Clients::class, 'client_id', 'id');
    }
}
