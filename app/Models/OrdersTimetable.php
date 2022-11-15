<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\OrdersTimetable
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $title
 * @property string $start
 * @property string $end
 * @property int $user_id
 * @method static \Illuminate\Database\Eloquent\Builder|OrdersTimetable newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrdersTimetable newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrdersTimetable query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrdersTimetable whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrdersTimetable whereEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrdersTimetable whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrdersTimetable whereStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrdersTimetable whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrdersTimetable whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrdersTimetable whereUserId($value)
 * @mixin \Eloquent
 */
class OrdersTimetable extends Model
{
    use HasFactory;

    protected $table = 'orders_timetable';

    protected $fillable = [
        'title', 'start', 'end', 'user_id'
    ];
}
