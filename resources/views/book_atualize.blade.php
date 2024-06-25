@extends('layouts.master')

@section('titulo','Login')

@section('content')


<div class="container-fluid">
    <div class="box">
        <form action="{{ route( 'books.update' , ['book' => $book->id])}} " method="POST">
            @csrf
            <input type="hidden" name="_method" value="PUT">
        
            <label class="form-label" for="">Titulo:</label>
            <input class="form-control" type="text" name="titulo" value="{{$book->titulo}}">
        
            <label class="form-label" for="">Subtitulo:</label>
            <input class="form-control" type="text" name="sub_titulo" value="{{$book->sub_titulo}}">
        
            <label class="form-label" for="">Autor:</label>
            <input class="form-control" type="text" name="autor"  value="{{$book->autor}}">
        
            <label class="form-label" for="">Edição:</label>
            <input class="form-control" type="text" name="edição" value="{{$book->edição}}">
        
            <label class="form-label" for="">Editora:</label>
            <input class="form-control" type="text" name="editora" value="{{$book->editora}}">
        
            <label class="form-label" for="">Data da Publicação:</label>
            <input class="form-control" type="date" name="date_publish" value="{{$book->date_publish}}">
        
            <button  class="btn btn-success" type="submmit">Salvar</button>
        </form>
     </div>
</div>


@endsection