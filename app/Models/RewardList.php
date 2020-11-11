<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class RewardList extends Model
{
    use SoftDeletes;

    public $table = 'reward_lists';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'username_id',
        'reward_id',
        'reward_type',
        'amount',
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

    public function reward()
    {
        return $this->belongsTo(RewardManagement::class, 'reward_id');
    }
}
