<?php

namespace App\Http\Controllers;

use App\Models\Mechanic;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MechanicController extends Controller
{
    public function index():View{
        return view('mechanics.index', [
            'mechanics' => Mechanic::all()
        ]);
    }

    public function create():View{
        return view('mechanics.create');
    }
}
