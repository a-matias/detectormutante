@extends('app')

@section('contenido')

<div class="container">
    <form action="{{ route ('mutacion') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="secuenciaArn">Cadena de Nucleótidos:</label>
            <input type="text" class="form-control" id="secuenciaArn" name= "secuenciaArn"  placeholder="Ingrese una cadena. Ej: A G U C A G U C">
            <small>*3 caracteres o más para que impacte en el resultado</small>
        </div>
        
        <button type="submit" class="btn btn-primary">Enviar muestra</button>
    </form>
    <br>
    <form action="{{ route ('resultado') }}" method="get">
      <button type="submit" class="btn btn-primary">Ver resultados</button>
    </form>
</div>


@endsection