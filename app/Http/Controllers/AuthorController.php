<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Author;
use App\Traits\ApiResponser;

class AuthorController extends Controller
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
     * Return Author list.
     *
     * @return Illuminate\Http\Response
     */
    public function index(){
        
        $authors = Author::All();

        return $this->successResponse($authors);

    }

    /**
     * Create an instance of author.
     *
     * @return Illuminate\Http\Response
     */
    public function store(Request $request){        

        $rules = [
            'name' => 'required|max:255',
            'gender' => 'required|max:255|in:male,female',
            'country' => 'required|max:255'
        ];

        $this->validate($request, $rules);

        $author = Author::Create($request->all());

        return $this->successResponse($author, Response::HTTP_CREATED); 

    }

    /**
     * Return a specific author.
     *
     * @return Illuminate\Http\Response
     */
    public function show($author){

        $author = Author::findOrFail($author);

        return $this->successResponse($author);
    }

    /**
     * Update the information of an author.
     *
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $author){
        $rules = [
            'name' => 'required|max:255',
            'gender' => 'required|max:255|in:male,female',
            'country' => 'required|max:255'
        ];

        $this->validate($request, $rules);

        $author = Author::findOrFail($author);

        $author->fill($request->all());

        if($author->isClean()){
            return $this->errorResponse('Debe realizar al menos un cambio', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $author->save();

        return $this->successResponse($author);

    }

    /** 
     * Remove an existing author.
     *
     * @return Illuminate\Http\Response
     */
    public function destroy( $author){

        $author = Author::findOrFail($author);

        $author->delete();

        return $this->successResponse($author);

    }



}
