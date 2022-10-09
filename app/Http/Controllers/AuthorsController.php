<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{
    //----------------INDEX--------------------

    public function index()
    {

        $authors = Author::all();
        return view('authors.index', compact('authors'));
    }

    //----------------CREATE--------------------

    public function create()
    {
        return view('authors.create');
    }
    //----------------STORE--------------------

    public function store(Request $request, Author $author)
    {

        $request = $this->validateRequest($request);

        $author->create($request->all());

        return redirect('authors/create')->with('status', 'Author added succesfully.')->with('desc', 'You can create another author.');;
    }

    //----------------EDIT--------------------

    public function edit(Author $author)
    {
        return view('authors.edit', ['author' => $author]);
    }

    //----------------UPDATE--------------------

    public function update(Request $request, Author $author)
    {

        $request = $this->validateRequest($request);

        $author->update($request->all());

        return redirect('/authors')->with('status', 'Author updated succesfully.');
    }

    //----------------DELETE--------------------

    public function destroy(Author $author)
    {

        $author->delete();

        return redirect('/authors')->with('delete', 'Author deleted succesfully.');
    }

    //----------------VALIDATE--------------------

    public function validateRequest(Request $request)
    {
        $uniqueRule =  Rule::unique('authors')->where(function ($query) use ($request) {
            $query->where('name', $request['name']);
            $query->where('surname', $request['surname']);
        });

        $request->validate([
            'name' => ['required', 'max:255', $request->getMethod() === "POST" ? $uniqueRule : NULL],
            'surname' => 'required', 'max:255'

        ],   [
            "name.unique" => 'There is already an author with this first name and last name. ',

        ]);
        return $request;
    }
}
