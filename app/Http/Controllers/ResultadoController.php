<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResultadoController extends Controller{

    public function verResultado(Request $request)
    {
        $mutantes = $request->session()->get('mutantes', []);
        $noMutantes = $request->session()->get('no_mutantes', []);

        $totalMutantes = count($mutantes);
        $totalNoMutantes = count($noMutantes);
        $totalCadenas = $totalMutantes + $totalNoMutantes;

        $porcentajeMutantes = $totalCadenas > 0 ? ($totalMutantes / $totalCadenas) * 100 : 0;
        $porcentajeNoMutantes = $totalCadenas > 0 ? ($totalNoMutantes / $totalCadenas) * 100 : 0;

        return response()->json([
            'porcentajeMutantes' => $porcentajeMutantes,
            'porcentajeNoMutantes' => $porcentajeNoMutantes
        ]);
    }

}
