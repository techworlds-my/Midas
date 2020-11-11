<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use \DateTimeInterface;

class AddDefect extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'add_defects';

    protected $appends = [
        'image',
    ];

    protected $dates = [
        'available_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'username_id',
        'category_id',
        'defect',
        'available_date',
        'available_time',
        'remark',
        'status_id',
        'inchargeperson_id',
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

    public function username()
    {
        return $this->belongsTo(User::class, 'username_id');
    }

    public function category()
    {
        return $this->belongsTo(DefectCategory::class, 'category_id');
    }

    public function getImageAttribute()
    {
        $files = $this->getMedia('image');
        $files->each(function ($item) {
            $item->url       = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview   = $item->getUrl('preview');
        });

        return $files;
    }

    public function getAvailableDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setAvailableDateAttribute($value)
    {
        $this->attributes['available_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function status()
    {
        return $this->belongsTo(StatusControl::class, 'status_id');
    }

    public function inchargeperson()
    {
        return $this->belongsTo(User::class, 'inchargeperson_id');
    }
}
