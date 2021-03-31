@extends('layouts.sistema')

@section('content')

@component('admin.components.edit')
    @slot('title', 'Editar Categoria no Blog')
    @slot('url', route('blog.categories.update', $category->id))
    @slot('form')
        @include('admin.blog.categories.form')
    @endslot
@endcomponent

@endsection
