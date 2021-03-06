@extends('layouts.cp')

@section('title')
    Geräteübersicht <a href="/device/create" class="btn btn-default"><i class="fa fa-plus"></i></a>
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
                            <h3 class="panel-title"><a href="/device/{{ $device->id }}" >{{ $device->id }}: {{ $device->name }}</a></h3>
                        </div>
                        <div class="panel-body">
                            <p>
                                {{ $device->name }}<br/>
                                {{ $device->device_number }}
                                <hr/>
                            </p>
                            <p class="text-center">
                                    <a href="/device/{{ $device->id }}" class="btn btn-default"><i class="fa fa-eye"></i></a>
                                @if($device->available)
                                    <a href="/device/{{ $device->id }}/edit" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                    <a href="/loan/create?device={{ $device->id }}" class="btn btn-success"><i class="fa fa-upload"></i></a>
                                    <a href="/device/{{ $device->id }}/delete" class="btn btn-danger"><i class="fa fa-minus"></i></a>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-md-12">
            {!! $devices->links() !!}
        </div>

@endsection
