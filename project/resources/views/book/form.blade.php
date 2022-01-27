@extends('layout')
@section('content')
<h1>{{ $title }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">Lūdzu, novērsiet radušās kļūdas!</div>
    @endif

    <form
    method="post"
    action="{{ $book->exists ? '/books/patch/' . $book->id : '/books/put' }}"
    enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="book-name" class="form-label">Nosaukums</label>
            <input
            type="text"
            id="book-name"
            name="name"
            value="{{ old('name', $book->name) }}"
            class="form-control @error('name') is-invalid @enderror"
            >
        @error('name')
            <p class="invalid-feedback">{{ $errors->first('name') }}</p>
        @enderror
    </div>
    
    <div class="mb-3">
        <label for="book-author" class="form-label">Autors</label>
            <select
            id="book-author"
            name="author_id"
            class="form-select @error('author_id') is-invalid @enderror"
            >
            
            <option value="">Norādiet autoru!</option>
            
            @foreach($authors as $author)
            <option
            value="{{ $author->id }}"
            @if ($author->id == old('author_id', $book->author->id ?? false)) selected @endif>{{ $author->name }}</option>
            
            @endforeach
            </select>
        @error('author_id')
            <p class="invalid-feedback">{{ $errors->first('author_id') }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="book-description" class="form-label">Apraksts</label>
        
        <textarea
        id="book-description"
        name="description"
        class="form-control @error('description') is-invalid @enderror">
        {{ old('description', $book->description) }}</textarea>
        
        @error('description')
            <p class="invalid-feedback">{{ $errors->first('description') }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="book-year" class="form-label">Izdošanas gads</label>
        <input
        type="number" max="2021" step="1"
        id="book-year"
        name="year"
        value="{{ old('year', $book->year) }}"
        class="form-control @error('year') is-invalid @enderror"
        >

        @error('year')
            <p class="invalid-feedback">{{ $errors->first('year') }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="book-price" class="form-label">Cena</label>
            <input
            type="number" min="0.00" step="0.01" lang="en"
            id="book-price"
            name="price"
            value="{{ old('price', $book->price) }}"
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
        id="book-display"
        name="display"
        value="1"
        class="form-check-input @error('display') is-invalid @enderror"
        @if (old('display', $book->display)) checked @endif
        >
        <label class="form-check-label" for="book-display">
            Publicēt ierakstu
        </label>
        @error('display')
            <p class="invalid-feedback">{{ $errors->first('display') }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="book-image" class="form-label">Attēls</label>
        @if ($book->image)
            <img
            src="{{ asset('images/' . $book->image) }}"
            class="img-fluid img-thumbnail d-block mb-2"
            alt="{{ $book->name }}"
            >
        @endif
        <input
        type="file" accept="image/png, image/jpeg"
        id="book-image"
        name="image"
        class="form-control @error('image') is-invalid @enderror"
        >
        @error('image')
            <p class="invalid-feedback">{{ $errors->first('image') }}</p>
        @enderror
    </div>
</div>
    <button type="submit" class="btn btn-primary">
    {{ $book->exists ? 'Atjaunot ierakstu' : 'Pievienot ierakstu' }}
    </button>
</form>
@endsection