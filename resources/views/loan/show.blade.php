@extends('layouts.cp')

@section('title')
    Leihgabe: {{ $device->name }}
@endsection

@section('breadcrumbs')
    <li>Leihgaben</li>
    <li>Übersicht</li>
    <li>{{ $device->name }}</li>
@endsection

@section('content')



@endsection
