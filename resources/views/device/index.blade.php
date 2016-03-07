@extends('layouts.cp')

@section('title')
    Geräteübersicht
@endsection

@section('breadcrumbs')
    <li>Geräte</li>
    <li>Übersicht</li>
@endsection

@section('content')
        <div class="col-md-12">
            @foreach($devices as $device)
                <div class="col-md-3">
                    <div class="panel @if($device->available)
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
                                <a href="/device/{{ $device->id }}/edit" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                <a href="/device/{{ $device->id }}/delete" class="btn btn-danger"><i class="fa fa-minus"></i></a>
                                @if($device->available)
                                    <a href="/loan/create?device={{ $device->id }}" class="btn btn-success"><i class="fa fa-download"></i></a>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
            {!! $devices->links() !!}
        </div>
@endsection
