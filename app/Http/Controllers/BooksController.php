<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (isset($_GET['keyword'])) {
            $kw = trim($_GET['keyword']);
            $books = Books::where("name", "LIKE", '%' . $kw . '%')->paginate(1);
        } else {
            $books = Books::paginate(5);
        }

        return view('index', compact('books'));
    }
    public function show($id)
    {
        $books = Books::find($id);
        return view('show', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $storeData = $request->validate([
            'isbn' => 'required|numeric',
            'name' => 'required|max:255',
            'publisher' => 'required|max:255',
            'num_page' => 'required|numeric',
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'img' => 'required|max:255',
            'price' => 'required|max:255',
        ]);

        Books::create($storeData);

        return redirect('/books')->with('completed', 'Book has been saved!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $book = Books::findOrFail($id);
        return view('edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $updateData = $request->validate([
            'isbn' => 'required|numeric',
            'name' => 'required|max:255',
            'publisher' => 'required|max:255',
            'num_page' => 'required|numeric',
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'img' => 'required|max:255',
            'price' => 'required|max:255',
        ]);

        Books::whereId($id)->update($updateData);

        return redirect('/books')->with('completed', 'Book has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $book = Books::findOrFail($id);
        $book->delete();

        return redirect('/books')->with('completed', 'Book has been deleted');
    }
}
