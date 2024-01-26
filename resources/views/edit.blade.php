@extends('layout')
@section('content')
    <style>
        .container {
            max-width: 450px;
        }
        .push-top {
            margin-top: 50px;
        }
    </style>
    <div class="card push-top">
        <div class="card-header">
            Edit & Update
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('books.update', $book->id) }}">
                <div class="form-group">
                    @csrf
                    @method('PATCH')
                    <label for="name">ISBN Code</label>
                    <input type="text" class="form-control" name="isbn" value={{$book->isbn}} />
                </div>
                <div class="form-group">
                    <label for="email">Name</label>
                    <input type="text" class="form-control" name="name" value={{$book->name}}  />
                </div>
                <div class="form-group">
                    <label for="phone">Publisher</label>
                    <input type="text" class="form-control" name="publisher" value={{$book->publisher}} />
                </div>
                <div class="form-group">
                    <label for="num_page">Num Page</label>
                    <input type="text" class="form-control" name="num_page" value={{$book->num_page}} />
                </div>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" value={{$book->title}} />
                </div>
                <div class="form-group">
                    <label for="author">Author</label>
                    <input type="text" class="form-control" name="author" value={{$book->author}} />
                </div>
                <div class="form-group">
                    <label for="img">Image</label>
                    <input   placeholder="Put link images in here" type="text" class="form-control"
                             name="img"
                             value={{$book->img}} />
                </div>
                <div class="form-group">
                    <br>
                    <label for="price">Price</label>
                    <input type="text" class="form-control" name="price" value={{$book->price}} />
                </div>
                <br>
                <button type="submit" class="btn btn-block btn-danger">Update Book</button>
            </form>
        </div>
    </div>
@endsection
