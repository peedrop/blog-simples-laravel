<div class="row">
    <div class="form-group col-sm-8">
        <label for="title" class="required">Título </label>
        <input type="text" name="title" id="title" class="form-control" required autofocus value="{{ old('title',$post->title) }}">

        <label for="subtitle" class="required mt-3">Subtítulo </label>
        <input type="text" name="subtitle" id="subtitle" class="form-control" required value="{{ old('subtitle',$post->subtitle) }}">

        <label for="category" class="required mt-3">Categoria </label>
        <select name="category_id" class="form-control select2" id="category_id" value="{{ old('category_id',$post->category_id) }}" required>
            <option></option>
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
        @if (!Route::is('blog.posts.show'))
            <label for="image_path" class="required mt-3">Imagem </label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="profile" name="image_path" accept="image/*" lang="pt-br">
                <label class="custom-file-label">Selecione uma imagem</label>
            </div>
        @endif
    </div>
    <div class="form-group col-sm-4">
        <h5 class="text-center"><b>Imagem</b></h5>
        <img class="card-img-top img-fluid shadow border" id="previewProfile" src="{{ asset('storage/img/posts/' . $post->image_path) }}" alt="Card image cap">
        <small class="float-right"><i>*preview</i></small>
    </div>
    <div class="form-group col-sm-12">
        <label for="headline" class="required">Resumo </label>
        <textarea type="text" name="headline" id="headline" class="form-control resizeNone" required>{{ old('headline',$post->headline) }}</textarea>
    </div>
    <div class="form-group col-12">
        <label for="contents" class="required">Conteúdo </label>
        <textarea class="summernote" name="contents" id="contents" required>{{ old('contents', $post->contents )}}</textarea>
    </div>
</div>

@push('scripts')
    <script src="{{ asset('js/components/previewImage.js') }}"></script>
    <script>
        $('.summernote').summernote({
            placeholder: 'Conteúdo do Post',
            tabsize: 2,
            height: 150,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['color', ['color']],
            ]
        });
        $("#profile").change(function() {
            filePreview(this, '#previewProfile');
        });
    </script>
@endpush
