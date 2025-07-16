<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $guarded = [];
    protected $casts = [
        'category_id' => 'integer',
    ];

    public function service_cate()
    {
        return $this->belongsTo(ServiceCategory::class, 'category_id', 'id');
    }
}
