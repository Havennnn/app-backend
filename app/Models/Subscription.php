<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'plan_id',
        'starts_at',
        'ends_at', 
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(Provider::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}
