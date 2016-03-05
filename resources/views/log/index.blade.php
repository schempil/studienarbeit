@extends('layouts.cp')

@section('title')
    Logs
@endsection

@section('breadcrumbs')
    <li>Logs</li>
@endsection

@section('content')

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

@endsection
