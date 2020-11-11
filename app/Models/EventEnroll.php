<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class EventEnroll extends Model
{
    use SoftDeletes;

    public $table = 'event_enrolls';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'event_id',
        'username_id',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const STATUS_SELECT = [
        'Pending'  => 'Pending',
        'Approved' => 'Approved',
        'Rejected' => 'Rejected',
        'Canceled' => 'Canceled',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function event()
    {
        return $this->belongsTo(EventControl::class, 'event_id');
    }

    public function username()
    {
        return $this->belongsTo(User::class, 'username_id');
    }
}
