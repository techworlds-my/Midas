<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class CarparkPayment extends Model
{
    use SoftDeletes;

    public $table = 'carpark_payments';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'carplate',
        'location_id',
        'payment',
        'payment_method',
        'remark',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function location()
    {
        return $this->belongsTo(CarParkLocation::class, 'location_id');
    }
}
