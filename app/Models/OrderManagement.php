<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class OrderManagement extends Model
{
    use SoftDeletes;

    public $table = 'order_managements';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'order',
        'status_id',
        'username_id',
        'voucher',
        'address',
        'price',
        'delivery_charge',
        'tax',
        'total',
        'paymentmethod_id',
        'comment',
        'merchant',
        'transaction',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function status()
    {
        return $this->belongsTo(OrderStatus::class, 'status_id');
    }

    public function username()
    {
        return $this->belongsTo(User::class, 'username_id');
    }

    public function paymentmethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'paymentmethod_id');
    }
}
