<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Service extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;

    public $table = 'services';

    protected $appends = [
        'thumb',
        'price_img',
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
        'desc',
        'price',
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

    public function getThumbAttribute()
    {
        $file = $this->getMedia('thumb')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
            $file->previewXl   = $file->getUrl('previewXl');
        }

        return $file;
    }
    public function getPriceImgAttribute()
    {
        $file = $this->getMedia('price_img')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
            $file->previewXl   = $file->getUrl('previewXl');
        }

        return $file;
    }

    public function barbershops() {
        return $this->belongsToMany(Barbershop::class)
                    ->withPivot('barbershop_id');
      }

    public function getCoverImgAttribute()
    {
        $file = $this->getMedia('cover_img')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
            $file->previewXl   = $file->getUrl('previewXl');
        }
        return $file;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}