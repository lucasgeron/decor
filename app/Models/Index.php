<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Index extends Model
{
    use HasFactory;

    protected $fillable = ['title',  'local_id'];

    public function local(){
        return $this->belongsTo(Local::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}
