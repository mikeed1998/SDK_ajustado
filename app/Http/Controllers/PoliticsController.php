<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Politic;
use Yoeunes\Toastr\Facades\Toastr;

class PoliticsController extends Controller
{
    public function index() {
        $politics = Politic::all();
        return view('system.politics.index', compact('politics'));
    }

    public function create() {

    }

    public function store(Request $request) {
        //
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        // $politic = Politic::find($id);
        // return view('config.polititcas.edit', compact('politic'));
    }

    public function update(Request $request, $id) {
        $politic = Politic::find($id);
        $politic->descripcion = $request->descripcion;
        $politic->update();
        Toastr::success('Política actualizada');
        return redirect()->back();
    }

    public function destroy($id) {
        //
    }
}