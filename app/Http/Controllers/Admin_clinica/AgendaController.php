<?php

namespace App\Http\Controllers\Admin_clinica;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index()
    {
        return view('/admin-clinica/agenda/index');
    }
}
