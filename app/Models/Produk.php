<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $guarded = ['id'];

    public function Category(){
        return $this->belongsTo(Category::class);
    }

    public function getRouteKeyName()
    {
        return 'nama';
    }
}
