<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    protected $guarded = [];
    public function service()
    {
        return $this->hasMany(Service::class, 'service_id', 'id');
    }
}
