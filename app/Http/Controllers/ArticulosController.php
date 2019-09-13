<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;


class ArticulosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articulos = App\Articulo::paginate();

        return view('articulos-index', compact('articulos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $articulosFamilia = App\ArticuloFamilia::all();

        return view('articulos-create', compact('articulosFamilia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'Nombre' => 'required',
            'Precio' => 'required',
            'Stock' => 'required',
            'Codigo' => 'required',
            //'Familia' => 'required',
        ]);

        $Nombre = $request->input('Nombre');
        $Precio = $request->input('Precio');
        $Stock = $request->input('Stock');
        $CodigoDeBarra = $request->input('Codigo');
        $FechaAlta = $request->input('Fecha');
        $IdArticuloFamilia = $request->input('Familia');
        $Activo = $request->input('Activo');
        
        \DB::insert("Insert into Articulos(Nombre, Precio, Stock, CodigoDeBarra, FechaAlta, IdArticuloFamilia, Activo)
         value ('$Nombre', '$Precio', $Stock, '$CodigoDeBarra', '$FechaAlta', $IdArticuloFamilia, $Activo)");
        
        return redirect("Articulos");

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
        $articulo = App\Articulo::where('IdArticulos', $id)->first();
        $articulosFamilia = App\ArticuloFamilia::all();

        return view('articulos-edit', compact('articulo', 'articulosFamilia'));
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
        $Nombre = $request->input('Nombre');
        $Precio = $request->input('Precio');
        $Stock = $request->input('Stock');
        $CodigoDeBarra = $request->input('Codigo');
        //$FechaAlta = $request->input('Fecha');
        $IdArticuloFamilia = $request->input('Familia');
        $Activo = $request->input('Activo');

        \DB::update("Update Articulos SET Nombre = '$Nombre', Precio = $Precio, Stock = $Stock, 
        CodigoDeBarra = '$CodigoDeBarra', IdArticuloFamilia = $IdArticuloFamilia, Activo = $Activo Where IdArticulos = $id");

        return redirect('Articulos');
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
            $articulo = App\Articulo::where("IdArticulos", $id)->first();
            \DB::delete("Delete from Articulos Where IdArticulos = $id");
            $articulos = App\Articulo::all();

            return response()->json(array(
                'total' => $articulos->count(),
                'mensaje' => "El ". $articulo->Nombre . " Fue Eliminado Exitosamente" 
            ));

       }
    }

    public function filtrar($id)
    {
        $articulos = App\Articulo::where("IdArticuloFamilia", $id)->get();

        return response()->json($articulos);
    }
}
