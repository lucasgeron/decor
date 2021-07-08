<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'status', 'category_id', 'index_id', 'ref'];


    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function index(){
        return $this->belongsTo(Index::class);
    }

   
}
