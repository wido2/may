<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class satuan extends Model
{
    protected $fillable = ['name', 'description', 'is_active'];

    public function barang(){
        return $this->hasMany(barang::class);
    }
}
