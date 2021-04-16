@extends('layouts.site')

@section('title', 'Post')

@section('content')
    <div class="shadow-lg mt-4">
        <h1 class="text-center p-3 mb-0 bg-dark">{{$post->title}}</h1>
        <h6 class="text-right p-2 bg-secondary">
            <img src="{{ asset('storage/img/profile/' . $post->user->profile_path) }}" width="5%" class="img-circle mr-2" alt="Foto Perfil">
            {{$post->verifyEdit()}} por {{ $post->user->nameSplit(1) }} em {{ date('d/m/Y', strtotime($post->updated_at)) }}
        </h6>
        <div class="row">
            <div class="col-sm-12 pr-5">
                <a href="{{route('blog')}}" class="float-right btn btn-dark">Voltar</a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 text-justify px-5 pb-5 pt-2">
                <img class="ml-4 w-50" align="right" src="{{ asset('storage/img/posts/' . $post->image_path) }}" alt="Imagem capa do blog">
                <p>{{$post->contents}}</p>
            </div>
        </div>
        @include('layouts.comments')
    </div>
@endsection
@push('scripts')
<script id="dsq-count-scr" src="http://blog-k9n2ndhwid.disqus.com/count.js" async></script>
    <script>
        (function() { // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');
        s.src = 'https://blog-k9n2ndhwid.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
        })();
    </script>

@endpush
