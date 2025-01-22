<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faq;
use Yoeunes\Toastr\Facades\Toastr;

class FAQController extends Controller
{
    public function index() {
        $faqs = Faq::all();
        return view('system.faqs.index', compact('faqs'));
    }

    public function create() {
        return view('system.faqs.create');
    }

    public function store(Request $request)
    {
        $faq = new Faq;

        $faq->pregunta = $request->pregunta;
        $faq->respuesta = $request->respuesta;
        $faq->save();
    
        Toastr::success('Pregunta creada');
        return redirect()->route('faqsA.index');
    }

    public function show($id) {
        $faq = Faq::find($id);
        return view('system.faqs.show', compact('faq'));
    }

    public function edit($id) {
        $faq = Faq::find($id);
        return view('system.faqs.edit', compact('faq'));
    }

    public function update(Request $request, $id) {
        $faq = Faq::find($id);

        $faq->pregunta = $request->pregunta;
        $faq->respuesta = $request->respuesta;
        $faq->update();

        Toastr::success('Pregunta actualizada');
        return redirect()->route('faqsA.index');
    }

    public function destroy($id) {
        $faq = Faq::find($id);
        if ($faq) {
            $faq->delete();
            Toastr::success('Pregunta eliminada');
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Pregunta no encontrada'], 404);
        }
    }
}