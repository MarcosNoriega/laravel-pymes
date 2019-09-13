<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class ImagenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $imagenes = App\Imagen::where('idArticulo', $id)->get();
        $articulo = App\Articulo::where('idArticulos', $id)->first();
        return view('galeria-imagen', compact('imagenes', 'articulo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $file = $request->file('imagen');
        $path = public_path() . '/img';
        $fileName = uniqid() . $file->getClientOriginalName();
        $file->move($path, $fileName);
        $ruta =  "img/" . $fileName;

        \DB::insert("Insert into Imagen(ruta, idArticulo) value('$ruta', $id)");
        return back();

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->ajax()){
            $imagen = App\Imagen::where('Id', $id)->first();
            $ruta = public_path() . "/" . $imagen->ruta;
            $borrar = \File::delete($ruta);

            if($borrar){
                \DB::delete("Delete From Imagen Where Id = $id");
            }
            
        }
       
    }
}
