@extends('layouts.sistema')

@section('content')
    @component('admin.components.show')
        @slot('title', 'Detalhes da Categoria do Blog')
        @slot('content')
            @include('admin.blog.categories.form')
        @endslot
        @slot('back')
            <a href="{{ route('blog.categories.edit', $category->id) }}" class="btn btn-primary float-right ml-1"><i class="fas fa-pen"></i> Editar</a>
            <a href="{{ route('blog.categories.index') }}" class="btn btn-dark float-right"><i class="fas fa-undo-alt"></i> Voltar</a>
        @endslot
    @endcomponent
@endsection

@push('scripts')
    <script>
        $(".form-control").attr("disabled", true);
    </script>
    <script src="{{ asset('js/components/dataTable.js') }}"></script>
    <script src="{{ asset('js/components/sweetAlert.js') }}"></script>
@endpush
