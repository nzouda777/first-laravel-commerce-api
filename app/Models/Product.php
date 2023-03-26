<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'price', 'slug',  'description'];
    // protected static function booted (){
    //      str_replace(" ", "-", $this->slug);
    // }
}
