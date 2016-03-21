<?php

namespace App\Http\Controllers;

use App\Log;
use App\Person;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

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
        $person->mail = $request->mail;
        $person->matriculation = $request->matriculation;
        $person->class = $request->class;

        $person->save();

        $log = new Log();
        $log->person_id = $person->id;
        $log->type = 'create person';
        $log->user_id = Auth::user()->id;
        $log->save();

        return redirect('/person');
    }

    public function show($id) {
        $person = Person::findOrFail($id);
        $logs = Log::where('person_id', '=', $person->id)->orderBy('created_at', 'desc')->get();
        return view('person.show', ['person' => $person, 'logs' => $logs]);
    }
}
