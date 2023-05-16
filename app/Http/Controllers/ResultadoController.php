<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResultadoController extends Controller{

    public function verResultado(Request $request)
    {   
        // Obtiene el arreglo de secuencias mutantes almacenadas en la sesión, si no existe, asigna un array vacío
        $mutantes = $request->session()->get('mutantes', []);
        // Obtiene el arreglo de secuencias no mutantes almacenadas en la sesión, si no existe, asigna un array vacío
        $noMutantes = $request->session()->get('no_mutantes', []); 
        
        $totalMutantes = count($mutantes); // Obtiene el número total de secuencias mutantes
        $totalNoMutantes = count($noMutantes); // Obtiene el número total de secuencias no mutantes
        $totalCadenas = $totalMutantes + $totalNoMutantes; // Calcula el total de secuencias (mutantes + no mutantes)
        
        //Calcula el porcentaje de secuencias Mutantes respecto al total
        $porcentajeMutantes = $totalCadenas > 0 ? ($totalMutantes / $totalCadenas) * 100 : 0; 
        // Calcula el porcentaje de secuencias NO mutantes respecto al total
        $porcentajeNoMutantes = $totalCadenas > 0 ? ($totalNoMutantes / $totalCadenas) * 100 : 0; 
        
        // Devuelve un Json con la info generada.
        return response()->json([
            'PorcentajeMutantes' => $porcentajeMutantes.'%',
            'PorcentajeNoMutantes' => $porcentajeNoMutantes.'%',
            'CantidadCadenasArn' => $totalCadenas
        ]);
    }

}
