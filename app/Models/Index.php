<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Index extends Model
{
    use HasFactory;

    protected $fillable = ['title',  'locals_id'];

    public function locals() {
        return $this->belongsTo(Local::class);
    }


}
