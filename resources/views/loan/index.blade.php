@extends('layouts.cp')

@section('title')
    Leihgaben
@endsection

@section('breadcrumbs')
    <li>Leihgaben</li>
    <li>Übersicht</li>
@endsection

@section('content')

    <div class="table-responsive ls-table">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Gerätenummer</th>
                <th>Gerät</th>
                <th>Verliehen an</th>
                <th>Rückgabe</th>
                <th class="text-center">Aktion</th>
            </tr>
            </thead>
            <tbody>
                @foreach($devices as $device)
                    <tr>
                        <td>
                            {{ $device->device_number }}
                        </td>
                        <td>
                            {{ $device->name }}
                        </td>
                        <td>
                            {{ $device->person->name }}
                        </td>
                        <td>
                            @if(!$device->back == null)
                                {{ $device->back->toFormattedDateString() }}
                            @else
                                Nicht bekannt
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="/loan/{{ $device->id }}" class="btn btn-xs btn-default"><i class="fa fa-eye fa-2x"></i></a>
                            <a href="/loan/{{ $device->id }}/return" class="btn btn-xs btn-success"><i class="fa fa-download fa-2x"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
