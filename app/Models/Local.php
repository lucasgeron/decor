<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    use HasFactory;

    protected $fillable = ['status', 'title',  'address', 'number', 'district', 'cep', 'city', 'phone1', 'phone2'];


}
