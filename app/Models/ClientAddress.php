<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientAddress extends Model
{
    use HasFactory;

    protected $primaryKey = "id_adres_klienta";

    public $incrementing = false;

    protected $fillable = [
        'wojewodztwo', 'miasto', 'ulica', 'kod_pocztowy'
    ];
}
