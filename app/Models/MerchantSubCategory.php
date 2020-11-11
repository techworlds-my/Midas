<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class MerchantSubCategory extends Model
{
    use SoftDeletes;

    public $table = 'merchant_sub_categories';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'cateogry_id',
        'sub_category',
        'in_enable',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function cateogry()
    {
        return $this->belongsTo(MerchantCategory::class, 'cateogry_id');
    }
}
