<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class AddonManagement extends Model
{
    use SoftDeletes;

    public $table = 'addon_managements';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'category_id',
        'title',
        'price',
        'is_enable',
        'item_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function category()
    {
        return $this->belongsTo(AddOnCategory::class, 'category_id');
    }

    public function item()
    {
        return $this->belongsTo(ItemManagement::class, 'item_id');
    }
}
