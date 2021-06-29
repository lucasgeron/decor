<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    use HasFactory;
    

    protected $fillable = ['title', 'status'];


    


    public function products() {
        // One to One 
        return $this->hasMany(Product::class);
    }


}
