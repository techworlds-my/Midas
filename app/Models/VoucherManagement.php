<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class VoucherManagement extends Model
{
    use SoftDeletes;

    public $table = 'voucher_managements';

    protected $dates = [
        'expired',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const DISCOUNT_TYPE_SELECT = [
        'Amount'     => 'Amount',
        'Percentage' => 'Percentage',
    ];

    protected $fillable = [
        'merchant_id',
        'vouchercode',
        'discount_type',
        'value',
        'min_spend',
        'max_spend',
        'excluded_sales_item',
        'item_category_id',
        'usage_limit',
        'limit_item',
        'limit_per_user',
        'expired',
        'description',
        'is_free_shipping',
        'is_credit_purchase',
        'redeem_point',
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

    public function item_category()
    {
        return $this->belongsTo(ItemCateogry::class, 'item_category_id');
    }

    public function items()
    {
        return $this->belongsToMany(ItemManagement::class);
    }

    public function getExpiredAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setExpiredAttribute($value)
    {
        $this->attributes['expired'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }
}
