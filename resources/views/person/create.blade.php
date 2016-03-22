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
            <input type="text" placeholder="Name des Studenten" class="form-control" name="name" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label>E-Mail</label>
            <input type="email" placeholder="E-Mail des Studenten" class="form-control" name="mail" value="{{ old('mail') }}">
        </div>
        <div class="form-group">
            <label>Matrikelnummer</label>
            <input type="number" placeholder="Matrikelnummer" class="form-control" name="matriculation" value="{{ old('matriculation') }}">
        </div>
        <div class="form-group">
            <labe>Kurs</labe>
            <input type="text" placeholder="Kurs" class="form-control" name="class" value="{{ old('class') }}">
        </div>
        <div class="form-group">
            <button class="btn btn-sm btn-default" type="submit">Speichern</button>
        </div>
    </form>

@endsection
