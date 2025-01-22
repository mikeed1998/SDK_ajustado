<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Configuracion;
use App\Seccion;
use App\Elemento;
use App\Faq;
use App\Politica;
use App\SliderPrincipal;
use App\Categoria;
use App\Catalogo;
use App\CatalogoCaracteristicas;
use App\CatalogoGaleria;
use App\Blog;
use App\Configuration;
use App\Galeria;
use App\Politic;
use App\Review;
use App\Solucion;
use App\Soporte;
use App\Tematica;

class SeccionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $seccion = Seccion::all();
        return view('system.modules.index', compact('seccion'));
    }

    public function show($seccion) {
        $config = Configuration::first();
		$seccion = Seccion::where('slug',$seccion)->first();
        // $elements = Elemento::where('seccion',$seccion->id)->get()->toBase();
        $elem_general = Elemento::all();
        $faqs = Faq::all();
        // $sliders = SliderPrincipal::all();
        $politicas = Politic::all();
        // $categorias = Categoria::all();
        // $catalogos = Catalogo::where('activo', 1)->get()->toBase();
        // $catalogo_caracteristicas = CatalogoCaracteristicas::all();
        // $catalogo_galeria = CatalogoGaleria::all();
        // $tematicas = Tematica::where('activo', 1)->get()->toBase();
        // $blogs = Blog::where('activo', 1)->get()->toBase();
        // $galeria_fotos = Galeria::all();
        // $soluciones = Solucion::all();
        // $reviews = Review::all();
        // $soporte = Soporte::all();

        if($seccion->slug == 'configuracion') { 
            $ruta = 'system.general.contact';
        } else if($seccion->slug == 'politicas') {
            $ruta = 'system.politics.index';
        } else if($seccion->slug == 'faqs') {    
            $ruta = 'system.faqs.index';
        } else {
            $ruta = 'system.modules.'.$seccion->slug;
        }

        // return view($ruta, compact('seccion', 'config', 'elem_general', 'soporte', 'faqs', 'politicas', 'elements', 'sliders', 'categorias', 'catalogos', 'catalogo_caracteristicas', 'catalogo_galeria', 'tematicas', 'blogs', 'galeria_fotos', 'soluciones', 'reviews'));
        return view($ruta, compact('seccion', 'config', 'elem_general', 'faqs', 'politicas'));
    }

    public function textglobalseccion(Request $request){
        if (empty($request->tabla)) {
            return false;
        }

        $nameSpace = '\\App\\';
        $model = $nameSpace . ucfirst($request->tabla);

        $field = $request->campo;
        $val = $request->valor;
        // $model = $model::find($request->id);
        // $model->$field = $request->valor;
        // $model->save();

        // $model::find($request->id)->update(["$field" => "$val"]);
        if ($model::find($request->id)->update(["$field" => "$val"])) {
            return response()->json(['success'=>true, 'mensaje'=>'Cambio Exitoso']);
        }else {
            // code...
            return response()->json(['success'=>false, 'mensaje'=>'Error al actualizar']);
        }
        // return $request->valor;
    }

}