@extends('layouts.master')

@section('titulo','Login')
    <div class="container-fluid">
        <div class="box">
            <h1>Login</h1>
            @if (session('message'))
                <div class="alert alert-danger"><h5>{{session('message')}}</h5></div>
            @endif
            <form action="{{ route('user.auth') }}" method="POST">
                @csrf
                <label class="form-label">Email:</label>
                <input class="form-control" type="text"  name='email' placeholder="Digite seu email">
                <label class="form-label">Senha:</label>
                <input class="form-control" type="password"  name='password' placeholder="Digite sua senha ">
                <button type="submmit" class="btn btn-outline-success submit ">LOGAR</button>
            </form>
            <h6>Não tem uma conta ainda?<a href="{{route('user.register')}}">Click aqui para Cadastrar-se</a></h6>
        </div>
    </div>
    {{-- {{$books->links()}} --}}

@section('content')

@endsection