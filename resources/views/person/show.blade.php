@extends('layouts.cp')

@section('title')
    {{ $person->name }}
@endsection

@section('breadcrumbs')
    <li>Person</li>
    <li>{{ $person->name }}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $person->id }}: {{ $person->name }}</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-6 col-md-3">
                            Name
                        </div>
                        <div class="col-xs-6 col-md-3">
                            {{ $person->name }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 col-md-3">
                            E-Mail
                        </div>
                        <div class="col-xs-6 col-md-3">
                            <a href="mailto:{{ $person->mail }}">{{ $person->mail }}</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 col-md-3">
                            Matrikelnummer
                        </div>
                        <div class="col-xs-6 col-md-3">
                            {{ $person->matriculation }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 col-md-3">
                            Kurs
                        </div>
                        <div class="col-xs-6 col-md-3">
                            {{ $person->class }}
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <h3>Geliehene Geräte</h3>
            @foreach($person->devices as $device)
                <a href="/device/{{ $device->id }}">

                <div class="col-md-4 col-sm-12">
                    <div class="ls-wizard @if($device->delayed()) label-red @else label-light-green @endif">
                        <h2>{{ $device->name }}</h2>
                        <span>Rückgabe {{ $device->back->diffForHumans() }}</span>
                    </div>
                </div>

                </a>

            @endforeach
        </div>
    </div>

@endsection
