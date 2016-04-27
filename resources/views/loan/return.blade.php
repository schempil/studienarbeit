@extends('layouts.cp')

@section('title')
    Rückgabe
@endsection

@section('breadcrumbs')
    <li>Leihgaben</li>
    <li>Rückgabe</li>
@endsection

@section('content')
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-red">
            <div class="panel-heading">
                <h3 class="panel-title">Wurde {{ $device->name }} wirklich von {{ $person->name }} zurückgegeben?</h3>
            </div>
            <div class="panel-body">
                <form role="form" class="ls_form" method="POST" action="/loan/{{ $device->id }}/return">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <button class="btn btn-lg btn-default" type="submit">Rückgabe bestätigen!</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
