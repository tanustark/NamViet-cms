<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'taskName',
        'taskBody',
        'deadline',
        'assignedTo',
        'user_id',
        'startDate',
        'endDate'
    ];

    public function users(){
        return $this->belongsTo(User::class, 'assignedTo');
    }
}
