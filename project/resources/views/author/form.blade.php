@extends('layout')
@section('content')
<h1>{{ $title }}</h1>
@if ($errors->any())
    <div class="alert alert-danger">Lūdzu, novērsiet radušās kļūdas!</div>
@endif

<form method="post" action="{{ $author->exists ? '/authors/patch/' . $author->id : '/authors/put' }}">
    @csrf
    <div class="mb-3">
        <label for="author-name" class="form-label">Autora vārds</label>
        <input
        type="text"
        class="form-control @error('name') is-invalid @enderror"
        id="author-name"
        name="name"
        value="{{ old('name', $author->name) }}">
        
        @error('name')
            <p class="invalid-feedback">{{ $errors->first('name') }}</p>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Pievienot</button>
</form>
@endsection