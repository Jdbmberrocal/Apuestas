<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreEquiposRequest;
use App\Models\Equipos;

class EquiposController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $equipos = Equipos::all();
            return response()->json([
                'status' => 200,
                'data' => $equipos
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 500,
                'data' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEquiposRequest $request)
    {
        try {
            $equipo = new Equipos();
            $equipo->nombre = $request->nombre;
            $equipo->pais = $request->pais;
            $equipo->ciudad = $request->ciudad;
            $equipo->estadio = $request->estadio;
            $equipo->fundacion = $request->fundacion;
            if($equipo->save())
            {
                return response()->json([
                    'status' => 200,
                    'data' => 'Equipo creado con exito'
                ], 200);
            }

        } catch (\Throwable $th) {
            return response()->json([
                'status' => 500,
                'data' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {

        } catch (\Throwable $th) {
            return response()->json([
                'status' => 500,
                'data' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {

        } catch (\Throwable $th) {
            return response()->json([
                'status' => 500,
                'data' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

        } catch (\Throwable $th) {
            return response()->json([
                'status' => 500,
                'data' => $th->getMessage()
            ], 500);
        }
    }
}
