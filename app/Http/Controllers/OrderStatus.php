<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderStatus extends Controller
{
    public static function getOrderStatus(){
        return ['Em Aberto', 'Realizado', 'Confirmado', 'Concluído', 'Cancelado'];
    }
}
