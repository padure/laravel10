<?php

namespace App\Http\Controllers;

use App\Http\Requests\Mechanic\StoreMechanicRequest;
use App\Models\Mechanic;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;

class MechanicController extends Controller
{
    public function index():View{
        return view('mechanics.index', [
            'mechanics' => Mechanic::paginate(Mechanic::NUMBER_PER_PAGE)->fragment('mechanics')
        ]);
    }

    public function create():View{
        return view('mechanics.create');
    }

    public function store(StoreMechanicRequest $request):RedirectResponse{
        Mechanic::create($request->all());
        Session::flash('success', 'Datele au fost salvate cu succes!');
        return redirect()->route('mechanics.index');
    }
}
