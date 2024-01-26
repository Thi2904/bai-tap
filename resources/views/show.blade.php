@extends('layout')
@section('content')
<div class="container">
    <div class=".d-flex" style="display: flex">

        <img height="600px" width="600px" src="{{$books->img}}" alt="">
        <div style="margin-left: 50px">
            <p>ID: {{$books->id}}</p>
            <p>ISBN Code: {{$books -> isbn}}</p>
            <p>Name: {{$books -> name}}</p>
            <p>Publisher: {{$books -> publisher}}</p>
            <p>Num Page: {{$books->num_page}}</p>
            <p>Title: {{$books->title}}</p>
            <p>Author: {{$books->author}}</p>
            <p>Price: {{$books->price}}</p>
            <div class="text-center">
                <a href="{{ route('books.edit', $books->id)}}" class="btn btn-primary btn-sm">Edit</a>
            </div>
        </div>

    </div>
</div>
