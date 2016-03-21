@extends('layouts.cp')

@section('title')
    {{ $device->name }}
@endsection

@section('breadcrumbs')
    <li>Geräte</li>
    <li>{{ $device->name }}</li>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-4">
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
                        @if($device->available && $device->active)
                            <a href="/loan/create?device={{ $device->id }}" class="btn btn-success"><i class="fa fa-download"></i></a>
                        @elseif(!$device->active)
                            <a href="/admin/restoredevices/{{ $device->id }}" class="btn btn-success"><i class="fa fa-refresh"></i></a>
                        @endif
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-8">

            <div class="feed-box-profile">
                <div class="nano has-scrollbar">
                    <div class="nano-content" tabindex="0" style="right: -17px;">
                        <div class="feed-box">
                            <ul class="ls-feed">
                                @foreach($logs as $log)
                                    <li>
                                        @if($log->type == 'create loan')
                                            <span class="label label-red">
                                                <i class="fa fa-upload"></i>
                                            </span>
                                        @elseif($log->type == 'create device')
                                            <span class="label label-blue">
                                                <i class="fa fa-mobile"></i>
                                            </span>
                                        @elseif($log->type == 'create person')
                                            <span class="label label-green">
                                                <i class="fa fa-user"></i>
                                            </span>
                                        @elseif($log->type == 'edit device')
                                            <span class="label label-yellow">
                                                <i class="fa fa-edit"></i>
                                            </span>
                                        @elseif($log->type == 'delete device')
                                            <span class="label label-red">
                                                <i class="fa fa-trash-o"></i>
                                            </span>
                                        @elseif($log->type == 'restore device')
                                            <span class="label label-light-green">
                                                <i class="fa fa-refresh"></i>
                                            </span>
                                        @endif

                                        {{ $log->user->name }}
                                        {{ $log->type }}:
                                        @if(!$log->device_id == null)
                                            <a href="/device/{{ $log->device->id }}">{{ $log->device->name }}</a>
                                        @endif
                                        @if(!$log->device_id == null && !$log->person_id == null)
                                            ->
                                        @endif
                                        @if(!$log->person_id == null)
                                            <a href="/person/{{ $log->person->id }}">{{ $log->person->name }}</a>
                                        @endif
                                        <span class="date">{{ $log->created_at->diffForHumans() }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="nano-pane" style="display: block; opacity: 1; visibility: visible;"><div class="nano-slider" style="height: 67px; transform: translate(0px, 0px);"></div></div></div>
            </div>

        </div>
    </div>

@endsection
