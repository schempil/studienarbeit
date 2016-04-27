@extends('layouts.cp')

@section('title')
    Kategorie bearbeiten
@endsection

@section('breadcrumbs')
    <li>Admin</li>
    <li>Kategorien</li>
    <li>Bearbeiten</li>
@endsection

@section('content')
    <form role="form" class="ls_form" method="POST" action="/admin/category/{{ $category->id }}">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        <div class="form-group">
            <label>Name</label>
            <input type="text" placeholder="Name der Kategorie" class="form-control" name="name" value="{{ $category->name }}">
        </div>
        <div class="form-group">
            <label>Beschreibung</label>
            <input type="text" placeholder="Kurzbeschreibung" class="form-control" name="description" value="{{ $category->description }}">
        </div>
        <div class="form-group">
            <button class="btn btn-sm btn-default" type="submit">Speichern</button>
        </div>
    </form>
@endsection
