@extends('layouts.cp')

@section('title')
    Leihgabe hinzufügen
@endsection

@section('breadcrumbs')
    <li>Leihgaben</li>
    <li>Hinzufügen</li>
@endsection

@section('content')

    <form role="form" class="ls_form" method="POST" action="/loan">
        {{ csrf_field() }}
        <div class="form-group">
            <label>Studierender</label>
            <div class="control-group">
                <select class="select2 demo-default" placeholder="Student auswählen" name="person">
                    <option value="">Student auswählen</option>
                    @foreach($people as $person)
                        <option value="{{ $person->id }}">{{ $person->name }} ({{ $person->matriculation }})</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label>Gerät</label>
            <div class="control-group form-group">
                <select class="select2 demo-default" placeholder="Gerät auswählen" name="device">
                    <option value="">Gerät auswählen</option>
                    @foreach($devices as $device)
                        <option @if($device->id == $selectedDevice->id)
                                    selected="selected"
                                @endif
                                value="{{ $device->id }}">{{ $device->name }} ({{ $device->device_number }})</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Rückgabe</label>
                <input type="date" name="back" class="form-control" />
            </div>
            <div class="form-group">
                <button class="btn btn-sm btn-default" type="submit">Speichern</button>
            </div>
        </div>
    </form>

@endsection
