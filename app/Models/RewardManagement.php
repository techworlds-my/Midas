<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class RewardManagement extends Model
{
    use SoftDeletes;

    public $table = 'reward_managements';

    protected $dates = [
        'expired',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'merchant_id',
        'category_id',
        'expired',
        'title',
        'top_up_amount',
        'purchase_amount',
        'referral_amount',
        'bonus',
        'point',
        'voucher_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function merchant()
    {
        return $this->belongsTo(MerchantManagement::class, 'merchant_id');
    }

    public function category()
    {
        return $this->belongsTo(RewardCatogery::class, 'category_id');
    }

    public function getExpiredAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setExpiredAttribute($value)
    {
        $this->attributes['expired'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function voucher()
    {
        return $this->belongsTo(VoucherManagement::class, 'voucher_id');
    }
}
