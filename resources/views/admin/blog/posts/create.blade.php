@extends('layouts.sistema')

@section('content')

@component('admin.components.create')
    @slot('title', 'Cadastrar Post no Blog')
    @slot('url', route('blog.posts.store'))
    @slot('form')
        @include('admin.blog.posts.form')
    @endslot
@endcomponent

@endsection
