@extends('layouts.app')

@section('title', 'urutan')

@section('content')

@foreach ($numbers as $number)
<h1> urutan ke - {{ $number['ke'] }}</h1>
<h2> nomor ke - {{ $number['nomor'] }}</h2> 
@endforeach

@endsection