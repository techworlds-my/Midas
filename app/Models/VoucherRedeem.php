<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class VoucherRedeem extends Model
{
    use SoftDeletes;

    public $table = 'voucher_redeems';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'vouchercode_id',
        'username',
        'merchant',
        'date',
        'amount',
        'type',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function vouchercode()
    {
        return $this->belongsTo(VoucherManagement::class, 'vouchercode_id');
    }
}
