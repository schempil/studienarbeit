@extends('layouts.cp')

@section('title')
    Dashboard
@endsection

@section('breadcrumbs')
@endsection

@section('content')
    <div class="col-md-3 col-sm-3 col-xs-6">
        <div class="ls-circle-widget label-info white active">
            <i class="fa fa-laptop"></i>

            <h1>{{ $devcount }} Geräte</h1>
        </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-6">
        <div class="ls-circle-widget label-success white active">
            <i class="fa fa-users"></i>

            <h1>{{ $personcount }} Studenten</h1>
        </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-6">
        <div class="ls-circle-widget label-light-green white active">
            <i class="fa fa-check"></i>

            <h1>{{ $avdevcount }} verfügbar</h1>
        </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-6">
        <div class="ls-circle-widget label-danger white active">
            <i class="fa fa-calendar-o"></i>

            <h1>{{ $delayed }} verspätet</h1>
        </div>
    </div>
@endsection
