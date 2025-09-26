<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = [
      'name',
        'slug',
        'price',
        'signup_fee',
        'currency', 
        'description',
        'interval_count',
        'interval',
    ];

    /**
     * Get the subscriptions associated with the plan.
     */
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
}
