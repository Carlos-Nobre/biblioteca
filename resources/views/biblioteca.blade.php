@extends('layouts.master')

@section('titulo','Biblioteca')

@section('content')
    <nav class="navbar">
        
        <ul>
            <li><a class="a" href="{{route('home')}}">Home</a></li>
            <li><a class="a" href="{{route('books.index')}}">Meus Livros</a></li>
            <li><a class="a" href="{{route('books.create')}}">Cadastrar Livros</a></li>
            <li><a class="a" href="{{route('logout')}}">Sair</a></li>
        </ul>
        <h5>Seja bem-vindo, {{Auth::user()->name}}</h5>
    </nav>
    <div class="container-fluid">
        <img src="/img/8811-flirty-fboy.png" alt="" style="height: 60vh">
        <h2 style="color: white">SEJA BEM VINDO, {{Auth::user()->name}} . 
            <br>Aproveite bem seu sistema de livros.</h2>
    </div>


@endsection