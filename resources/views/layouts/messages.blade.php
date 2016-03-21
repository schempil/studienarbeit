@if($errors->has())
    <div class="alert alert-warning fade in alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
@endif

@if(Session::has('status'))
    <div class="alert alert-info fade in alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        {{ Session::get('status') }}
    </div>
@endif

@if(Session::has('message'))
    <div class="alert alert-success fade in alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        {{ Session::get('message') }}
    </div>
@endif

@if(Session::has('error'))
    <div class="alert alert-warning fade in alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        {{ Session::get('error') }}
    </div>
@endif