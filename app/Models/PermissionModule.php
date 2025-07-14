<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class PermissionModule extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function permission(){
        return $this->hasMany(Permission::class,'permission_module_id');
    }
}
