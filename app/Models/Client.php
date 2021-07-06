<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['name',  'address', 'number', 'district', 'cep', 'city', 'phone1', 'phone2'];

    public function orders() {
        // One to One 
        return $this->hasMany(Orders::class);
    }

}
