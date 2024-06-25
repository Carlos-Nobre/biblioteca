@extends('layouts.master')

@section('titulo','Cadastrar Livro')

@section('content')
<div class="erros">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <a>{{ $error }}</a>
            @endforeach
        </ul>
    </div>
@endif
</div>
<div class="container-fluid">
    @if (session('messege'))
        <h1>{{session('messege')}}</h1>
    @endif
    <div class="box">
        <form action="{{route('books.store')}}" method="POST">
            @csrf
            <label for="" class="form-label">Titulo:</label>
            <input type="text" name="titulo" placeholder="Nome" class="form-control">
        
            <label for="" class="form-label">Subtitulo:</label>
            <input type="text" name="sub_titulo" placeholder="Subtitulo" class="form-control">
            
            <label for="" class="form-label">Autor:</label>
            <input type="text" name="autor" placeholder="Autor" class="form-control">
            
            <label for="" class="form-label">Edição:</label>
            <input type="text" name="edição" placeholder="Edição" class="form-control">
            
            <label for="" class="form-label">Editora:</label>
            <input type="text" name="editora" placeholder="Editora" class="form-control">
            
            <label for="" class="form-label">Capa do Livro:</label>
            <input class="form-control" type="text" name="imagem" placeholder="Coloque a url da imagem">

            <label for="" class="form-label">Data da Publicação:</label>
            <input type="date" name="date_publish" placeholder="Data da publicação">

            <input type="hidden" name="id_user" value="{{Auth::id()}}">
            <button type="submmit" class="btn btn-success">Salvar</button>
        </form>
     </div>
</div>
@endsection