<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MissionVision extends Model
{
    protected $guarded = [];

    protected $casts = [
        'multi_img' => 'array',
    ];
}
