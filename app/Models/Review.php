<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'customer_id',
        'service_id',
        'rating',
        'comment',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * The service that the review belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
