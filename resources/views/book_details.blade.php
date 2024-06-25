@extends('layouts.master')

@section('titulo','Detalhes')

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
        <div class="box">
            <h1>Livro - {{$book->titulo}}</h1>
            <div class="conteudo">
                
                <div class="text" style="margin: 30px">
                    <h5>Subtitulo:  {{$book->sub_titulo}}</h5>
                    <h5>Autor:  {{$book->autor}}</h5>
                    <h5>Editora:  {{$book->editora}}</h5>
                    <h5>Edição:   {{$book->edição}}</h5>
                    <h5>Data da Publicação:   {{$book->date_publish}}</h5>
                </div>
                <div class="imagem">
                    <h5>CAPA:</h5>
                    <img src="{{$book->imagem}}" alt="">
                </div>
                
            </div>
            <form action="{{route('books.destroy' , ['book' => $book->id])}}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <button class="btn btn-danger" type="submit">Deletar</button>
            </form>
        </div>
    </div>
@endsection