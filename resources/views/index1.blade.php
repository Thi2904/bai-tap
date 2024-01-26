@extends('layout')
@section('content')
    <style>
        .push-top {
            margin-top: 50px;
        }
    </style>
    <div class="push-top">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif

        <table class="table">
            <thead>
            <tr class="table-dark">
                <td>ID</td>
                <td>ISBN Code</td>
                <td>Name</td>
                <td>Publisher</td>
                <td>Num Page</td>
                <td>Title</td>
                <td>Author</td>
                <td>Image</td>
                <td>Price</td>
                <td class="text-center">Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{$book->id}}</td>
                    <td>{{$book->isbn}}</td>
                    <td>{{$book->name}}</td>
                    <td>{{$book->publisher}}</td>
                    <td>{{$book->num_page}}</td>
                    <td>{{$book->title}}</td>
                    <td>{{$book->author}}</td>
                    <td><img height="55px" width="70px" src="{{$book->img}}"></td>
                    <td>{{$book->price}}</td>
                    <td class="text-center">
                        <a href="{{ route('books.edit', $book->id)}}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('books.destroy', $book->id)}}" method="post" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$books->links()}}
        <div>
@endsection
