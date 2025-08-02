<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'customer_id',
        'project_no',
        'scheduled_at',
        'subtotal',
        'discount',
        'payable',
        'address',
        'note',
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
