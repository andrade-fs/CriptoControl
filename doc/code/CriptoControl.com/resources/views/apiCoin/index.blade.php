@extends('layouts.master')
@section('titulo',"CriptoControl")
@section('contenido')

<h1 class="h3 mb-4 text-gray-800">CRIPTO CONTROL</h1>
<h1 class="h3 mb-4 text-gray-800">APi Coin Market dAVIS</h1>


<h1>Price BTC {{ $json_monedas['quote']['USD']['price']}}</h1>
<h1>AÑADIR MONEDA</h1>
<h1>Visulizar proifits</h1>
@endsection()