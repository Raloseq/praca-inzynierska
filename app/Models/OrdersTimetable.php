<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdersTimetable extends Model
{
    use HasFactory;

    protected $table = 'orders_timetable';

    protected $fillable = [
        'title', 'start', 'end', 'user_id'
    ];
}
