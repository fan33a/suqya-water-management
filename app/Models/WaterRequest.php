<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaterRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'representative_id',
        'point_id',
        'type',
        'emergency',
        'quantity',
        'status',
        'scheduled_time',
        'current_location',
    ];

    protected $casts = [
        'emergency' => 'boolean',
        'scheduled_time' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function representative()
    {
        return $this->belongsTo(User::class, 'representative_id');
    }

    public function distributionPoint()
    {
        return $this->belongsTo(DistributionPoint::class, 'point_id');
    }
} 