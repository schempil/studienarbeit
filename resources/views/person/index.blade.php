@extends('layouts.cp')

@section('title')
    Personenübersicht <a href="/person/create" class="btn btn-default"><i class="fa fa-plus"></i></a>
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
                        <a href="/person/{{ $person->id }}" class="btn btn-default"><i class="fa fa-eye"></i></a>
                        <a href="/person/{{ $person->id }}/edit" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {!! $persons->links() !!}

    </div>

@endsection
