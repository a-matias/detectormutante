@extends('app')

@section('contenido')

<div class="formulario">

    <form action="{{ route ('mutacion') }}" method="post">
        @csrf
    <label for="secuenciaArn">Cadena de Nucleótidos:</label><br>
    <input type="text" name="secuenciaArn" id="secuenciaArn"><br>
    <button>Detectar</button>

    </form>

</div>


@endsection