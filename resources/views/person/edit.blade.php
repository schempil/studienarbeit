@extends('layouts.cp')

@section('title')
    Person bearbeiten
@endsection

@section('breadcrumbs')
    <li>Personen</li>
    <li>bearbeiten</li>
@endsection

@section('content')

    <form role="form" class="ls_form" method="POST" action="/person/{{ $person->id }}">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        <div class="form-group">
            <label>Name</label>
            <input type="text" placeholder="Name des Studenten" class="form-control" name="name" value="{{ $person->name }}">
        </div>
        <div class="form-group">
            <label>E-Mail</label>
            <input type="email" placeholder="E-Mail des Studenten" class="form-control" name="mail" value="{{ $person->mail }}">
        </div>
        <div class="form-group">
            <label>Matrikelnummer</label>
            <input type="number" placeholder="Matrikelnummer" class="form-control" name="matriculation" value="{{ $person->matriculation }}">
        </div>
        <div class="form-group">
            <labe>Kurs</labe>
            <input type="text" placeholder="Kurs" class="form-control" name="class" value="{{ $person->class }}">
        </div>
        <div class="form-group">
            <button class="btn btn-sm btn-default" type="submit">Speichern</button>
        </div>
    </form>

@endsection
