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
        <a href="http://127.0.0.1:8000/books" style="color: black; text-decoration: none">
            <div class="d-flex">
                <img height="50px" width="50px"
                     style="border-radius: 50%"
                     src="https://symbols.vn/wp-content/uploads/2022/08/Hinh-Genshin-Impact-Yae-Miko-cute.jpg" alt="">

                <h1>Tiệm sách của Tèo</h1>
            </div>
        </a>
        <br>
        <form action="" class="mb-3">
            <input placeholder="Search" name="keyword" type="text" class="form-control">
            <button hidden type="submit" class="btn btn-primary">Search</button>
        </form>
        <table class="table">
            <thead>
            <tr class="table-dark">
                <td>ID</td>
                <td>ISBN Code</td>
                <td>Name</td>
                <td>Image</td>
                <td class="text-center">Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{$book->id}}</td>
                    <td>{{$book->isbn}}</td>
                    <td>{{$book->name}}</td>
                    <td><img height="55px" width="70px" src="{{$book->img}}"></td>
                    <td class="text-center">
                    <form action="{{ route('books.destroy', $book->id)}}" method="post" style="display: inline-block">
                        <a class="btn btn-primary" href= {{route("books.show", $book->id)}}>Show Details</a>
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$books->links()}}
        <div>
            @endsection




