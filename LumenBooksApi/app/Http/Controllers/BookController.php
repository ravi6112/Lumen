<?php

namespace App\Http\Controllers;

use App\Book;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{
    use ApiResponser;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Return the list of Books
     * @return Response
     */
    public function index() {
        $books = Book::all();
        return $this->successResponse($books);
    }

    /**
     * Create new Book
     * @return Response
     */
    public function store(Request $request) {
        $rules = [
            'title'=>'required|max:255',
            'description'=>'required|max:255',
            'price'=>'required|min:1',
            'author_id'=>'required|min:1',
        ];

        $this->validate($request,$rules);

        $Book = Book::create($request->all());

        return $this->successResponse($Book,Response::HTTP_CREATED);
    }

    /**
     * show one Book
     * @return Response
     */
    public function show($book) {
        $book = Book::findOrFail($book);

        return $this->successResponse($book);
    }

    /**
     * update existing Book
     * @return Response
     */
    public function update(Request $request, $book) {
        $rules = [
            'title'=>'max:255',
            'description'=>'max:255',
            'price'=>'min:1',
            'author_id'=>'min:1',
        ];

        $this->validate($request,$rules);

        $book = Book::findOrFail($book);
        $book->fill($request->all());

        if ($book->isClean()) {
            return $this->errorResponse('At least one filed must be changed',Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $book->save();

        return $this->successResponse($book,Response::HTTP_CREATED);


    }

    /**
     * remove the existing Book
     * @return Response
     */
    public function destroy($book) {

        $book = Book::findOrFail($book);

        $book->delete();

        return $this->successResponse($book);
    }
}
