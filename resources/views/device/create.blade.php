@extends('layouts.cp')

@section('title')
    Gerät hinzufügen
@endsection

@section('breadcrumbs')
    <li>Geräte</li>
    <li>Hinzufügen</li>
@endsection

@section('content')

    <form role="form" class="ls_form" method="POST" action="/device">
        {{ csrf_field() }}
        <div class="form-group">
            <label>Name</label>
            <input type="text" placeholder="Gerätebezeichnung" class="form-control" name="name">
        </div>


        <div class="form-group">
            <label>Kategorie</label>
            <div class="control-group">
                <select class="select2 demo-default" placeholder="Kategorie auswählen" name="category">
                    <option value="">Kategorie auswählen</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label>Beschreibung</label>
            <textarea class="animatedTextArea form-control " name="description" placeholder="Kurze Beschreibung / Zusatzinformationen" style="word-wrap: break-word; resize: vertical; height: 154px;"></textarea>
        </div>
        <div class="form-group">
            <labe>Gerätenummer</labe>
            <input type="text" placeholder="Gerätenummer" class="form-control" name="device_number">
        </div>
        <div class="form-group">
            <label>Gerät verfügbar?</label>
            <input name="available" class="switchCheckBox" type="checkbox" checked data-on-text="Ja" data-off-text="Nein">
        </div>
        <div class="form-group">
            <button class="btn btn-sm btn-default" type="submit">Speichern</button>
        </div>
    </form>

@endsection
