@extends('layouts.master')

@section('titulo','Register')

@section('content')



<div class="container-fluid">
    @if(session()->has('message'))
        <div class="alert alert-success">{{session()->get('message')}}</div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="alertas">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="box">
        <h1>Registrar-se</h1>
        <form action="{{route('user.store')}}" method="POST">
        @csrf
        <label class="form-label">Seu nome:</label>
        <input class="form-control" type="text" name="name" placeholder="Seu nome" >
        <label class="form-label">Email:</label>
        <input class="form-control" type="text" name="email" placeholder="Seu email" >
        <label class="form-label">Senha:</label>
        <input class="form-control" type="password" name="password" placeholder="Sua senha" >
        <label class="form-label">Confirme sua senha:</label>
        <input class="form-control" type="password" name="password_confirmation" placeholder="Confirme sua senha">
        <button type="submit" class=" btn btn-outline-success submit">Cadastrar</button>
        <h6>Já tem uma conta?<a href="{{route('login')}}">Click aqui para Logar</a></h6>
        </form>
    </div>
</div>
@endsection