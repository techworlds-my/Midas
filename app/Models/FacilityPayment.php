<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use \DateTimeInterface;

class FacilityPayment extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'facility_payments';

    protected $appends = [
        'reciept',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const STATUS_SELECT = [
        'Pending' => 'Pending',
        'Paid'    => 'Paid',
        'Cancel'  => 'Cancel',
        'Overdue' => 'OverDue',
    ];

    protected $fillable = [
        'facility_id',
        'username_id',
        'amount',
        'payment_method_id',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function facility()
    {
        return $this->belongsTo(FacilityManagement::class, 'facility_id');
    }

    public function username()
    {
        return $this->belongsTo(User::class, 'username_id');
    }

    public function payment_method()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id');
    }

    public function getRecieptAttribute()
    {
        return $this->getMedia('reciept')->last();
    }
}
