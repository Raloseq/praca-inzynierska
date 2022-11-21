<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ClientAddress
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $voivodeship
 * @property string $city
 * @property string $street
 * @property string $ZIP
 * @property int|null $client_id
 * @property-read \App\Models\Clients|null $clients
 * @method static \Database\Factories\ClientAddressFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAddress newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAddress newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAddress query()
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAddress whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAddress whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAddress whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAddress whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAddress whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAddress whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAddress whereVoivodeship($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAddress whereZIP($value)
 * @mixin \Eloquent
 */
class ClientAddress extends Model
{
    use HasFactory;

    protected $table = 'client_addresses';

    protected $fillable = [
        'voivodeship', 'city', 'street', 'ZIP', 'client_id'
    ];

    public function clients()
    {
        return $this->belongsTo(Clients::class, 'client_id', 'id');
    }
}
