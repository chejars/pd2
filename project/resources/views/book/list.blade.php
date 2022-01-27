@extends('layout')
@section('content')
    <h1>{{ $title }}</h1>
    
    @if (count($items) > 0)
        <table class="table table-sm table-hover table-striped">
        <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>Nosaukums</th>
            <th>Autors</th>
            <th>Gads</th>
            <th>Cena</th>
            <th>Attēlot</th>
            <th>&nbsp;</th>
        </tr>
        </thead>
            <tbody>
                @foreach($items as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->name }}</td>
                        <td>{{ $book->author->name }}</td>
                        <td>{{ $book->year }}</td>
                        <td>&euro; {{ number_format($book->price, 2, '.') }}</td>
                        <td>{!! $book->display ? '&#10004;&#65039;' : '&#10060;' !!}</td>
                        <td>

                        <a
                        href="/books/update/{{ $book->id }}"
                        class="btn btn-outline-primary btn-sm"
                        >Labot</a> /
                        
                        <form
                        method="post"
                        action="/books/delete/{{ $book->id }}"
                        class="d-inline deletion-form"
                        >
                            @csrf
                            <button
                            type="submit"
                            class="btn btn-outline-danger btn-sm"
                            >Dzēst</button>
                        </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
    <p>Nav atrasts neviens ieraksts</p>
    @endif
    <a href="/books/create" class="btn btn-primary">Pievienot jaunu</a>
@endsection