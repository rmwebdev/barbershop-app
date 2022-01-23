<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Setting extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;

    public $table = 'settings';

    protected $appends = [
        'about_image',
        'cover_image',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'web_name',
        'email',
        'address',
        'tag_line',
        'phone',
        'open_hours',
        'about_web',
        'facebook',
        'instagram',
        'linkind',
        'twitter',
        'paragraf_tag_line',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 100, 100);
        $this->addMediaConversion('logo')->fit('crop', 800, 800);
        $this->addMediaConversion('preview')->fit('crop', 661, 800);
        $this->addMediaConversion('previewXl')->fit('crop', 1500, 800);
    }

    public function getAboutImageAttribute()
    {
        $file = $this->getMedia('about_image')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
            $file->logo   = $file->getUrl('logo');
            $file->previewXl   = $file->getUrl('previewXl');
        }

        return $file;
    }

    public function getCoverImageAttribute()
    {
        $file = $this->getMedia('cover_image')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
            $file->logo   = $file->getUrl('logo');
            $file->previewXl   = $file->getUrl('previewXl');
        }

        return $file;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}