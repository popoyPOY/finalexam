<?php


namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use App\Models\Book;

class authorController extends Controller
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
    

    public function Author()
    {
        return $this->successResponse(Author::all());
    }
    
    public function createAuthor(Request $request)
    {
        $rules = [
            'fullname' => 'required | max: 150',
            'gender' => 'required | in:Male, Female',
            'birthday' => 'required | date_format:Y-m-d| before:today'
        ];
        
        $this->validate($request, $rules);

        $author = Author::create($request->all());

        return $this->successResponse($author, 201);
    }

    public function showAuthor($id)
    {   
        $specicAuthor = Author::findOrFail($id);

        return $this->successResponse($specicAuthor, 200);
    }

    public function updateAuthor(Request $request, $id)
    {
        $rules = [
            'fullname' => 'required | max: 150 ',
            'gender' => 'required | in:Male, Female',
            'birthday' => 'required | date_format:Y-m-d| before:today'
        ];
        
        $this->validate($request, $rules);

        $author = Author::findOrFail($id);

        $author->fill($request->all());

        if ($author->isClean())
        {
            return $this-> ErrorResponse("At least one value must
            change", Response::HTTP_UNPROCESSABLE_ENTITY);
        } else
        {
            $author->save();
            return $this->successResponse($author);
        }
    }

    public function deleteAuthor($id)
    {
        $author = Author::findOrFail($id);

        $author->delete();

        return $this->successResponse("Author has been deleted");
    }
  
}
