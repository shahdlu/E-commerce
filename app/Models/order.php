<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $guarded=[];
    function user(){
        return $this->belongsTo(User::class);
    }
    function products(){
        return $this->belongsToMany(Product::class);
    }
}
