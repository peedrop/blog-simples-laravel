@extends('layouts.site')

@section('title', 'Contato')

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <form action="{{ route('sendMail') }}" method="POST">
            @csrf
                <div class="col-sm-12">
                    <label for="name" class="required">Nome </label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" autofocus required>
                </div>
                <div class="col-sm-12">
                    <label for="email" class="required">E-mail </label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" required>
                </div>
                <div class="col-sm-12">
                    <label for="subject" class="required">Assunto </label>
                    <input type="text" class="form-control" name="subject" id="subject" value="{{ old('subject') }}" required>
                </div>
                <div class="col-sm-12">
                    <label for="body" class="required">Mensagem </label>
                    <textarea name="body" id="body" class="form-control resizeNone" rows="4" required>{{ old('body') }}</textarea>
                </div>
                <div class="col-sm-12 text-center mt-4">
                    <button type="submit" class="btn btn-dark btn-lg rounded-pill w-25">Enviar</button>
                </div>
            </form>
        </div>
        <div class="col-sm-6">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3705.1136872399143!2d-43.374472385112306!3d-21.775860603967583!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x989ba191de0d53%3A0xf49062b61d523855!2sCode%20Empresa%20Jr.!5e0!3m2!1spt-BR!2sbr!4v1618691784213!5m2!1spt-BR!2sbr" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
@endsection
