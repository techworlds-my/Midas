<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class VoucherWallet extends Model
{
    use SoftDeletes;

    public $table = 'voucher_wallets';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'username_id',
        'is_redeem',
        'voucher_id',
        'usage',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function username()
    {
        return $this->belongsTo(User::class, 'username_id');
    }

    public function voucher()
    {
        return $this->belongsTo(VoucherManagement::class, 'voucher_id');
    }
}
