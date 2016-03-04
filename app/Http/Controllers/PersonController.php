<?php

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Http\Request;

use App\Http\Requests;

class PersonController extends Controller
{
    public function index() {
        $persons = Person::paginate(15);
        return view('person.index', ['persons' => $persons]);
    }

    public function create() {
        return view('person.create');
    }

    public function store(Request $request) {
        $person = new Person();
        $person->name = $request->name;
        $person->matriculation = $request->matriculation;
        $person->class = $request->class;

        $person->save();

        return redirect('/person');
    }
}
