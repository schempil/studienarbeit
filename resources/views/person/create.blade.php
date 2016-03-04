@extends('layouts.cp')

@section('title')
    Person hinzufügen
@endsection

@section('breadcrumbs')
    <li>Personen</li>
    <li>Hinzufügen</li>
@endsection

@section('content')

    <form role="form" class="ls_form" method="POST" action="/person">
        {{ csrf_field() }}
        <div class="form-group">
            <label>Name</label>
            <input type="text" placeholder="Name des Studenten" class="form-control" name="name">
        </div>
        <div class="form-group">
            <label>Matrikelnummer</label>
            <input type="number" placeholder="Matrikelnummer" class="form-control" name="matriculation">
        </div>
        <div class="form-group">
            <labe>Kurs</labe>
            <input type="text" placeholder="Kurs" class="form-control" name="class">
        </div>
        <div class="form-group">
            <button class="btn btn-sm btn-default" type="submit">Speichern</button>
        </div>
    </form>

@endsection
