@extends('layouts.cp')

@section('title')
    {{ $device->name }}
@endsection

@section('breadcrumbs')
    <li>Geräte</li>
    <li>{{ $device->name }}</li>
    <li>Löschen</li>
@endsection

@section('content')
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-red">
            <div class="panel-heading">
                <h3 class="panel-title">{{ $device->name }} wirklich löschen?</h3>
            </div>
            <div class="panel-body">
                <form role="form" class="ls_form" method="POST" action="/device/{{ $device->id }}">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <button class="btn btn-lg btn-default" type="submit">Löschen bestätigen!</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
