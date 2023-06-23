<?php


namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use App\Models\Book;

class bookController extends Controller
{
    use ApiResponser;

    private $request;

    public $timestamps = false;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    

    public function Books()
    {
        return $this->successResponse(Book::all());
    }
    
    public function createBook(Request $request)
    {
        $rules = [
            'bookname' => 'required | max: 150',
            'yearpublish' => 'required | numeric | not_in: 0',
            'authorid' => 'required | numeric | min:1 | not_in: 0'];
        
        $this->validate($request, $rules);

        $author = Author::findOrFail(request('authorid'));

        $book = Book::create($request->all());

        $response = [
            "bookname" => request("bookname"),
            "yearpublish" => request("yearpublish"),
            "authorid" => $author->fullname
        ];

        return $this->successResponse($response, 201);
    }

    public function showBook($id)
    {   
        $specificBook = Book::findOrFail($id);

        return $this->successResponse($specificBook, 200);
    }

    public function updateBook(Request $request, $id)
    {
        $rules = [
            'bookname' => 'required | max: 150 | alpha_num',
            'yearpublish' => 'required | numeric | not_in: 0',
            'authorid' => 'required | numeric | min:1 | not_in: 0'
                 ];
        
        $this->validate($request, $rules);

        $book = Book::findOrFail($id);

        $book->fill($request->all());

        if ($book->isClean())
        {
            return $this-> ErrorResponse("At least one value must
            change", Response::HTTP_UNPROCESSABLE_ENTITY);
        } else
        {
            $book->save();
            return $this->successResponse($book);
        }
    }

    public function deleteBook($id)
    {
        $book = Book::findOrFail($id);

        $book->delete();

        return $this->successResponse("Book has been deleted");
    }
  
}
