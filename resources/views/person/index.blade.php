@extends('layouts.cp')

@section('title')
    Personenübersicht
@endsection

@section('breadcrumbs')
    <li>Personen</li>
    <li>Übersicht</li>
@endsection

@section('content')

    <div class="table-responsive ls-table">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>E-Mail</th>
                <th>Matrikelnummer</th>
                <th>Kurs</th>
                <th class="text-center">Aktion</th>
            </tr>
            </thead>
            <tbody>
            @foreach($persons as $person)
                <tr>
                    <td>{{ $person->id }}</td>
                    <td>{{ $person->name }}</td>
                    <td>{{ $person->mail }}</td>
                    <td>{{ $person->matriculation }}</td>
                    <td>{{ $person->class }}</td>
                    <td class="text-center">
                        <button class="btn btn-xs btn-success"><i class="fa fa-eye"></i></button>
                        <button class="btn btn-xs btn-warning"><i class="fa fa-pencil-square-o"></i></button>
                        <button class="btn btn-xs btn-danger"><i class="fa fa-minus"></i></button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {!! $persons->links() !!}

    </div>

@endsection
