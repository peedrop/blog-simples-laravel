@extends('layouts.sistema')

@section('content')

@component('admin.components.edit')
    @slot('title', 'Editar Post no Blog')
    @slot('url', route('blog.posts.update', $post->id))
    @slot('form')
        @include('admin.blog.posts.form')
    @endslot
@endcomponent

@endsection
