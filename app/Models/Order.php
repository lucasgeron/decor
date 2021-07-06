<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['status', 'client_id'];

    public function client(){
        return $this->belongsTo(Client::class);
    }


}
