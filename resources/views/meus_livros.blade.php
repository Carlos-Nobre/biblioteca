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
        <div class="box">
            <h2>SEUS LIVROS</h2>
            <table class="table table-bordered border-black">
                <th>
                    Titulo
                </th>
                <th>
                    Autor
                </th>
                <th>
                    Ações
                </th>
            @foreach ($books as $book)
                <tr>
                    <td>
                        {{$book->titulo}}
                    </td>
                    <td>
                        {{$book->autor}}
                    </td>
                    <td>
                        <a href="{{route('books.edit' , ['book'=>$book->id])}}"> edit </a> | <a
                        href="{{route('books.show' , ['book'=>$book->id])}}">Mais Informações</a>
                    </td>
                </tr>
            @endforeach
            </table>
            <ul class="pagination">
                {{$books->links()}}
            </ul>
            

            <button class="btn btn-success cadastro"><a href="{{route('books.create')}}" style="text-decoration: none;color:white;"> Adicionar Novo Livro</a></button>
        </div>
        @if (session()->has('message'))
            <div class="alert alert-success" role="alert">{{session()->get('message')}}</div>    
        @endif
    </div>
@endsection