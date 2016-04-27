@extends('layouts.cp')

@section('title')
    Ausgesonderte Geräte
@endsection

@section('breadcrumbs')
    <li>Admin</li>
    <li>Ausgesonderte Geräte</li>
@endsection

@section('content')
    <div class="col-md-12">
        @foreach($devices as $device)
            <div class="col-md-3">
                <div class="panel @if(!$device->active)
                        panel-default
                    @elseif($device->available)
                        panel-success
                    @else
                        panel-danger
                    @endif">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{ $device->id }}: {{ $device->name }}</h3>
                    </div>
                    <div class="panel-body">
                        <p>
                            {{ $device->name }}<br/>
                            {{ $device->device_number }}<br/>
                            {{ $device->description }}<br/>
                        <hr/>
                        </p>
                        <p class="text-center">
                            <a href="/device/{{ $device->id }}" class="btn btn-default"><i class="fa fa-eye"></i></a>
                            <a href="/admin/restoredevices/{{ $device->id }}" class="btn btn-success"><i class="fa fa-refresh"></i></a>
                        </p>
                    </div>
                </div>
            </div>
    @endforeach
    {!! $devices->links() !!}
@endsection
