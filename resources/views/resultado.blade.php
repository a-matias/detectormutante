@extends('app')

@section('contenido')

@if(isset($data))
    <h2>Resultados:</h2>
    <p>Porcentaje de true: {{ $percentageTrue }}%</p>
    <p>Porcentaje de false: {{ $percentageFalse }}%</p>
@else
    <p>No hay datos disponibles.</p>
@endif


@endsection