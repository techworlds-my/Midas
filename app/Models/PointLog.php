<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class PointLog extends Model
{
    use SoftDeletes;

    public $table = 'point_logs';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'username_id',
        'title_id',
        'point_gain',
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

    public function title()
    {
        return $this->belongsTo(PointCondition::class, 'title_id');
    }
}
