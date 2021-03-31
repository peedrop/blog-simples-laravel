@extends('layouts.sistema')
@section('content')

@component('admin.components.table')
    @slot('create', route('blog.categories.create'))
    @slot('title', 'Categorias do Blog')
    @slot('head')
        <th width="90%">Nome</th>
        <th width="10%"></th>
    @endslot
    @slot('body')
        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td class="options">
                    <a href="{{ route('blog.categories.edit', $category->id) }}" class="btn btn-success"><i class="fas fa-pen"></i></a>
                    <a href="{{ route('blog.categories.show', $category->id) }}" class="btn btn-primary"><i class="fas fa-eye"></i></a>

                    <form class="form-delete" action="{{ route('blog.categories.destroy', $category->id) }}" method="post">
                        @csrf
                        @method('delete')

                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    @endslot
@endcomponent

@endsection

@push('scripts')
    <script src="{{ asset('js/components/dataTable.js') }}"></script>
    <script src="{{ asset('js/components/sweetAlert.js') }}"></script>
@endpush
