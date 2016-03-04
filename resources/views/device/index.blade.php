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
                                Verfügbar?
                                @if($device->available)
                                    <i class="green fa fa fa-check fa-2x"></i>
                                @else
                                    <i class="red fa fa fa-times fa-2x"></i>
                                @endif
                                <hr/>
                            </p>
                            <p class="text-center">
                                <a href="#" class="btn btn-default"><i class="fa fa-eye"></i></a>
                                <a href="#" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                @if($device->available)
                                    <a href="/loan/create?device={{ $device->id }}" class="btn btn-success"><i class="fa fa-download"></i></a>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {!! $devices->links() !!}

@endsection
