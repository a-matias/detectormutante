@extends('app')

@section('contenido')

<div class="formulario">

    <form action="#" method="post">
        @csrf
    <label for="">Cadena de Nucleótidos:</label><br>
    <input type="text" name="arn" id="arn"><br>
    <button>Enviar</button>

    </form>

</div>


@endsection