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
                            <span class="label label-light-green">
                                <i class="fa fa-bar-chart-o"></i>
                            </span>
                                {{ $log->type }}: {{ $log->device->name }}
                                <span class="date">{{ $log->created_at->diffForHumans() }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="nano-pane" style="display: block; opacity: 1; visibility: visible;"><div class="nano-slider" style="height: 67px; transform: translate(0px, 0px);"></div></div></div>
    </div>

@endsection
