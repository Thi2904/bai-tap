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
            Add User
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
            <form method="post" action="{{ route('books.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="name">ISBN Code</label>
                    <input type="text" class="form-control" name="isbn"/>
                </div>
                <div class="form-group">
                    <label for="email">Name</label>
                    <input type="text" class="form-control" name="name"/>
                </div>
                <div class="form-group">
                    <label for="phone">Publisher</label>
                    <input type="text" class="form-control" name="publisher"/>
                </div>
                <div class="form-group">
                    <label for="num_page">Num Page</label>
                    <input type="text" class="form-control" name="num_page"/>
                </div>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title"/>
                </div>
                <div class="form-group">
                    <label for="author">Author</label>
                    <input type="text" class="form-control" name="author"/>
                </div>
                <div class="form-group">
                    <label for="img">Image</label>
                    <input placeholder="Put link images in here" type="text" class="form-control" name="img"/>
                </div>
                <div class="form-group">
                    <br>
                    <label for="price">Price</label>
                    <input type="text" class="form-control" name="price"/>
                </div>
                <br>
                <button type="submit" class="btn btn-block btn-danger">Create New Book</button>
            </form>
        </div>
    </div>
@endsection
