<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use lemonpatwari\bangladeshgeocode\Models\District;
use lemonpatwari\bangladeshgeocode\Models\Thana;

class Customer extends Authenticatable
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

   public function district()
   {
       return $this->belongsTo(District::class, 'district_id', 'id');
   }


   public function thana()
   {
       return $this->belongsTo(Thana::class, 'thana_id', 'id');
   }
}