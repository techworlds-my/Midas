<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class CarparkLog extends Model
{
    use SoftDeletes;

    public $table = 'carpark_logs';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'carplate_id',
        'location_id',
        'time_in',
        'time_out',
        'price',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function carplate()
    {
        return $this->belongsTo(VehicleMangement::class, 'carplate_id');
    }

    public function location()
    {
        return $this->belongsTo(CarParkLocation::class, 'location_id');
    }
}
