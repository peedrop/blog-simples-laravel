@extends('layouts.sistema')
@section('content')

@component('admin.components.table')
    @slot('create', route('blog.posts.create'))
    @slot('title', 'Posts do Blog')
    @slot('head')
        <th width="20%">Autor</th>
        <th width="50%">Título</th>
        <th width="20%">Publicação</th>
        <th width="10%"></th>
    @endslot
    @slot('body')
        @foreach ($posts as $post)
            <tr>
                <td>{{ $post->user->nameSplit(2) }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ date('d/m/Y', strtotime($post->updated_at)) }}</td>
                <td class="options">
                    <a href="{{ route('blog.posts.edit', $post->id) }}" class="btn btn-success"><i class="fas fa-pen"></i></a>
                    <a href="{{ route('blog.posts.show', $post->id) }}" class="btn btn-primary"><i class="fas fa-eye"></i></a>

                    <form class="form-delete" action="{{ route('blog.posts.destroy', $post->id) }}" method="post">
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
