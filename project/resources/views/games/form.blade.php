@extends('layout')
@section('content')
<h1>{{ $title }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">Lūdzu, novērsiet radušās kļūdas!</div>
    @endif

    <form
    method="post"
    action="{{ $game->exists ? '/game/patch/' . $game->id : '/game/put' }}"
    enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="game-name" class="form-label">Nosaukums</label>
            <input
            type="text"
            id="game-name"
            name="name"
            value="{{ old('name', $game->name) }}"
            class="form-control @error('name') is-invalid @enderror"
            >
        @error('name')
            <p class="invalid-feedback">{{ $errors->first('name') }}</p>
        @enderror
    </div>
    
    <div class="mb-3">
        <label for="game-author" class="form-label">Autors</label>
            <select
            id="game-author"
            name="author_id"
            class="form-select @error('author_id') is-invalid @enderror"
            >
            
            <option value="">Norādiet autoru!</option>
            
            @foreach($authors as $author)
            <option
            value="{{ $author->id }}"
            @if ($author->id == old('author_id', $game->author->id ?? false)) selected @endif>{{ $author->name }}</option>
            
            @endforeach
            </select>
        @error('author_id')
            <p class="invalid-feedback">{{ $errors->first('author_id') }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="game-description" class="form-label">Apraksts</label>
        
        <textarea
        id="game-description"
        name="description"
        class="form-control @error('description') is-invalid @enderror">
        {{ old('description', $game->description) }}</textarea>
        
        @error('description')
            <p class="invalid-feedback">{{ $errors->first('description') }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="game-year" class="form-label">Izdošanas gads</label>
        <input
        type="number" max="2021" step="1"
        id="game-year"
        name="year"
        value="{{ old('year', $game->year) }}"
        class="form-control @error('year') is-invalid @enderror"
        >

        @error('year')
            <p class="invalid-feedback">{{ $errors->first('year') }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="game-steam_page" class="form-label">Links uz Steam veikala lapu</label>
            <input
            type="text"
            id="game-steam_page"
            name="steam_page"
            value="{{ old('steam_page', $game->steam_page) }}"
            class="form-control @error('steam_page') is-invalid @enderror"
            >
        @error('steam_page')
            <p class="invalid-feedback">{{ $errors->first('steam_page') }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="game-price" class="form-label">Cena</label>
            <input
            type="number" min="0.00" step="0.01" lang="en"
            id="game-price"
            name="price"
            value="{{ old('price', $game->price) }}"
            class="form-control @error('price') is-invalid @enderror"
            >
        @error('price')
            <p class="invalid-feedback">{{ $errors->first('price') }}</p>
        @enderror
    </div>

    <div class="mb-3">
    <div class="form-check">
        <input
        type="checkbox"
        id="game-display"
        name="display"
        value="1"
        class="form-check-input @error('display') is-invalid @enderror"
        @if (old('display', $game->display)) checked @endif
        >
        <label class="form-check-label" for="game-display">
            Publicēt ierakstu
        </label>
        @error('display')
            <p class="invalid-feedback">{{ $errors->first('display') }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="game-image" class="form-label">Attēls</label>
        @if ($game->image)
            <img
            src="{{ asset('images/' . $game->image) }}"
            class="img-fluid img-thumbnail d-block mb-2"
            alt="{{ $game->name }}"
            >
        @endif
        <input
        type="file" accept="image/png, image/jpeg"
        id="game-image"
        name="image"
        class="form-control @error('image') is-invalid @enderror"
        >
        @error('image')
            <p class="invalid-feedback">{{ $errors->first('image') }}</p>
        @enderror
    </div>
</div>
    <button type="submit" class="btn btn-primary">
    {{ $game->exists ? 'Atjaunot ierakstu' : 'Pievienot ierakstu' }}
    </button>
</form>
@endsection