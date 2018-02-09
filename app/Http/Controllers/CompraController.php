<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Compra;
use Auth;


class CompraController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display the template.
     *
     * @return \Illuminate\Http\Response
     */
    public function miscompras()
    {
        $compras = Compra::where('user_id',Auth::user()->id)
        ->with('publicacion.producto')
        ->paginate();

        return view('compras.miscompras.index')->with(compact('compras'));
    }

    /**
     * Display the template.
     *
     * @return \Illuminate\Http\Response
     */
    public function misventas()
    {
        $ventas = Compra::whereHas('publicacion',function ($q){
            $q->where('user_id',Auth::user()->id);
        })
        ->with('publicacion.producto')
        ->with('user')
        ->paginate();
        return view('compras.misventas.index')->with(compact('ventas'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get(Request $request)
    {
     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       

    }

    public function edit(Request $request, $id) {
       
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

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
       
    }
}
