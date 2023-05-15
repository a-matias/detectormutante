<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class MutanteController extends Controller
{
    public function detectar(Request $request)
    {
        
        // Requiere una cadena de Arn para poder verificar si es mutación o no.
        $secuencia = $this->validate(request(), [
            'secuenciaArn' => 'required'
        ]);
        

        $secuencia = strtoupper($request->input('secuenciaArn'));
        $n = strlen($secuencia);
    
        // Crea una matriz NxN a partir de la secuencia
        $matriz = [];
        for ($i = 0; $i < $n; $i++) {
            $matriz[$i] = str_split($secuencia);
        }
    
        // Verifica si hay patrón de mutación en las diagonales de izquierda a derecha de abajo hacia arriba
        $patronMutacion = false;
        for ($i = 0; $i < $n; $i++) {
            $cont = 0;
            for ($j = 0; $j < $n - $i; $j++) {
                if ($matriz[$i + $j][$j] == $matriz[$i][$i] && ++$cont >= 4) {
                    $patronMutacion = true;
                    break;
                }
            }
            if ($patronMutacion) {
                break;
            }
        }
    
        // Devuelve una respuesta JSON indicando si es un mutante o no
        return response()->json([
            'mutante' => $patronMutacion,
            'matriz' => $matriz
        ]);
    }
}
/*
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
    
        // Verifica si hay patrón de mutación en las diagonales de izquierda a derecha de abajo hacia arriba
        $patronMutacion = false;
        for ($i = 0; $i < $n; $i++) {
            $cont = 0;
            for ($j = 0; $j < $n - $i; $j++) {
                if ($matriz[$i + $j][$j] == $matriz[$i][$i] && ++$cont >= 4) {
                    $patronMutacion = true;
                    break;
                }
            }
            if ($patronMutacion) {
                break;
            }
        }


    
        // Devuelve una respuesta JSON indicando si es un mutante o no

        return response()->json([
            'mutante' => $patronMutacion,
        ]);
    
       
    }
}
*/