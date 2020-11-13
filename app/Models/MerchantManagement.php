<?php

namespace App\Models;

use App\Traits\Auditable;
use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class MerchantManagement extends Model
{
    use SoftDeletes, MultiTenantModelTrait, Auditable;

    public $table = 'merchant_managements';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'company_name',
        'ssm',
        'address',
        'postcode',
        'in_charge_person',
        'contact',
        'email',
        'position',
        'category_id',
        'sub_cateogry_id',
        'website',
        'facebook',
        'instagram',
        'level_id',
        'merchant',
        'merchant_admin',
        'merchant_manager',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by_id',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function category()
    {
        return $this->belongsTo(MerchantCategory::class, 'category_id');
    }

    public function sub_cateogry()
    {
        return $this->belongsTo(MerchantSubCategory::class, 'sub_cateogry_id');
    }

    public function level()
    {
        return $this->belongsTo(MerchantLevel::class, 'level_id');
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }
}
