@extends('layouts.site')

@section('title', 'Projeto de exemplo')

@section('content')
    <h4 class="text-center mt-4">Lista de funcionalidades:</h4>
    <div class="row justify-content-center">
        <ol>
            <li>Laravel 8 e AdminLTE</li>
            <li>Contato</li>
            <li>Usuário</li>
            <ol>
                <li>Login</li>
                <li>Registrar</li>
                <li>Permissão admin para escritor</li>
                <li>Perfil</li>
                <li>Nível de permissão</li>
                <li>Esqueceu sua senha?</li>
                <li>Confirmação de e-mail</li>
            </ol>
            <li>Blog</li>
            <ol>
                <li>Gerenciamento Categoria</li>
                <li>Gerenciamento Posts</li>
                <li>Filtros: pesquisa, categoria, meses</li>
            </ol>
        </ol>
    </div>
@endsection
