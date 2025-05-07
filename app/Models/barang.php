<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    protected $fillable =[
        'name',
        'description',
        'stock',
        'price',
        'category_id',
        'satuan_id'
    ];

    public function category(){
        return $this->belongsTo(category::class);
    }
    public function satuan(){
        return $this->belongsTo(satuan::class);
    }
}
