<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MutanteController extends Controller
{
    public function detectar(Request $request)
    {
        echo $secuencia = strtoupper($request->input('secuenciaArn'));
        echo $n = strlen($secuencia);
    
        // Crea una matriz NxN a partir de la secuencia
        $matriz = [];
        for ($i = 0; $i < $n; $i++) {
            $matriz[$i] = str_split($secuencia[$i]);
        }
    
        // Verifica si la suma de los nucleótidos en las diagonales principales es par
        $suma = [
            'main' => 0,
            'secondary' => 0,
        ];
        for ($i = 0; $i < $n; $i++) {
            $suma['main'] += ord($matriz[$i][$i]);
            $suma['secondary'] += ord($matriz[$i][$n - $i - 1]);
        }


        $esMutante = ($suma['main'] % 2 == 0 && $suma['secondary'] % 2 == 0);
    
        // Devuelve una respuesta JSON indicando si es un mutante o no

        return response()->json([
            'mutante' => $esMutante,
        ]);
    
       
    }
}
