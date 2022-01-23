<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Barbershop extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;

    public $table = 'barbershops';

    protected $appends = [
        'photo',
        'cover_img',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'slug',
        'address',
        'phone',
        'about_barber',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 100, 100);
        $this->addMediaConversion('preview')->fit('crop', 400, 300);
        $this->addMediaConversion('previewXl')->fit('crop', 1300, 600);
    }

    public function getPhotoAttribute()
    {
        $file = $this->getMedia('photo')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
            $file->previewXl   = $file->getUrl('previewXl');
        }

        return $file;
    }
    public function getCoverImgAttribute()
    {
        $file = $this->getMedia('cover_img')->last();
        if ($file) {
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
            $file->previewXl   = $file->getUrl('previewXl');
        }

        return $file;
    }

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}