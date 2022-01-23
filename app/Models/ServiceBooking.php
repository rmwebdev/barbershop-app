<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceBooking extends Model
{
    use HasFactory;

    public $table = 'service_bookings';

    protected $dates = [
        'time_book',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'stylist_id',
        'barbershop_id',
        'time_book',
        'total_price',
        'notes',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function stylist()
    {
        return $this->belongsTo(Stylist::class, 'stylist_id');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

    public function barbershop()
    {
        return $this->belongsTo(Barbershop::class, 'barbershop_id');
    }

    public function getTimeBookAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setTimeBookAttribute($value)
    {
        $this->attributes['time_book'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}