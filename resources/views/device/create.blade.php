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
        <div class="row">
            <div class="form-group col-md-4">
                <label>Hersteller</label>
                <input type="text" placeholder="Hersteller" class="form-control" name="supplier" value="{{ old('supplier') }}">
            </div>
            <div class="form-group col-md-4">
                <label>Name</label>
                <input type="text" placeholder="Gerätebezeichnung" class="form-control" name="name" value="{{ old('name') }}">
            </div>
            <div class="form-group col-md-4">
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
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label>Gerätenummer</label>
                <input type="text" placeholder="Gerätenummer" class="form-control" name="device_number" value="{{ old('device_number') }}">
            </div>
            <div class="form-group col-md-4">
                <label>Inventar-Nr.</label>
                <input type="text" placeholder="Inventar-Nr." class="form-control" name="inventory" value="{{ old('inventory') }}">
            </div>
            <div class="form-group col-md-4">
                <label>Standort</label>
                <input type="text" placeholder="Standort" class="form-control" name="location" value="{{ old('location') }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Beschreibung</label>
                    <textarea class="animatedTextArea form-control " name="description" placeholder="Kurze Beschreibung / Zusatzinformationen" style="word-wrap: break-word; resize: vertical; height: 108px;">
                        {{ old('description') }}
                    </textarea>
                </div>
            </div>
            <div class="col-md-8">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Volumen</label>
                        <input type="number" placeholder="Volumen in m³" class="form-control" name="volume" value="{{ old('volume') }}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Rechnungsdatum</label>
                        <input type="date" placeholder="Rechnungsdatum" class="form-control" name="billdate" value="{{ old('billdate') }}">
                    </div>
                </div>
            </div>
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
