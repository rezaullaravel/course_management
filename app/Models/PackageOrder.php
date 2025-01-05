<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageOrder extends Model
{
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function package(){
        return $this->belongsTo(Package::class,'package_id');
    }
}
