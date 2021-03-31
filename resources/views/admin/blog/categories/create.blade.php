@extends('layouts.sistema')

@section('content')

@component('admin.components.create')
    @slot('title', 'Cadastrar Categoria no Blog')
    @slot('url', route('blog.categories.store'))
    @slot('form')
        @include('admin.blog.categories.form')
    @endslot
@endcomponent

@endsection
