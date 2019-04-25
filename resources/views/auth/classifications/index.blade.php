@extends('adminlte::page')

@section('title', config('adminlte.title'))

@section('content_header')
    <span style="font-size:20px;">
        <i class="fa fa-database"></i> Lista de Classificações
    </span>
    <a href="{{route('classifications.index')}}" class="btn btn-success btn-sm">
        <i class="fa fa-plus"></i>Inserir um novo Registro
    </a>

    <ol class="breadcrumb">
        <li>
            <a href="{{route('home')}}">Dashboard</a>
        </li>

        <li class="active">
            Relação das Classificações
        </li>
    </ol>
@stop

@section('content')
    <p>A</p>
@stop

