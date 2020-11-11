<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class AddVisitor extends Model
{
    use SoftDeletes;

    public $table = 'add_visitors';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const STATUS_SELECT = [
        'Active'    => 'Active',
        'Disactive' => 'Disactive',
    ];

    protected $fillable = [
        'username_id',
        'add_by_id',
        'status',
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

    public function add_by()
    {
        return $this->belongsTo(User::class, 'add_by_id');
    }
}
