<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
 
    protected $fillable = ['name','slug' ,'description'];

    public function barang(){
        return $this->hasMany(barang::class);
    }
}
