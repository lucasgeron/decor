<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Cities extends Controller
{

    public static function getCities(){
        return ['Guarapuava - PR', 'Ponta Grossa - PR', 'Irati - PR'];
    }
}
