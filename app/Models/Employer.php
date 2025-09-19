<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;

    // One employer can have many jobs
    public function jobs()
    {
        return $this->hasMany(\App\Models\Job::class);
    }
}
